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


}   