<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ventas_has_productos extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_venta_producto',
        'ventas_id_venta',
        'productos_id_producto',
        'cantidad',
        'subtotal',
        'estado',
    ];
}
