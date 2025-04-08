<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Venta;
use App\Models\Producto;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Venta>
 */
class VentaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    protected $model = Venta::class;

    public function definition(): array
    {
        return [
            'total' => $this->faker->numberBetween(4000, 10000),
            'metodo_pago' => $this->faker->randomElement(['tarjeta', 'efectivo']),
            'estado' => 1,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Venta $venta) {
            $productos = Producto::inRandomOrder()->take(3)->get(); // 3 productos aleatorios
            foreach ($productos as $producto) {
                $venta->productos()->attach($producto->id, [
                    'cantidad' => $this->faker->numberBetween(1, 5),
                    'subtotal' => $this->faker->numberBetween(100, 500),
                    'estado' => 1
                ]);
            }
        });
    }
}
