<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Teste extends Model
{
    //

    protected $table  = 'data_users';

    protected $fillable = [
        'id',
        'name' ,
        'email',
        'phone',
        'cep',
        'status',
        'type',
        'created_at',
        'updated_at',
    ];
}
