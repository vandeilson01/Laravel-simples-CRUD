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
        'cpf' ,
        'email',
        'born',
        'phone',
        'province',
        'city',
        'address',
        'status',
        'created_at',
        'updated_at',
    ];


}
