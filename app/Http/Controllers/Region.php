<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;


class Region {

    public static function List($type = 0, $sigla = ''){

        $return = [];
        $sql = !$type ? DB::table('adm_region_states') : DB::table('adm_region_cities');
        if(!empty($sigla)) $sql->where('state', $sigla);
        $sql->orderBy('nome', 'asc');
        if($sql->count() > 0):
            $return = $sql->get();
        endif;
        return $return;

    }

    public static function Insert(){

        $states = json_decode(file_get_contents('https://servicodados.ibge.gov.br/api/v1/localidades/estados?orderBy=nome'));
        foreach($states as $row):
            $sql = DB::table('adm_region_states')
                ->where('nome', $row->nome)
                ->where('sigla', $row->sigla);
            if($sql->count() <= 0):
                DB::table('adm_region_states')
                    ->insert([
                        'nome' => $row->nome,
                        'sigla' => $row->sigla
                    ]);
                $cities = json_decode(file_get_contents('https://servicodados.ibge.gov.br/api/v1/localidades/estados/'.$row->sigla.'/municipios?orderBy=nome'));
                foreach($cities as $r):
                    $sql = DB::table('adm_region_cities')
                        ->where('nome', $r->nome)
                        ->where('state', $row->sigla);
                    if($sql->count() <= 0):
                        DB::table('adm_region_cities')
                            ->insert([
                                'nome' => $r->nome,
                                'state' => $row->sigla
                            ]);
                    endif;
                endforeach;
            endif;
        endforeach;

        return true;

    }

}