<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagenesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('imagenes')->insert([
            [
                'titulo' => 'Perro Labrador',
                'archivo' => 'ejemplo1.jpg',
                'baneada' => 0,
                'motivo_ban' => null,
                'cuenta_user' => 'artista',
            ],
            [
                'titulo' => 'Perro chihuahua',
                'archivo' => 'ejemplo2.jpg',
                'baneada' => 1,
                'motivo_ban' => 'Imagen no permitida por el equipo de administradores',
                'cuenta_user' => 'artista',
            ]
        ]);
    }
}
