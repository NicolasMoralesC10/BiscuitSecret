<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $fillable = [
        'total',
        'metodo_pago',
        'estado',/* 
        'created_at',
        'updated_at' */
    ];

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'ventas_has_productos', 'ventas_id_venta', 'productos_id_producto')
                    ->withPivot('cantidad', 'subtotal','estado');
    }
}
