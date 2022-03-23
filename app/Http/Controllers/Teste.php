<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class Teste {

    public static function List(){

        $return = [];
        $sql = DB::table('data_users')
                ->orderBy('id', 'asc');
        if($sql->count() > 0):
            $return = $sql->get();
        endif;
        return $return;

    }

    public static function get($id){

        $sql = DB::table('data_users');
        $sql->where('id', $id);
        return $sql;

    }


    public function addUser(Request $request){

        $name = $request->input('name') ? filter_var($request->input('name'), FILTER_SANITIZE_STRING) : '';
        $email = $request->input('email') ? filter_var($request->input('email'), FILTER_SANITIZE_EMAIL) : '';
        $phone = $request->input('phone') ? filter_var($request->input('phone'), FILTER_SANITIZE_STRING) : '';
        $cep = $request->input('cep') ? filter_var($request->input('cep'), FILTER_SANITIZE_STRING) : '';
        $province = $request->input('province') ? filter_var($request->input('province'), FILTER_SANITIZE_STRING) : '';
        $city = $request->input('city') ? filter_var($request->input('city'), FILTER_SANITIZE_STRING) : '';
        $district = $request->input('district') ? filter_var($request->input('district'), FILTER_SANITIZE_STRING) : '';
        $number = $request->input('number') ? filter_var($request->input('number'), FILTER_SANITIZE_STRING) : '';
        $complemet = $request->input('complemet') ? filter_var($request->input('complemet'), FILTER_SANITIZE_STRING) : '';
        
        

        if(empty($name)){

            $mod['error'] = true;
            $mod['alert'] = 'Preencha o compo Nome.';
            $mod['reload'] =  false;

            return response()->json($mod);

        }elseif(empty($email)){

            $mod['error'] = true;
            $mod['alert'] = 'Preencha o compo Email.';
            $mod['reload'] =  false;

            return response()->json($mod);

        }elseif(empty($cep)){

            $mod['error'] = true;
            $mod['alert'] = 'Preencha o compo CEP.';
            $mod['reload'] =  false;

            return response()->json($mod);

        }else{
            DB::table('data_users')
            ->insert([
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'cep' => $cep,
                'province' => $province,
                'city' => $city,
                'district' => $district,
                'number' => $number,
                'number' => $number,
                'complemet' => $complemet,
                'type'=> 1,
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
        $email = $request->input('email') ? filter_var($request->input('email'), FILTER_SANITIZE_EMAIL) : '';
        $phone = $request->input('phone') ? filter_var($request->input('phone'), FILTER_SANITIZE_STRING) : '';
        $cep = $request->input('cep') ? filter_var($request->input('cep'), FILTER_SANITIZE_STRING) : '';
        $province = $request->input('province') ? filter_var($request->input('province'), FILTER_SANITIZE_STRING) : '';
        $city = $request->input('city') ? filter_var($request->input('city'), FILTER_SANITIZE_STRING) : '';
        $district = $request->input('district') ? filter_var($request->input('district'), FILTER_SANITIZE_STRING) : '';
        $number = $request->input('number') ? filter_var($request->input('number'), FILTER_SANITIZE_STRING) : '';
        $complemet = $request->input('complemet') ? filter_var($request->input('complemet'), FILTER_SANITIZE_STRING) : '';
        
        

        if(empty($name)){

            $mod['error'] = true;
            $mod['alert'] = 'Preencha o compo Nome.';
            $mod['reload'] =  false;

            return response()->json($mod);

        }elseif(empty($email)){

            $mod['error'] = true;
            $mod['alert'] = 'Preencha o compo Email.';
            $mod['reload'] =  false;

            return response()->json($mod);

        }elseif(empty($cep)){

            $mod['error'] = true;
            $mod['alert'] = 'Preencha o compo CEP.';
            $mod['reload'] =  false;

            return response()->json($mod);

        }else{
            DB::table('data_users')
            ->where('id', $id)
            ->update([
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'cep' => $cep,
                'province' => $province,
                'city' => $city,
                'district' => $district,
                'number' => $number,
                'number' => $number,
                'complemet' => $complemet,
                'type'=> 2,
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
                'email' => $row->email,
                'phone' => $row->phone,
                'cep' => $row->cep,
                'province' => $row->province,
                'city' => $row->city,
                'district' => $row->district,
                'number' => $row->number,
                'number' => $row->number,
                'complemet' => $row->complemet,
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

                    $b['error'] = true;
                    return response()->json($b);
                }

            endif;

        }else{

            $mod['error'] = true;
            return response()->json($mod);
            
        }
        
    }

}   