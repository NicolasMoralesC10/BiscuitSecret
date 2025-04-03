<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'cantidad',
        'imagen',
        'estado',
    ];
    
    public function ventas()
    {
        return $this->belongsToMany(Venta::class, 'ventas_has_productos', 'productos_id_producto', 'ventas_id_venta')
                    ->withPivot('cantidad', 'subtotal','estado');
    }
}
