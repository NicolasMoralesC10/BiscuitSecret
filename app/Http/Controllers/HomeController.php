<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Producto;
use App\Models\Venta;

class HomeController extends Controller
{
    public function home()
    {
        return redirect('dashboard');
    }

    public function index(Request $request)
    {
        $productosBajoStock = Producto::where('cantidad', '<', 5)->where('estado', 1)->pluck('nombre')->toArray();
        $totalVentas = Venta::where('estado', 1)->sum('total');
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
               'productosBajoStock' => $productosBajoStock,
           ];

        return view('dashboard', compact('reportes'));
    }

     // Obtener ventas totales por producto
     /* Con Eloquent */
     /* public function obtenerVentasTotales()
     {
         // Obtener los productos con la relación a la tabla pivote y calcular las ventas totales
         $productos = Producto::with(['ventas' => function ($query) {
             $query->selectRaw('sum(cantidad * subtotal) as total_ventas, productos_id_producto')
                   ->groupBy('productos_id_producto');
         }])->get();
 
         // Procesar los datos para devolverlos en el formato adecuado
         $data = [];
         foreach ($productos as $producto) {
             $totalVentas = $producto->ventas->sum('total_ventas');
             $data[] = [
                 'nombre_producto' => $producto->nombre,
                 'ventas_totales' => $totalVentas
             ];
         }
 
         return response()->json($data);
     } */

     /* Con Query Builder */
     public function obtenerVentasTotales()
    {
        // Consulta utilizando DB para obtener el total de ventas por producto
        $productos = DB::table('productos')
            ->select('productos.nombre', DB::raw('SUM(ventas_has_productos.subtotal) as total_ventas'))
            ->join('ventas_has_productos', 'productos.id', '=', 'ventas_has_productos.productos_id_producto')
            ->join('ventas', 'ventas.id', '=', 'ventas_has_productos.ventas_id_venta')
            ->where('ventas.estado', 1)
            ->groupBy('productos.id', 'productos.nombre')
            ->get();

        // Procesar los datos para devolverlos en el formato adecuado
        $data = [];
        foreach ($productos as $producto) {
            $data[] = [
                'nombre_producto' => $producto->nombre,
                'ventas_totales' => $producto->total_ventas
            ];
        }

        return response()->json($data);
    }

    public function obtenerVentasPorHora()
    {
        // Horas predeterminadas (de 8:00 AM a 5:00 PM)
        $horasPredeterminadas = ['', '08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00'];

        // Obtener productos únicos que tienen ventas activas
        $productos = DB::table('productos')
            ->join('ventas_has_productos', 'productos.id', '=', 'ventas_has_productos.productos_id_producto')
            ->join('ventas', 'ventas.id', '=', 'ventas_has_productos.ventas_id_venta')
            ->where('ventas.estado', 1)
            ->distinct()
            ->pluck('productos.nombre');

        // Inicializar estructura de ventas agrupadas por hora y producto
        $ventasAgrupadas = [];
        foreach ($horasPredeterminadas as $hora) {
            $ventasAgrupadas[$hora] = [];
            foreach ($productos as $producto) {
                $ventasAgrupadas[$hora][$producto] = 0;
            }
        }

        // Obtener las ventas desde la base de datos
        $resultados = DB::table('ventas_has_productos')
            ->join('productos', 'productos.id', '=', 'ventas_has_productos.productos_id_producto')
            ->join('ventas', 'ventas.id', '=', 'ventas_has_productos.ventas_id_venta')
            ->select(
                'productos.nombre',
                DB::raw('SUM(ventas_has_productos.cantidad) as cantidad_vendida'),
                DB::raw('HOUR(ventas.created_at) as hora')
            )
            ->where('ventas.estado', 1)
            ->whereBetween(DB::raw('HOUR(ventas.created_at)'), [8, 17])
            ->groupBy('productos.nombre', 'hora')
            ->orderBy('hora', 'asc')
            ->get();

        // Asignar cantidades a la estructura inicializada
        foreach ($resultados as $venta) {
            $hora = str_pad($venta->hora, 2, '0', STR_PAD_LEFT) . ':00';
            if (isset($ventasAgrupadas[$hora]) && isset($ventasAgrupadas[$hora][$venta->nombre])) {
                $ventasAgrupadas[$hora][$venta->nombre] = $venta->cantidad_vendida;
            }
        }

        // Formatear para el frontend
        $data = [
            'productos' => $productos,
            'horas' => $horasPredeterminadas,
            'ventas' => $ventasAgrupadas
        ];

        return response()->json($data);
    }

    // Cambios:
    //   Definir las horas predeterminadas: se declara un array con las horas a mostrar, de 08:00 a 17:00 (horas enteras de 24 horas). Esto elimina la dependencia de las horas que vienen de la base de datos.
    //   
    //   Inicialización de ventas agrupadas: se inicializa el array $ventasAgrupadas con las horas predeterminadas y asignamos las ventas de los productos.
    //   
    //   Procesamiento de los resultados: se asignan las cantidades de ventas de los productos a la hora correspondiente. Si no hay ventas en una hora, la cantidad se mantiene en 0.
    //   
    //   Transformación de datos: finalmente, se formatea el array para que sea adecuado para el frontend y se envía como respuesta en formato JSON. 
    
}
