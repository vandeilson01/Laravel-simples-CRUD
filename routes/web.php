<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\Teste;


Route::get('/', function(){
    return redirect('/teste');
});

Route::get('/teste/{section}/{id}', function($section,  $id){
    
    return view('page', [
        'page' => 'teste',
        'title' => 'Teste - Amar Assits',
        'min' => false,
        'section' => $section,
        'prefix' => 'edit-',
        'id' => $id
    ]);
});

Route::get('/teste/{section}', function($section){
    return view('page', [
        'page' => 'teste',
        'title' => 'Teste - Amar Assits',
        'min' => false,
        'section' => $section
    ]);
});

Route::get('/{page}', function($page){

    if('teste' == $page ):

        return view('page', [
            'page' => 'teste',
            'title' => 'Teste - Amar Assits',
            'min' => false,
            'section' => 1
        ]);

    endif;

})->where('page', '^(?!app-assets|page).*$');

Route::post('ajax/{form}', function($form){
  
    return App::call('App\Http\Controllers\Teste@'.ucfirst($form));
        
});

