<?php

namespace Database\Seeders;

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
        //Llamar seeder de categorias
        $this->call(CategoriaSeeder::class);

        //Llamar seeder de usuarios
        $this->call(UsuarioSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
