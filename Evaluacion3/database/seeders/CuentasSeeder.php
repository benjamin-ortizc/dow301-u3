<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CuentasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cuentas')->insert([
            [
                "user"=>"admin",
                "password"=>Hash::make("admin"),
                "nombre"=>"Administrador",
                "apellido"=>"Sistema",
                "perfil_id"=> 1,
            ],
            [
                "user"=>"artista",
                "password"=>Hash::make("artista"),
                "nombre"=>"Artista",
                "apellido"=>"Sistema",
                "perfil_id"=> 2,
            ]
        ]);
    }
}
