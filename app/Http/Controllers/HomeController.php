<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Producto;
use App\Models\Venta;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        /* $ventas = Venta::with('productos')->paginate(10); */

        $totalVentas = Venta::sum('total');
        $cantidadVentas = Venta::where('estado', 1)->count();
        $productosEnVenta = Producto::where('estado', 1)->count();
        $stocksBajo = Producto::where('cantidad', '<', 10)
            ->where('estado', 1)
            ->count();

        $reportes = [
            'totalVentas' => $totalVentas,
            'cantidadVentas' => $cantidadVentas,
            'productosEnVenta' => $productosEnVenta,
            'stocksBajo' => $stocksBajo,
        ];

        return view('dashboard', compact('reportes'));
    }

    public function home()
    {
        return redirect('dashboard');
    }
}
