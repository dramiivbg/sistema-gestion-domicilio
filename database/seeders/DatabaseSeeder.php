<?php

namespace Database\Seeders;

use App\Models\Login;
use App\Models\Operadore;
use App\Models\Pedido;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Operadore::factory(10)->create();
        Login::factory(10)->create();
        Pedido::factory(10)->create();

    }
}
