<?php

namespace Database\Seeders;

use DB;
use Hash;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Insertar datos por default a la tabla usuarios
        DB::table('users')->insert([
            'name'=>'Yashub',
            'email'=>'yashubge@gmail.com',
            'password'=>Hash::make('monodelodo'),
            'url'=>'www.upv.com',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name'=>'Ailin',
            'email'=>'ailinge@gmail.com',
            'password'=>Hash::make('monodelodo'),
            'url'=>'www.upv.com',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name'=>'Yahir',
            'email'=>'yahirge@gmail.com',
            'password'=>Hash::make('monodelodo'),
            'url'=>'www.upv.com',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name'=>'Usuario1',
            'email'=>'correo@correo.com',
            'password'=>Hash::make('12345678'),
            'url'=>'www.upv.com',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);
    }
}
