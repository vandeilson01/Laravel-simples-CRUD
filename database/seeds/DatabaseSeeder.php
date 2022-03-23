<?php

use Illuminate\Database\Seeder;
use  App\Model\Teste;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Teste::class, 5)->create();
    }
}
