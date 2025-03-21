<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/* use App\Models\Producto; */
use App\Models\Venta;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::paginate();

        return view('ventas.index', compact('ventas'));
    }

    public function create() {
        $productos = Producto::all();

        return view('ventas.create', compact('productos'));
    }

    // Método para guardar un nuevo producto
    public function store(Request $request) {
        return "Guardando un nuevo producto";
    }
    
    // Método para editar un producto
    public function edit($id) {
        return "Formulario para editar el producto con ID: " . $id;
    }

    // Método para actualizar un producto
    public function update(Request $request, $id) {
        return "Actualizando producto con ID: " . $id;
    }

    // Método para eliminar un producto
    public function destroy($id) {
        return "Eliminando producto con ID: " . $id;
    }

}
