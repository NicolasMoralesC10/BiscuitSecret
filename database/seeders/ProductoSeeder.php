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
        // Crea productos específicos, como "Galleta de chocolate" y "Galleta de vainilla"
        Producto::create([
            'nombre' => 'Galleta de chocolate',
            'descripcion' => 'Deliciosa galleta de chocolate',
            'precio' => 50,
            'cantidad' => 100,
            'imagen' => 'chocolate.jpg',
            'estado' => 1
        ]);

        Producto::create([
            'nombre' => 'Galleta de vainilla',
            'descripcion' => 'Sabor suave de vainilla',
            'precio' => 45,
            'cantidad' => 100,
            'imagen' => 'vainilla.jpg',
            'estado' => 1
        ]);

        // También puedes crear productos adicionales usando el factory
        /* Producto::factory()->count(3)->create(); */
    }
}
