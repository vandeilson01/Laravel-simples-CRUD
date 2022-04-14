<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

use App\Http\Controllers\Teste;


Route::get('/', function(){
    return redirect('/teste');
});

Route::get('/{page}', function($page){

    if('teste' == $page ):

        return view('page', [
            'page' => 'teste',
            'title' => 'Teste',
            'min' => false,
            'section' => 1
        ]);

    endif;

})->where('page', '^(?!app-assets|page).*$');

Route::post('ajax/{form}', function($form){
  
    return App::call('App\Http\Controllers\Ajax@'.ucfirst($form));
        
});
