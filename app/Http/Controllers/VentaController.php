<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VentaController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    
    // Método para mostrar todos los productos
    public function index(Request $request): View
    {
        $ventas = Venta::paginate();

        return view('venta.index', compact('ventas'))
            ->with('i', ($request->input('page', 1) - 1) * $ventas->perPage());
    }

    // Método para mostrar un producto específico
    public function show($id) {
    return "Mostrando producto con ID: " . $id;
    }
    // Método para crear un nuevo producto
    public function create() {
    return "Formulario para crear un nuevo producto";
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
