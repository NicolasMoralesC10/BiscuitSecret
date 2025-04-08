<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear productos específicos
        Producto::create([
            'nombre' => 'Galleta de Chocolate',
            'descripcion' => 'Galleta artesanal rellena de chocolate por dentro con chips de chocolate en la capa superior.',
            'precio' => 4000,
            'cantidad' => 50,
            'imagen' => 'chocolate.jpg',
            'estado' => 1
        ]);

        Producto::create([
            'nombre' => 'Galleta de Oreo',
            'descripcion' => 'Galleta artesanal rellena de cookies and cream con trozos de galleta oreo en su capa superior.',
            'precio' => 4000,
            'cantidad' => 50,
            'imagen' => 'vainilla.jpg',
            'estado' => 1
        ]);

        Producto::create([
            'nombre' => 'Galleta de Snickers y Masmelos',
            'descripcion' => 'Galleta artesanal rellena de sneakers con trozos de masmelos en su capa interior.',
            'precio' => 5000,
            'cantidad' => 50,
            'imagen' => 'snickers.jpg',
            'estado' => 1
        ]);

        Producto::create([
            'nombre' => 'Galleta de Avena con Fresas',
            'descripcion' => 'Galleta artesanal rellena de avena con fresas en su capa superior.',
            'precio' => 4500,
            'cantidad' => 50,
            'imagen' => 'avenaconfresas.jpg',
            'estado' => 1
        ]);

        // También puedes crear productos adicionales usando el factory
        /* Producto::factory()->count(3)->create(); */
    }
}
