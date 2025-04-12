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
        // Configuración general del PDF
        $fpdf->AddPage("landscape");
        $fpdf->AliasNbPages();
        $fpdf->SetMargins(20, 20, 20);
        $fpdf->SetAutoPageBreak(true, 20);

        // Encabezado: fondo con tono café muy claro y logo
        $this->addHeader($fpdf);

        // Título del reporte y línea separadora
        $this->addTitle($fpdf);

        // Tabla centrada con diseño moderno
        $this->addTable($fpdf);

        // Definir el nombre y salida del archivo PDF
        $nombreArchivo = 'Reporte - Productos Vendidos/' . date('Y-m-d_H-i-s') . '.pdf';
        $fpdf->Output($nombreArchivo, 'I');
        exit;
    }


    private function addHeader(Fpdf $fpdf)
    {
        $pageWidth = $fpdf->GetPageWidth();
        $headerY = 10;
        $headerHeight = 40;

        // Fondo del encabezado a toda la página
        $fpdf->SetFillColor(245, 222, 179); // color "wheat"
        $fpdf->Rect(0, $headerY, $pageWidth, $headerHeight, 'F'); // sin margen

        // Logo
        $logoPath = $_SERVER['DOCUMENT_ROOT'] . '/assets/img/logo-preview.png';
        if (file_exists($logoPath)) {
            $fpdf->Image($logoPath, 25, $headerY + 5, 30);
        } else {
            error_log("Logo no encontrado en: " . $logoPath);
        }

        //  Nombre de la empresa
        $fpdf->SetFont('Helvetica', 'B', 20);
        $fpdf->SetTextColor(50, 50, 50);
        $fpdf->SetXY(17, $headerY + 10);
        $fpdf->Cell(0, 10, utf8_decode('BISCUIT SECRET'), 0, 1, 'C');
        //  Fecha del día
        $fpdf->SetFont('Helvetica', '', 12);
        $fpdf->SetTextColor(80, 80, 80);
        $fecha = date('d/m/Y');
        $fpdf->SetX(17);
        $fpdf->Cell(0, 8, utf8_decode("Fecha de impresión: $fecha"), 0, 1, 'C');
        $hora = date('g:i A');
        $fpdf->SetX(17);
        $fpdf->Cell(0, 8, utf8_decode("Hora de impresión: $hora"), 0, 1, 'C');

        //  Mover cursor debajo del header
        $fpdf->SetY($headerY + $headerHeight + 5);
    }

  
    private function addTitle(Fpdf $fpdf)
    {
        $margin = 20;
        $pageWidth = $fpdf->GetPageWidth();

        //  Título del reporte
        $fpdf->SetFont('Helvetica', 'B', 18);
        $fpdf->SetTextColor(100, 100, 100);
        $fpdf->Cell(0, 10, utf8_decode("Productos Vendidos"), 0, 1, 'C');



        // Línea separadora
        $currentY = $fpdf->GetY();
        $fpdf->SetDrawColor(200, 200, 200);
        $fpdf->Line($margin, $currentY, $pageWidth - $margin, $currentY);

        $fpdf->Ln(8);
    }

   
    private function addTable(Fpdf $fpdf)
    {
        // Definición de anchos de columnas
        $colWidths = [80, 50, 50, 50]; // Suma total: 230
        $tableWidth = array_sum($colWidths);
        $pageWidth = $fpdf->GetPageWidth();
        // Calcular la posición X para centrar la tabla en la página
        $startX = ($pageWidth - $tableWidth) / 2;

        // Encabezado de la tabla
        $fpdf->SetX($startX);
        $fpdf->SetFillColor(161, 130, 98); // Fondo para el encabezado de la tabla
        $fpdf->SetTextColor(255, 255, 255);
        $fpdf->SetFont('Helvetica', 'B', 12);
        $headers = ['Nombre del Producto', 'Cantidad de Ventas', 'Total Recibido', 'Total Esperado'];
        foreach ($headers as $i => $header) {
            $fpdf->Cell($colWidths[$i], 10, utf8_decode($header), 1, 0, 'C', true);
        }
        $fpdf->Ln();

        // Filas de datos con fondo alternado para mejorar la legibilidad
        $productos = Producto::all();
        if (!empty($productos)) {
            $fill = false;
            $totalVentas = 0;
            $totalEsp = 0;
            $fpdf->SetFont('Helvetica', '', 11);
            foreach ($productos as $producto) {
                $fpdf->SetX($startX);
                $fpdf->SetFillColor(240, 240, 240); // Color claro para filas alternadas
                $fpdf->SetTextColor(50, 50, 50);

                // Columna: Nombre del producto
                $fpdf->Cell($colWidths[0], 10, utf8_decode($producto['nombre']), 1, 0, 'C', $fill);

                // Procesar las ventas del producto
                $ventas = Producto::find($producto['id'])->ventas;
                $totalVendido = 0;
                $valTotal = 0;
                foreach ($ventas as $venta) {
                    $ventaValidate = Venta::find($venta->pivot->ventas_id_venta);
                    if ($ventaValidate['estado'] == 1) {
                        $totalVendido += $venta->pivot->cantidad;
                        $valTotal += $venta->pivot->subtotal;
                    }
                }
                $totalEsperado = $totalVendido * $producto['precio'];
                $totalEsp += $totalEsperado;
                $totalVentas += $valTotal;

                // Columnas: Cantidad de ventas, Total recibido y Total esperado
                $fpdf->Cell($colWidths[1], 10, utf8_decode($totalVendido), 1, 0, 'C', $fill);
                $fpdf->Cell($colWidths[2], 10, utf8_decode($valTotal), 1, 0, 'C', $fill);
                $fpdf->Cell($colWidths[3], 10, utf8_decode($totalEsperado), 1, 1, 'C', $fill);

                $fill = !$fill;
            }
            // Fila de totales con fondo destacado
            $fpdf->SetX($startX);
            $fpdf->SetFillColor(161, 130, 98);
            $fpdf->SetTextColor(255, 255, 255);
            $fpdf->SetFont('Helvetica', 'B', 12);
            $fpdf->Cell($colWidths[0] + $colWidths[1], 10, utf8_decode("TOTAL DE VENTAS"), 1, 0, 'C', true);
            $fpdf->SetTextColor(50, 50, 50);
            $fpdf->Cell($colWidths[2], 10, utf8_decode($totalVentas), 1, 0, 'C', false);
            $fpdf->Cell($colWidths[3], 10, utf8_decode($totalEsp), 1, 1, 'C', false);
        } else {
            $fpdf->SetX($startX);
            $fpdf->SetTextColor(50, 50, 50);
            $fpdf->Cell($tableWidth, 10, utf8_decode("No se encontraron datos."), 1, 1, 'C');
        }
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
