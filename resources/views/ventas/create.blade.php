@extends('layouts.user_type.auth')

@section('content')
<div>
   <div class="alert alert-secondary mx-4 bg-gradient-primary text-center" role="alert">
      <strong class="text-white">
         ¡Administra tu flujo de Ventas! Revisa, crea y elimina ventas al instante.
      </strong>
   </div>

   <div class="container-fluid ps-4 pb-4 pe-4">
      <div class="card">
         <div class="card-header pb-0 px-3">
            <h6 class="mb-0">{{ __('Nueva Venta') }}</h6>
         </div>
         <div class="card-body pt-4 p-3">
            <form action="" method="POST" id="form-venta" role="form text-left">
               @csrf
               @if($errors->any())
               <div class="mt-3  alert alert-primary alert-dismissible fade show" role="alert">
                  <span class="alert-text text-white">
                     {{$errors->first()}}</span>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                     <i class="fa fa-close" aria-hidden="true"></i>
                  </button>
               </div>
               @endif
               @if(session('success'))
               <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                  <span class="alert-text text-white">
                     {{ session('success') }}</span>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                     <i class="fa fa-close" aria-hidden="true"></i>
                  </button>
               </div>
               @endif

               <div class="container-fluid">
                  <div class="row">
                     <div class="form-group">
                        <label for="product">Buscar Producto</label>
                        <input type="text" class="form-control" id="product" placeholder="Ingrese el nombre del producto">
                     </div>
                  </div>
                  <!-- </div> -->


                  <!-- <div class="card-body px-0 pt-0 pb-2">
                                        <div class="table-responsive p-0">
                                    
                                            <table class="table bordered align-items-center mb-3">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Producto</th>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Cantidad</th>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Precio</th>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Eliminar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    Aquí se agregan dinámicamente las filas
                                                </tbody>
                                            </table>
                                        </div>
                                    </div> -->




                  <!-- <div class="container-fluid"> -->
                  <div class="row">
                     <div class="col-12">
                        <div class="card mb-4 shadow-lg" id="card-table">
                           <!-- <div class="card-header">
                                          <h6>Productos</h6>
                                        </div> -->
                           <div class="card-body px-0 pt-0 pb-2">
                              <div class="table-responsive p-0">
                                 <table class="table align-items-center mb-0" id="tabla-productos">
                                    <thead>
                                       <tr>
                                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Producto</th>
                                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Cantidad</th>
                                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Precio</th>
                                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ELiminar</th>
                                          <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Producto</th>
                     	                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Cantidad</th>
                     	                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Precio</th>
                     	                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Eliminar</th> -->
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <!-- <tr>
                                                        <td>
                                                            <div class="d-flex px-2 py-1">
                                                                <div>
                                                                    <img src="../assets/img/team-3.jpg" class="avatar avatar-sm me-3" alt="user2">
                                                                </div>
                                                                <div class="d-flex flex-column justify-content-center">
                                                                    <h6 class="mb-0 text-sm">Alexa Liras</h6>
                                                                    <p class="text-xs text-secondary mb-0">alexa@creative-tim.com</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p class="text-xs font-weight-bold mb-0">Programator</p>
                                                            <p class="text-xs text-secondary mb-0">Developer</p>
                                                        </td>
                                                        <td class="align-middle text-center text-sm">
                                                            <span class="badge badge-sm bg-gradient-success">Online</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span class="text-secondary text-xs font-weight-bold">11/01/19</span>
                                                        </td>
                                                    </tr> -->
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- </div> -->


                  <!-- <div class="container-fluid"> -->
                  <div class="row">
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="total-pagar">Total a Pagar</label>
                           <input type="text" class="form-control" name="total" id="total-pagar" placeholder="Total a pagar" readonly>
                        </div>
                     </div>

                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="dinero-recibido">Dinero Recibido</label>
                           <input type="number" class="form-control" id="dinero-recibido" placeholder="Ingrese el dinero recibido">
                        </div>
                     </div>

                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="cambio">Cambio</label>
                           <input type="text" class="form-control" id="cambio" placeholder="Cambio" readonly>
                        </div>
                     </div>
                  </div>

                  <div class="d-flex justify-content-end">
                     <button type="submit" class="btn bg-gradient-dark btn-md mt-2 mb-2">{{ 'Guardar' }}</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>

<!-- --------------------------------------------------------------------------------------------->

<!-- jQuery y jQuery UI-->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Validaciones -->
<script>
   $(document).ready(function() {

      $("#card-table").hide();

      // -----------------------------------
      //    VERIFICAR PRODUCTOS DISPONIBLES
      // -----------------------------------

      // Se convierte la variable de PHP $productos a un formato JSON que es manejable en JavaScript
      var availableProducts = @json($productos -> map(function($producto) {
         return [
            'value' => $producto -> id,
            'label' => $producto -> nombre,
            'precio' => $producto -> precio
         ];
      }));
      console.log(availableProducts);

      // -----------------------------------
      //    AUTOCOMPLETADO DE PRODUCTOS
      // -----------------------------------

      $("#product").autocomplete({
         source: availableProducts,
         select: function(event, ui) {
            agregarProducto(ui.item.value, ui.item.label, ui.item.precio);
            $("#product").val('');
            return false;
         },
         focus: function(event, ui) {
            // Cuando el usuario mueve el cursor (con la flecha hacia abajo) en la lista de sugerencias
            $("#product").val(ui.item.label); // Establece el nombre del producto como valor mientras navega por las sugerencias
            return false;
         }
      });

      // -----------------------------------
      //    LLAMADO ACTUALIZAR TOTALES
      // -----------------------------------

      $(document).on('blur', 'input[name="cantidad[]"], input[name="precio[]"]', function() {
         actualizarTotales();
      });

      // --------------------------------------
      //    LLAMADO CALCULAR VALOR A DEVOLVER
      // --------------------------------------

      $('#dinero-recibido').on('input', function() {
         actualizarCambio();
      });

      // -----------------------------------
      //    ACTUALIZAR TOTALES
      // -----------------------------------   

      function actualizarTotales() {
         var totalPagar = 0;

         $('#tabla-productos tbody tr').each(function() {
            var cantidad = parseFloat($(this).find('input[name="cantidad[]"]').val()) || 0;
            var precio = parseFloat($(this).find('input[name="precio[]"]').val()) || 0;
            totalPagar += cantidad * precio;
         });

         $('#total-pagar').val(totalPagar.toFixed(0));
      }

      // -----------------------------------
      //    CALCULAR VALOR A DEVOLVER
      // -----------------------------------

      function actualizarCambio() {
         var totalPagar = parseFloat($('#total-pagar').val()) || 0;
         var dineroRecibido = parseFloat($('#dinero-recibido').val()) || 0;
         var cambio = dineroRecibido - totalPagar;
         $('#cambio').val(cambio.toFixed(0));
      }

      // -----------------------------------
      //      TRAER IMAGEN DEL PRODCUTO
      // -----------------------------------

      function imagenProducto(productoId) {
         return $.ajax({
            url: '{{ url("/obtener-imagen") }}/' + productoId,
            method: 'GET'
         });
      }

      // -----------------------------------
      //    AGREGAR PRODUCTO A TABLA
      // -----------------------------------

      /* function agregarProducto(id, nombre, precio) {
            var productoYaAgregado = false;

            $("#tabla-productos tbody tr").each(function() {
                if ($(this).find("input[name='producto_id[]']").val() == id) {
                    productoYaAgregado = true;
                    return false;
                }
            });

            if (productoYaAgregado) {
                Swal.fire({
                    icon: 'warning',
                    title: '¡Producto ya agregado!',
                    text: 'El producto ya está en la tabla de productos seleccionados.',
                });
            } else {
                imagenProducto(id).then(function(response) {
                    let imagen = response.url;
                    console.log(imagen)

                    $("#card-table").show();
                    let nuevaFila = `<tr>
                                 	<td>
													<div class="d-flex px-2 py-1">
                          						<div>
                          						  <img src="` + imagen + `" class="avatar avatar-sm me-3" alt="user2">
                          						</div>
                                       	<div class="d-flex flex-column justify-content-center"> 
                                      			<input type="hidden" name="producto_id[]" value="` + id + `"> 
                                       	   <h6 class="mb-0 text-sm">` + nombre + `</h6>
														</div>
                                       </div>
                                    </td>
													
                                 	<td>
													<div class="">
                                       	<div class=""> 
															<input type="number" min="1" name="cantidad[]" id="cantidad" class="form-control" placeholder="Cantidad" required>
														</div>
                                       </div>
                                    </td>

                                 	<td>
													<div class="">
                                       	<div class=""> 
															<input type="number" name="precio[]" id="precioInput" class="form-control" placeholder="` + precio + `" required>
														</div>
                                       </div>
                                    </td>

                                    <td style="text-align: center;">
													<div class="pt-3">
														<button type="button" class="btn btn-danger btn-sm eliminar-fila">
															<i class="fas fa-trash"></i>
														</button>
                                       </div>
												</td>
                                 </tr>`;
                    console.log(nuevaFila);
                    console.log($("#tabla-productos tbody"));
                    $("#tabla-productos tbody").append(nuevaFila);
                }).catch(function() {
                    console.log('Error cargando la imagen');
                });
            }
        } */

      function agregarProducto(id, nombre, precio) {
          var productoYaAgregado = false;

          $("#tabla-productos tbody tr").each(function() {
              if ($(this).find("input[name='producto_id[]']").val() == id) {
                  productoYaAgregado = true;
                  return false; 
              }
          });
       
          if (productoYaAgregado) {
              Swal.fire({
                  icon: 'warning',
                  title: '¡Producto ya agregado!',
                  text: 'Este producto ya fue seleccionado.',
              });
          } else {
              function agregarFila(imagen) {
                  const imagenPorDefecto = "../assets/img/images.webp";
            
                  $("#card-table").show();
                  let nuevaFila = `<tr>
                                       <td>
                                           <div class="d-flex px-2 py-1">
                                               <div>
                                                   <img 
                                                      src="${imagen}" 
                                                      class="avatar avatar-sm me-3" 
                                                      alt="user2" 
                                                      onerror="this.onerror=null;this.src='${imagenPorDefecto}';"
                                                   >
                                               </div>
                                               <div class="d-flex flex-column justify-content-center"> 
                                                   <input type="hidden" name="producto_id[]" value="${id}"> 
                                                   <h6 class="mb-0 text-sm">${nombre}</h6>
                                               </div>
                                           </div>
                                       </td>
                                       <td>
                                           <div>
                                               <div>
                                                   <input type="number" min="1" name="cantidad[]" class="form-control" placeholder="Cantidad" required>
                                               </div>
                                           </div>
                                       </td>
                                       <td>
                                           <div>
                                               <div>
                                                   <input type="number" name="precio[]" class="form-control" placeholder="${precio}" required>
                                               </div>
                                           </div>
                                       </td>
                                       <td style="text-align: center;">
                                           <div class="pt-3">
                                               <button type="button" class="btn btn-danger btn-sm eliminar-fila">
                                                   <i class="fas fa-trash"></i>
                                               </button>
                                           </div>
                                       </td>
                                   </tr>`;
                  $("#tabla-productos tbody").append(nuevaFila);
              }
           
              imagenProducto(id).then(function(response) {
                  let imagen = response.url;
                  agregarFila(imagen);
              }).catch(function() {
                  let imagenPorDefecto = "../assets/img/images.webp";
                  agregarFila(imagenPorDefecto);
              });
          }
      }

      // -----------------------------------
      //    VALIDAR PRECIO
      // -----------------------------------

      $(document).on('blur', 'input[name="precio[]"]', function() {
         var id_pro = $(this).closest('tr').find("input[name='precio[]']").val();
         validarPrecio(this, id_pro);
      });

      function validarPrecio(campo, id_pro) {
         var precioIn = $(campo).val();

         if (isNaN(precioIn) || precioIn.trim() === '' || precioIn <= 0) {
            Swal.fire({
               icon: 'warning',
               title: '¡Precio no válido!',
               text: 'El campo de precio se encuentra vacio.',
            });
            $(campo).val('');
            return;
         }
      }

      // -----------------------------------
      //    VALIDAR CANTIDAD (STOCK)
      // -----------------------------------

      $(document).on('input', 'input[name="cantidad[]"]', function() {
         var id_pro = $(this).closest('tr').find("input[name='producto_id[]']").val();
         validarStockMax(this, id_pro);
      });

      $(document).on('blur', 'input[name="cantidad[]"]', function() {
         var id_pro = $(this).closest('tr').find("input[name='producto_id[]']").val();
         validarCantidadCero(this);
      });

      function validarStockMax(campo, id_pro) {
         var cantidad = $(campo).val();

         $.ajax({
            url: '{{ url("/obtener-stock") }}',
            type: 'POST',
            data: {
               action: 'obtener_stock',
               id_pro: id_pro,
               _token: '{{ csrf_token() }}', // Incluir el token CSRF para protección
            },
            dataType: 'json',
            success: function(data) {
               if (data.error) {
                  Swal.fire({
                     icon: 'error',
                     title: '¡Error!',
                     text: data.error,
                  });
               } else {
                  var stock = parseInt(data.stock, 10);
                  cantidad = parseInt(cantidad, 10);
                  if (cantidad > stock) {
                     Swal.fire({
                        icon: 'warning',
                        title: '¡Stock insuficiente!',
                        text: 'La cantidad ingresada supera el stock disponible: ' + stock,
                     });
                     $(campo).val('');
                  }
               }
            },
            error: function(jqXHR, textStatus, errorThrown) {
               Swal.fire({
                  icon: 'error',
                  title: '¡Error!',
                  text: 'No se pudo obtener el stock del producto.',
               });
            }
         });
      }

      function validarCantidadCero(campo) {
         var cantidad = $(campo).val();

         if (isNaN(cantidad) || cantidad.trim() === '' || cantidad <= 0) {
            Swal.fire({
               icon: 'warning',
               title: '¡Cantidad no válida!',
               text: 'La cantidad debe ser mayor a cero.',
            });
            $(campo).val('');
            return;
         }
      }

      // -----------------------------------
      //    ELIMINAR FILA DE TABLA
      // -----------------------------------

      $(document).on('click', '.eliminar-fila', function() {
         $(this).closest('tr').remove();
         $('#total-pagar').val('');
         $('#dinero-recibido').val('');
         $('#cambio').val('');
         $("#cantidad").focus();
         var filas = $("#tabla-productos tbody tr").length;
         if (filas === 0) {
            $("#card-table").hide();
         }
      });

      // -----------------------------------
      //    CREAR VENTA
      // -----------------------------------

      $("#form-venta").on("submit", function(e) {
         e.preventDefault();

         // -----------------------------------
         //    VERIFICAR INPUTS VACIOS
         // -----------------------------------

         /* var inputPrecio = $("#precio").val();
         		if (inputPrecio.trim() === "" || inputPrecio == null) {
                      Swal.fire({
                          icon: 'warning',
                          title: 'Pago no asignada!',
                          text: 'Por favor, ingrese el pago.',
                      });
                      return false;
         		}
         	console.log(inputPrecio); */

         var filas = $("#tabla-productos tbody tr").length;
         if (filas === 0) {
            $("#product").val('');
            $("#product").focus();
            Swal.fire({
               icon: 'warning',
               title: '¡Sin productos!',
               text: 'Por favor, agregue al menos un producto a la venta.',
            });
            return false;
         }

         var formData = new FormData();
         var total = $("#total-pagar").val();
         $("#tabla-productos tbody tr").each(function() {
            var productoId = $(this).find("input[name='producto_id[]']").val();
            var cantidad = $(this).find("input[name='cantidad[]']").val();
            var precio = $(this).find("input[name='precio[]']").val();

            /* formData.append('action', 'agregar'); */
            formData.append('producto_id[]', productoId);
            formData.append('cantidad[]', cantidad);
            formData.append('precio[]', precio);
            formData.append('total', total);
         });

         $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });

         $.ajax({
            type: 'POST',
            url: '{{ route('ventas.store') }}',
            data: formData,
            processData: false,
            contentType: false,
            success: function(respuesta) {
               console.log("AJAX exitoso:", respuesta);
               Swal.fire({
                  text: '¡Venta registrada correctamente!',
                  icon: 'success',
                  timer: 2000,
                  showConfirmButton: false
               }).then(() => {
                  window.location.href = '{{ url()->route('ventas.index') }}';
               });
            },
            error: function(xhr, status, error) {
               console.error('Error en la solicitud AJAX:', error);
               console.log(xhr.responseText);
            }
         });
         return false;
      });
   });
</script>

@endsection('content')