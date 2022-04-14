<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class Ajax extends Controller
{

    public function GetCities(Request $request){

        $sigla = $request->input('sigla') ? filter_var($request->input('sigla'), FILTER_SANITIZE_STRING) : '';

        if(!empty($sigla)):

            return json_encode(Region::List(1, $sigla));

        endif;
        
    }
    
    public function addUser(Request $request){

        $name = $request->input('name') ? filter_var($request->input('name'), FILTER_SANITIZE_STRING) : '';
        $cpf = $request->input('cpf') ? filter_var($request->input('cpf'), FILTER_SANITIZE_STRING) : '';
        $email = $request->input('email') ? filter_var($request->input('email'), FILTER_SANITIZE_EMAIL) : '';
        $born = $request->input('born') ? filter_var($request->input('born'), FILTER_SANITIZE_STRING) : '';
        $phone = $request->input('phone') ? filter_var($request->input('phone'), FILTER_SANITIZE_STRING) : '';
        $province = $request->input('province') ? filter_var($request->input('province'), FILTER_SANITIZE_STRING) : '';
        $city = $request->input('city') ? filter_var($request->input('city'), FILTER_SANITIZE_STRING) : '';
        $address = $request->input('address') ? filter_var($request->input('address'), FILTER_SANITIZE_STRING) : '';
        

        if(empty($name)){

            $a['error'] = true;
            $a['alert'] = 'Preencha o compo Nome.';
            $a['reload'] =  false;

            return response()->json($a);

        }elseif(empty($email)){

            $a['error'] = true;
            $a['alert'] = 'Preencha o compo Email.';
            $a['reload'] =  false;

            return resposen()->json($a);

        }elseif(empty($cpf)){

            $a['error'] = true;
            $a['alert'] = 'Preencha o compo CPF.';
            $a['reload'] =  false;

            return response()->json($a);

        }else{
            DB::table('data_users')
            ->insert([
                'name' => $name,
                'email' => $email,
                'cpf' => $cpf,
                'phone' => $phone,
                'born' => $born,
                'province' => $province,
                'city' => $city,
                'address' => $address,
                'status'=> 1,
                'updated_at'=> date('Y-m-d H:i:s'),
                'created_at'=> date('Y-m-d H:i:s'),
            ]);


        }

        $a['error'] = false;
        $a['alert'] = 'Adiconada com sucesso!';
        $a['reload'] =  true;

        return response()->json($a);

    }

    public function updateUser(Request $request){

        $id = $request->input('id') ? filter_var($request->input('id'), FILTER_SANITIZE_STRING) : '';
        $name = $request->input('name') ? filter_var($request->input('name'), FILTER_SANITIZE_STRING) : '';
        $cpf = $request->input('cpf') ? filter_var($request->input('cpf'), FILTER_SANITIZE_STRING) : '';
        $email = $request->input('email') ? filter_var($request->input('email'), FILTER_SANITIZE_EMAIL) : '';
        $born = $request->input('born') ? filter_var($request->input('born'), FILTER_SANITIZE_STRING) : '';
        $phone = $request->input('phone') ? filter_var($request->input('phone'), FILTER_SANITIZE_STRING) : '';
        $province = $request->input('province') ? filter_var($request->input('province'), FILTER_SANITIZE_STRING) : '';
        $city = $request->input('city') ? filter_var($request->input('city'), FILTER_SANITIZE_STRING) : '';
        $address = $request->input('address') ? filter_var($request->input('address'), FILTER_SANITIZE_STRING) : '';
        
        
        if(empty($name)){

            $a['error'] = true;
            $a['alert'] = 'Preencha o compo Nome.';
            $a['reload'] =  false;

            return response()->json($a);

        }elseif(empty($email)){

            $a['error'] = true;
            $a['alert'] = 'Preencha o compo Email.';
            $a['reload'] =  false;

            return response()->json($a);

        }elseif(empty($cpf)){

            $a['error'] = true;
            $a['alert'] = 'Preencha o compo CPF.';
            $a['reload'] =  false;

            return response()->json($a);

        }else{
            DB::table('data_users')
            ->where('id', $id)
            ->update([
                'name' => $name,
                'email' => $email,
                'cpf' => $cpf,
                'phone' => $phone,
                'born' => $born,
                'province' => $province,
                'city' => $city,
                'address' => $address,
                'status'=> 1,
                'updated_at'=> date('Y-m-d H:i:s'),
            ]);


        }

        $a['error'] = false;
        $a['alert'] = 'Modificado com sucesso!';
        $a['reload'] =  true;

        return response()->json($a);

    }

    public function returnUser(Request $request){

        $id = $request->input('id');
        
        $in = DB::table('data_users')
        ->where('id','=',$id)->get();

        foreach($in as $row){

            return response()->json([
                'id' => $row->id,
                'name' => $row->name,
                'cpf' => $row->cpf,
                'email' => $row->email,
                'phone' => $row->phone,
                'born' => $row->born,
                'province' => $row->province,
                'city' => $row->city,
                'address' => $row->address,
                'updated_at'=> $row->updated_at,
                'created_at'=> $row->created_at,
            ]);
           
        }


    }


    public function delUser(Request $request){

        $id = $request->input('id'); 
      
        if(isset($id)){

            $existe = DB::table('data_users')->where('id', $id)->exists();

            if(isset($existe)):

            
                $users = DB::table('data_users')
                            ->where('id','=', $id)
                            ->delete();

                if(isset($users) && isset($clinics)){

                    $a['error'] = false;
                    $a['reload'] = true;
                    return response()->json($a);

                }else{

                    $a['error'] = true;
                    $a['reload'] = false;
                    return response()->json($a);
                }

            endif;

        }else{

            $a['error'] = true;
            $a['reload'] = true;
            return response()->json($a);
            
        }
        
    }

}
