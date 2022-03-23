<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Teste;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;


$factory->define(Teste::class, function (Faker $faker) {

    
    return [
        'name' => $this->faker->name,
        'email' => $this->faker->unique()->safeEmail,
        'phone' => $this->faker->numerify('##########'),
        'status' => '1',
        'type' => '1',
        'created_at' => date('Y-m-d H:i'),
        'updated_at' => date('Y-m-d H:i'),
    ];
});
