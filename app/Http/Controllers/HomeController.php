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
        /* $ventas = Venta::with('productos')->paginate(10); */
        
        $productosBajoStock = Producto::where('cantidad', '<', 5)->pluck('nombre')->toArray();
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

    /* public function obtenerVentasPorHora()
    {
        // Realiza la consulta
        $resultados = DB::table('ventas')
            ->join('ventas_has_productos', 'ventas.id', '=', 'ventas_has_productos.ventas_id_venta')
            ->join('productos', 'productos.id', '=', 'ventas_has_productos.productos_id_producto')
            ->select(
                DB::raw('HOUR(ventas.created_at) as hora'), // Extrae la hora de la venta
                'productos.nombre',
                DB::raw('SUM(ventas_has_productos.cantidad) as cantidad_vendida') // Suma la cantidad de productos vendidos
            )
            ->whereBetween(DB::raw('HOUR(ventas.created_at)'), [9, 18]) // Filtra las ventas entre las 9:00 y las 18:00
            ->groupBy(DB::raw('HOUR(ventas.created_at)'), 'productos.nombre') // Agrupa por hora y por producto
            ->orderBy('hora', 'asc') // Ordena por hora de venta
            ->get();

        // Devuelve los resultados
        return $resultados;
    } */

    /* public function obtenerVentasPorHoraFormato12()
    {
        // Realiza la consulta
        $resultados = DB::table('ventas')
            ->join('ventas_has_productos', 'ventas.id', '=', 'ventas_has_productos.ventas_id_venta')
            ->join('productos', 'productos.id', '=', 'ventas_has_productos.productos_id_producto')
            ->select(
                DB::raw('DATE_FORMAT(ventas.created_at, "%h:%i %p") as hora'), // Extrae la hora en formato de 12 horas
                'productos.nombre',
                DB::raw('SUM(ventas_has_productos.cantidad) as cantidad_vendida') // Suma la cantidad de productos vendidos
            )
            ->whereBetween(DB::raw('HOUR(ventas.created_at)'), [9, 18]) // Filtra las ventas entre las 9:00 y las 18:00
            ->groupBy(DB::raw('DATE_FORMAT(ventas.created_at, "%h:%i %p")'), 'productos.nombre') // Agrupa por hora en formato de 12 horas y por producto
            ->orderBy('hora', 'asc') // Ordena por hora de venta
            ->get();

        // Devuelve los resultados
        return $resultados;
    } */

    /* public function obtenerVentas()
    {
        // Obtener las ventas con las relaciones y agregarlas por hora y producto
        $resultados = DB::table('ventas_has_productos')
        ->join('ventas', 'ventas.id', '=', 'ventas_has_productos.ventas_id_venta')
        ->join('productos', 'productos.id', '=', 'ventas_has_productos.productos_id_producto')
        ->select(
            DB::raw('DATE_FORMAT(ventas.created_at, "%h:%i %p") as hora'), // Hora en formato de 12 horas
            'productos.nombre',
            DB::raw('SUM(ventas_has_productos.cantidad) as cantidad_vendida') // Sumar la cantidad de productos vendidos
        )
        ->whereBetween(DB::raw('HOUR(ventas.created_at)'), [8, 18]) // Filtrar ventas entre las 8:00 AM y 6:00 PM
        ->groupBy(DB::raw('DATE_FORMAT(ventas.created_at, "%h:%i %p")'), 'productos.nombre') // Agrupar por hora y producto
        ->orderBy('hora', 'asc') // Ordenar por hora
        ->get();

        // Formatear los resultados en un formato adecuado para el frontend
        $data = $resultados->map(function ($venta) {
            return [
                'hora' => $venta->hora,
                'nombre' => $venta->nombre,
                'cantidad_vendida' => $venta->cantidad_vendida,
            ];
        });

        return response()->json($data);
    } */

/*     public function obtenerVentas()
{
    // Obtener las ventas con las relaciones y agregarlas por hora y producto
    $resultados = DB::table('ventas_has_productos')
        ->join('ventas', 'ventas.id', '=', 'ventas_has_productos.ventas_id_venta')
        ->join('productos', 'productos.id', '=', 'ventas_has_productos.productos_id_producto')
        ->select(
            DB::raw('DATE_FORMAT(ventas.created_at, "%H:%i") as hora'), // Hora en formato de 24 horas
            'productos.nombre',
            DB::raw('SUM(ventas_has_productos.cantidad) as cantidad_vendida') // Sumar la cantidad de productos vendidos
        )
        ->whereBetween(DB::raw('HOUR(ventas.created_at)'), [8, 18]) // Filtrar ventas entre las 8:00 AM y 6:00 PM
        ->groupBy(DB::raw('DATE_FORMAT(ventas.created_at, "%H:%i")'), 'productos.nombre') // Agrupar por hora y producto
        ->orderBy('hora', 'asc') // Ordenar por hora
        ->get();

    // Formatear los resultados en un formato adecuado para el frontend
    $data = $resultados->map(function ($venta) {
        return [
            'hora' => $venta->hora, // Hora en formato 24 horas
            'nombre' => $venta->nombre,
            'cantidad_vendida' => $venta->cantidad_vendida,
        ];
    });

    return response()->json($data);
} */

    /* public function obtenerVentas()
    {
        // Obtener las ventas con las relaciones y agregarlas por hora y producto
        $resultados = DB::table('ventas_has_productos')
            ->join('ventas', 'ventas.id', '=', 'ventas_has_productos.ventas_id_venta')
            ->join('productos', 'productos.id', '=', 'ventas_has_productos.productos_id_producto')
            ->select(
                DB::raw('DATE_FORMAT(ventas.created_at, "%H:%i") as hora'), // Hora en formato de 24 horas
                'productos.nombre',
                DB::raw('SUM(ventas_has_productos.cantidad) as cantidad_vendida') // Sumar la cantidad de productos vendidos
            )
            ->whereBetween(DB::raw('HOUR(ventas.created_at)'), [8, 18]) // Filtrar ventas entre las 8:00 AM y 6:00 PM
            ->groupBy(DB::raw('DATE_FORMAT(ventas.created_at, "%H:%i")'), 'productos.nombre') // Agrupar por hora y producto
            ->orderBy('hora', 'asc') // Ordenar por hora
            ->get();

        // Crear un array para almacenar los resultados por hora y producto
        $ventasAgrupadas = [];

        // Agrupar los resultados
        foreach ($resultados as $venta) {
            $hora = $venta->hora;
            $nombre = $venta->nombre;

            // Si la hora ya existe, sumamos la cantidad
            if (!isset($ventasAgrupadas[$hora])) {
                $ventasAgrupadas[$hora] = [];
            }

            // Si el producto ya existe en esa hora, sumamos la cantidad vendida
            if (isset($ventasAgrupadas[$hora][$nombre])) {
                $ventasAgrupadas[$hora][$nombre] += $venta->cantidad_vendida;
            } else {
                $ventasAgrupadas[$hora][$nombre] = $venta->cantidad_vendida;
            }
        }

        // Convertir el array en un formato adecuado para el frontend
        $data = [];
        foreach ($ventasAgrupadas as $hora => $productos) {
            foreach ($productos as $nombre => $cantidad_vendida) {
                $data[] = [
                    'hora' => $hora,
                    'nombre' => $nombre,
                    'cantidad_vendida' => $cantidad_vendida,
                ];
            }
        }

        return response()->json($data);
    } */

     // Función para obtener ventas totales por producto
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
            ->select('productos.nombre', DB::raw('SUM(ventas_has_productos.cantidad * ventas_has_productos.subtotal) as total_ventas'))
            ->join('ventas_has_productos', 'productos.id', '=', 'ventas_has_productos.productos_id_producto')
            ->join('ventas', 'ventas.id', '=', 'ventas_has_productos.ventas_id_venta') // <-- este join es necesario
            ->where('ventas.estado', 1) // <-- aquí aplicamos el filtro
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
        // Definir las horas predeterminadas (de 8:00 AM a 6:00 PM)
        $horasPredeterminadas = [
            '', '08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00'
        ];
    
        // Inicializar el array para almacenar las ventas agrupadas por hora y producto
        $ventasAgrupadas = [];
    
        // Obtener las ventas de la base de datos
        $resultados = DB::table('ventas_has_productos')
            ->join('productos', 'productos.id', '=', 'ventas_has_productos.productos_id_producto')
            ->select(
                'productos.nombre',
                DB::raw('SUM(ventas_has_productos.cantidad) as cantidad_vendida'),
                DB::raw('HOUR(ventas.created_at) as hora')
            )
            ->join('ventas', 'ventas.id', '=', 'ventas_has_productos.ventas_id_venta')
            ->where('ventas.estado', 1)
            ->whereBetween(DB::raw('HOUR(ventas.created_at)'), [8, 18]) // Filtrar ventas entre las 8:00 AM y 6:00 PM
            ->groupBy('productos.nombre', 'hora')
            ->orderBy('hora', 'asc') // Ordenar por hora
            ->get();
    
        // Inicializar los resultados para las horas predeterminadas
        foreach ($horasPredeterminadas as $hora) {
            // Inicializar los productos para cada hora
            $ventasAgrupadas[$hora] = [
                'Galleta de Chocolate' => 0,
                'Galleta de Oreo' => 0,
                'Galleta de Snickers y Masmelos' => 0,
                'Galleta de Avena con Fresas' => 0,
            ];
        }
    
        // Procesar los resultados de la base de datos y asignarlos a las horas predeterminadas
        foreach ($resultados as $venta) {
            // Asignar las cantidades vendidas a la hora correcta
            $hora = str_pad($venta->hora, 2, '0', STR_PAD_LEFT) . ':00';  // Convertir la hora a formato HH:00
            $nombre = $venta->nombre;
    
            if (isset($ventasAgrupadas[$hora])) {
                $ventasAgrupadas[$hora][$nombre] = $venta->cantidad_vendida;
            }
        }
    
        // Transformar los datos a un formato adecuado para el frontend
        $data = [];
        foreach ($ventasAgrupadas as $hora => $productos) {
            foreach ($productos as $nombre => $cantidad_vendida) {
                $data[] = [
                    'hora' => $hora,
                    'nombre' => $nombre,
                    'cantidad_vendida' => $cantidad_vendida,
                ];
            }
        }
    
        // Retornar los datos en formato JSON
        return response()->json($data);
    }

    /* Explicación de los cambios:
Definir las horas predeterminadas: Creamos un array con las horas que deseas mostrar, de 08:00 a 17:00 (horas enteras de 24 horas). Esto elimina la dependencia de las horas que vienen de la base de datos.

Inicialización de ventas agrupadas: Inicializamos el array $ventasAgrupadas con las horas predeterminadas y asignamos las ventas de los productos Galleta de chocolate y Galleta de vainilla para cada hora.

Procesamiento de los resultados: Una vez obtenidos los resultados de la base de datos, asignamos las cantidades de ventas de los productos a la hora correspondiente. Si no hay ventas en una hora, la cantidad se mantiene en 0.

Transformación de datos: Finalmente, se formatea el array para que sea adecuado para el frontend y se envía como respuesta en formato JSON. */
    
}
