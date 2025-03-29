<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;

class ProductoController extends Controller
{
    public function index()
    {

        $productos = Productos::paginate(1);
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required',
            'cantidad' => 'required',
            'descripcion' => 'required',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validar imagen
        ]);

        $data = $request->all();
        $data['estado'] = 1;

        // Subir la imagen, si existe
        if ($request->hasFile('imagen')) {
            // Generar un nombre único para la imagen
            $imagenName = time() . '.' . $request->imagen->getClientOriginalExtension();

            // Guardar la imagen en la carpeta 'productos' dentro de 'storage/app/public'
            $path = $request->file('imagen')->storeAs('productos', $imagenName, 'public');

            // Guardar la ruta de la imagen en los datos que se guardarán
            $data['imagen'] = $path;
        }

        Productos::create($data);
        return redirect()->route('productos.index');
    }

    public function edit(Productos $producto)
    {

        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, Productos $producto)
    {
        $data = $request->validate([
            'nombre' => 'required',
            'precio' => 'required',
            'cantidad' => 'required',
            'descripcion' => 'required',
            'estado' => 'required',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);


        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('images', 'public');
            $data['imagen'] = $path;
        } else {
            unset($data['imagen']);
        }

        $producto->update($data);
        return redirect()->route('productos.index');
    }

    public function destroy(Productos $producto)
    {
        $producto->delete();

        return redirect()->route('productos.index');
    }
}
