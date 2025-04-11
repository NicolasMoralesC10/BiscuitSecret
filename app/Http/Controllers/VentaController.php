<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Producto;
use App\Models\Venta;
use Codedge\Fpdf\Fpdf\Fpdf;
class VentaController extends Controller
{
    public function index(Request $request)
    {
        /* $ventas = Venta::with('productos')->paginate(10); */
        $ventas = Venta::with('productos')->where('estado', 1)->paginate(6);

        return view('ventas.index', compact('ventas'))
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
    public function pdf(Fpdf $fpdf): RedirectResponse
    {

        $fpdf->AddPage("landscape");
        $fpdf->AliasNbPages();
        $fpdf->SetFont('Arial', '', 12);
        $fpdf->SetDrawColor(163, 163, 163);
        $fpdf->Cell(95);
        $fpdf->SetTextColor(0, 0, 0);
        $fpdf->Cell(92, 15, utf8_decode('BISCUIT SECRET'), 0, 1, 'C', 0);
        $fpdf->Ln(3);

        /* TÍTULO DE LA TABLA */
        $fpdf->SetTextColor(161, 130, 98);
        $fpdf->Cell(100);
        $fpdf->SetFont('Arial', 'B', 15);
        $fpdf->Cell(82, 10, utf8_decode("PRODUCTOS VENDIDOS"), 0, 1, 'C', 0);
        $fpdf->Ln(7);

        /* CAMPOS DE LA TABLA */
        $fpdf->SetFillColor(161, 130, 98);
        $fpdf->SetTextColor(255, 255, 255);
        $fpdf->SetDrawColor(163, 163, 163);
        $fpdf->SetFont('Arial', 'B', 11);
        $fpdf->Cell(120, 10, utf8_decode('NOMBRE DEL PRODUCTO'), 1, 0, 'C', 1);
        $fpdf->Cell(53, 10, utf8_decode('CANTIDAD DE VENTAS'), 1, 0, 'C', 1);
        $fpdf->Cell(53, 10, utf8_decode('TOTAL RECIBIDO'), 1, 0, 'C', 1);
        $fpdf->Cell(53, 10, utf8_decode('TOTAL ESPERADO'), 1, 1, 'C', 1);
        $productos = Producto::all();
        if (!empty($productos)) {
            $totalVentas = 0;
            $totalEsp = 0;
            foreach ($productos as $producto) {
                $product = Producto::find($producto['id']);
                $ventas = $product->ventas;
                $totalVendido = 0;
                $totalEsperado = 0;
                $valTotal = 0;
                // Crear filas de la tabla con los datos de la consulta
                $fpdf->SetTextColor(0, 0, 0);
                $fpdf->Cell(120, 10, utf8_decode($producto['nombre']), 1, 0, 'C', 0);
                foreach ($ventas as $venta){
                    $ventaValidate = Venta::find($venta->pivot->ventas_id_venta);
                    if ($ventaValidate['estado'] == 1){
                        $totalVendido += $venta->pivot->cantidad;
                        $valTotal += $venta->pivot->subtotal;
                    }
                }
                $totalEsperado = $totalVendido * $producto['precio'];
                $totalEsp += $totalEsperado;
                $totalVentas += $valTotal;
                $fpdf->SetTextColor(0, 0, 0);
                $fpdf->Cell(53, 10, utf8_decode($totalVendido), 1, 0, 'C', 0);
                $fpdf->SetTextColor(0, 0, 0);
                $fpdf->Cell(53, 10, utf8_decode($valTotal), 1, 0, 'C', 0);
                $fpdf->SetTextColor(0, 0, 0);
                $fpdf->Cell(53, 10, utf8_decode($totalEsperado), 1, 1, 'C', 0);

            }
            $fpdf->SetFillColor(161, 130, 98);
            $fpdf->SetTextColor(255, 255, 255);
            $fpdf->SetDrawColor(163, 163, 163);
            $fpdf->SetFont('Arial', 'B', 11);
            $fpdf->Cell(173, 10, utf8_decode("TOTAL DE VENTAS"), 1, 0, 'C', 1);
            $fpdf->SetTextColor(0, 0, 0);
            $fpdf->Cell(53, 10, utf8_decode($totalVentas), 1, 0, 'C', 0);     
            $fpdf->SetTextColor(0, 0, 0);
            $fpdf->Cell(53, 10, utf8_decode($totalEsp), 1, 1, 'C', 0);     
        } else {
            $fpdf->Cell(40);
            $fpdf->SetTextColor(0, 0, 0);
            $fpdf->Cell(200, 10, 'No se encontraron datos.', 1, 1, 'C');
        }


        $nombreArchivo = 'Reporte - Productos Vendidos/' . date('Y-m-d_H-i-s') . '.pdf';
        $fpdf->Output($nombreArchivo, 'I');
        exit;
    }
    public function create()
    {
        $productos = Producto::all();

        return view('ventas.create', compact('productos'));
        /*  return view('ventas.create'); */
    }

    // Método para guardar un nuevo producto
    /* public function store(Request $request)
    { */
        /* try { */
            /* foreach ($request->producto_id as $index => $id) {
               $producto = Producto::find($id);
               if ($producto['cantidad'] < $request->cantidad[$index]){
                   return Redirect::route('ventas.index')
                   ->with('error', 'La cantidad del producto '. $producto->nombre . ' excede el stock.');
               }
            } */
            /* $venta = Venta::create($request->only(['total'])); */

            /* $producto = Producto::all();
            $total = 0;
            foreach ($request->producto_id as $index => $id) {
                if ($producto->id === $id) {
                    $total += $producto->precio * $request->cantidad[$index];
                }
            } */
        
            /* $venta = Venta::create([
                'total' => $request->total,
                'estado' => 1, 
            ]);
        
            foreach ($request->producto_id as $index => $id) {
                $producto = Producto::find($id);
                $subtotal = $producto['precio']*$request->cantidad[$index];
                $newStock = $producto['cantidad']-$request->cantidad[$index];
                Producto::where('id', $id)->update(['cantidad'=>$newStock]);
                $venta->productos()->attach($id, [
                    //Se usa ?? 1 para asignar un valor predeterminado si no se encuentra el índice.
                    'cantidad' => $request->cantidad[$index] ?? 1,
                    'subtotal' => $subtotal,
                    'estado' => 1
                ]);
            }
            
            return response()->json(['success' => true, 'message' => '¡Venta registrada correctamente!']);
        }
        catch (\Exception $e) {
            // Si ocurre algún error, maneja la excepción y devuelve un error
            return response()->json(['success' => false, 'message' => 'Error al registrar la venta.'], 500);
        } */
        
        /* return redirect()->route('ventas.index'); */
        /* return "Guardando un nuevo producto"; */
    /* } */

    public function store(Request $request)
    {
        try {
            // Validación de los datos, $validated = array asociativo, no un objeto
            $validated = $request->validate([
                'producto_id' => 'required|array', // Asegura que producto_id es un arreglo
                'producto_id.*' => 'exists:productos,id|integer', // Cada valor de producto_id debe existir en la base de datos y ser un entero
                'cantidad' => 'required|array', // Asegura que cantidad es un arreglo
                'cantidad.*' => 'required|integer|min:1', // Cada cantidad debe ser un número entero positivo
                'precio' => 'required|array', // Asegura que precio es un arreglo
                'precio.*' => 'required|integer|min:1', // Cada precio debe ser un número entero positivo
                'total' => 'required|numeric|min:1', // Asegura que el total es un número entero positivo
            ]);
        
            // Crea la venta
            $venta = Venta::create([
                'total' => $validated['total'],
                'estado' => 1, 
            ]);
        
            // Procesar productos
            foreach ($validated['producto_id'] as $index => $id) {
                $producto = Producto::find($id);
            
                // Verificar si la cantidad en stock es suficiente
                if ($producto->cantidad < $validated['cantidad'][$index]) {
                    return response()->json([
                        'success' => false,
                        'message' => 'La cantidad del producto ' . $producto->nombre . ' excede el stock.'
                    ], 400);
                }
            
                // Calcular el subtotal (trayendo el precio de la base de datos, sin descuentos)
                /* $subtotal = $producto->precio * $validated['cantidad'][$index]; */
                
                $newStock = $producto->cantidad - $validated['cantidad'][$index];
                $subtotal = $validated['precio'][$index] * $validated['cantidad'][$index];
            
                // Actualizar el stock del producto
                Producto::where('id', $id)->update(['cantidad' => $newStock]);
            
                // Asociar el producto con la venta
                $venta->productos()->attach($id, [
                    'cantidad' => $validated['cantidad'][$index],
                    'subtotal' => $subtotal,
                    'estado' => 1
                ]);
            }
        
            // Respuesta exitosa
            return response()->json(['success' => true, 'message' => '¡Venta registrada correctamente!']);
        } catch (\Exception $e) {
            // Si ocurre algún error, maneja la excepción y devuelve un error
            return response()->json(['success' => false, 'message' => 'Error al registrar la venta.'], 500);
        }
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
      $venta = Venta::with('productos')->find($id);
      $productos = $venta->productos;
      
        /* $productos_venta = Venta::with('productos')->where('ventas_id_venta', $id)->get(); */

      foreach ($productos as $index => $producto) {
          $IDes_prods[$index] = $producto->pivot->productos_id_producto; // Acceder a campos de la tabla pivote
          /* echo $IDes_prods[$index] . "</br>"; */
      }

        $venta = Venta::find($id);
        $venta->update([
            'estado' => 0
        ]);


        foreach ($IDes_prods as $index => $id) {  

         // updateExistingPivot :: permite actualizar campos específicos en una relación existente sin crear una nueva relación si no existe
         $venta->productos()->updateExistingPivot($id, [
              'estado' => 0
          ]);
        }
          
        $prod = Producto::find($id);        
        foreach ($productos as $index => $producto) {
            $newStock = $prod->cantidad + $producto->pivot->cantidad;
            Producto::where('id', $id)->update(['cantidad' => $newStock]); // Actualizar el stock del producto
        }

        return redirect()->route('ventas.index');
    }
}
