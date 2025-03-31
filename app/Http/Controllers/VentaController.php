<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Producto;
use App\Models\Venta;

class VentaController extends Controller
{
    public function index(Request $request)
    {
        $ventas = Venta::paginate();
        $prod_ventas = Venta::productos();
        $productos = Producto::all(['id_producto','nombre']);

        return view('ventas.index', compact('ventas', 'productos', 'prod_ventas'))
            ->with('i', ($request->input('page', 1) - 1) * $ventas->perPage());
    }
    
    public function obtenerStock(Request $request)
    {
        $id_pro = $request->input('id_pro');
        
        // Buscar producto por ID
        $producto = Producto::find($id_pro);
        
        if (!$producto) {
            return response()->json([
                'error' => 'Producto no encontrado.',
            ]);
        }

        return response()->json([
            'stock' => $producto->cantidad,
        ]);
    }

    public function create()
    {
        $productos = Producto::all();

        return view('ventas.create', compact('productos'));
        /*  return view('ventas.create'); */
    }

    // Método para guardar un nuevo producto
    public function store(Request $request)
    {
        foreach ($request->producto_id as $index => $id) {
            $producto = Producto::find($id);
            if ($producto['cantidad'] < $request->cantidad[$index]){
                return Redirect::route('ventas.index')
                ->with('error', 'La cantidad del producto '. $producto->nombre . ' excede el stock.');
            }
        }
        /* $venta = Venta::create($request->only(['total'])); */

        $venta = Venta::create([
            'total' => $request->total,
            'estado' => 1, 
        ]);

        foreach ($request->producto_id as $index => $id) {
            $producto = Producto::find($id);
            $subtotal = $producto['precio']*$request->cantidad[$index];
            $newStock = $producto['cantidad']-$request->cantidad[$index];
            Producto::where('id_producto', $id)->update(['cantidad'=>$newStock]);
            $venta->productos()->attach($id, [
                //Se usa ?? 1 para asignar un valor predeterminado si no se encuentra el índice.
                'cantidad' => $request->cantidad[$index] ?? 1,
                'subtotal' => $subtotal,
                'estado' => 1
            ]);
        }
        return redirect()->route('ventas.index');
        /* return "Guardando un nuevo producto"; */
    }

    // Método para editar un producto
    public function edit($id)
    {
        return "Formulario para editar el producto con ID: " . $id;
    }

    // Método para actualizar un producto
    public function update(Request $request, $id)
    {
        return "Actualizando producto con ID: " . $id;
    }

    // Método para eliminar un producto
    public function destroy($id)
    {
        return "Eliminando producto con ID: " . $id;
    }
}
