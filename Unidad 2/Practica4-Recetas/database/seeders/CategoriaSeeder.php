<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Insertar datos por default a la tabla categorias_receta
        DB::table('categoria_recetas')->insert([
            'nombre'=>'Comida Mexicana',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);

        DB::table('categoria_recetas')->insert([
            'nombre'=>'Comida Italiana',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);

        DB::table('categoria_recetas')->insert([
            'nombre'=>'Comida Argentina',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);

        DB::table('categoria_recetas')->insert([
            'nombre'=>'Postres',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);

        DB::table('categoria_recetas')->insert([
            'nombre'=>'Cortes',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);

    }
}
