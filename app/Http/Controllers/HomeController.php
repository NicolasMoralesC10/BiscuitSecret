<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Venta;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        /* $ventas = Venta::with('productos')->paginate(10); */
        $reportes[] = [];
        $totalVentas = Venta::sum('total');

        return view('dashboard', compact('totalVentas'));
    }

    public function home()
    {
        return redirect('dashboard');
    }
}
