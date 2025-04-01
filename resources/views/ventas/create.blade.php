@extends('layouts.user_type.auth')

@section('content')
<div>
    <div class="container-fluid">
        <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
            <span class="mask bg-gradient-primary opacity-6"></span>
        </div>
        <div class="card card-body blur shadow-blur mx-4 mt-n6">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="../assets/img/bruce-mars.jpg" alt="..." class="w-100 border-radius-lg shadow-sm">
                        <a href="javascript:;" class="btn btn-sm btn-icon-only bg-gradient-light position-absolute bottom-0 end-0 mb-n2 me-n2">
                            <i class="fa fa-pen top-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Image"></i>
                        </a>
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{ __('Alec Thompson') }}
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            {{ __(' CEO / Co-Founder') }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                    <div class="nav-wrapper position-relative end-0">
                        <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 active " data-bs-toggle="tab" href="javascript:;"
                                    role="tab" aria-controls="overview" aria-selected="true">
                                    <svg class="text-dark" width="16px" height="16px" viewBox="0 0 42 42" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none"
                                            fill-rule="evenodd">
                                            <g id="Rounded-Icons" transform="translate(-2319.000000, -291.000000)"
                                                fill="#FFFFFF" fill-rule="nonzero">
                                                <g id="Icons-with-opacity"
                                                    transform="translate(1716.000000, 291.000000)">
                                                    <g id="box-3d-50" transform="translate(603.000000, 0.000000)">
                                                        <path class="color-background" d="M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z" id="Path"></path>
                                                        <path class="color-background" d="M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z" id="Path" opacity="0.7"></path>
                                                        <path class="color-background" d="M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z" id="Path" opacity="0.7"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    <span class="ms-1">{{ __('Overview') }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;" role="tab" aria-controls="teams" aria-selected="false">
                                    <svg class="text-dark" width="16px" height="16px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <title>document</title>
                                        <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g id="Rounded-Icons" transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                                <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                                                    <g id="document" transform="translate(154.000000, 300.000000)">
                                                        <path class="color-background" d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z" id="Path" opacity="0.603585379"></path>
                                                        <path class="color-background" d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z" id="Shape"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    <span class="ms-1">{{ __('Teams') }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;" role="tab" aria-controls="dashboard" aria-selected="false">
                                    <svg class="text-dark" width="16px" height="16px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <title>settings</title>
                                        <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g id="Rounded-Icons" transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                                <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                                                    <g id="settings" transform="translate(304.000000, 151.000000)">
                                                        <polygon class="color-background" id="Path" opacity="0.596981957" points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667">
                                                        </polygon>
                                                        <path class="color-background" d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z" id="Path" opacity="0.596981957"></path>
                                                        <path class="color-background" d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z" id="Path"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    <span class="ms-1">{{ __('Projects') }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4">
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
                                <div class="card mb-4 shadow-lg">
                                    <!-- <div class="card-header">
                                          <h6>Productos</h6>
                                        </div> -->
                                    <div class="card-body px-0 pt-0 pb-2">
                                        <div class="table-responsive p-0">
                                            <table class="table align-items-center mb-0" id="tabla-productos">
                                                <thead>
                                                    <tr>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Producto</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Cantidad</th>
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
                                <input type="text" class="form-control" id="cambio" placeholder="Dinero a devolver" readonly>
                            </div>
                        </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Guardar' }}</button>
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

        // -----------------------------------
        //    VERIFICAR PRODUCTOS DISPONIBLES
        // -----------------------------------

        // Se convierte la variable de PHP $productos a un formato JSON que es manejable en JavaScript
        var availableProducts = @json($productos -> map(function($producto) {
            return [
                'value' => $producto -> id_producto,
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
        //    AGREGAR PRODUCTO A TABLA
        // -----------------------------------

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
                    text: 'El producto ya está en la tabla de productos seleccionados.',
                });
            } else {
                let nuevaFila = `<tr>
                                 	<td>
													<div class="d-flex px-2 py-1">
                          						<div>
                          						  <img src="../assets/img/team-3.jpg" class="avatar avatar-sm me-3" alt="user2">
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
														<button type="button"class="btn btn-danger btn-sm eliminar-fila">
															<i class="fas fa-trash"></i>
														</button>
                                       </div>
												</td>
                                 </tr>`;
                console.log(nuevaFila);
                console.log($("#tabla-productos tbody"));
                $("#tabla-productos tbody").append(nuevaFila);
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
            validarCantidad(this, id_pro);
        });

        function validarCantidad(campo, id_pro) {
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

            $.ajax({
                url: '{{ url("/obtener-stock") }}',
                type: 'POST',
                data: {
                    action: 'obtener_stock',
                    id_pro: id_pro,
						  _token: '{{ csrf_token() }}',  // Incluir el token CSRF para protección
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

        // -----------------------------------
        //    ELIMINAR FILA DE TABLA
        // -----------------------------------

        $(document).on('click', '.eliminar-fila', function() {
            $(this).closest('tr').remove();
            $('#total-pagar').val('');
            $('#dinero-recibido').val('');
            $('#cambio').val('');
            $("#cantidad").focus();
        });

        // -----------------------------------
        //    CREAR VENTA
        // -----------------------------------

        $("#form-venta").on("submit", function(e) {
            e.preventDefault();

            // -----------------------------------
            //    VERIFICAR INPUTS VACIOS
            // -----------------------------------
            /* var inputMetodos = $("#metodos").val();
            		if (inputMetodos.trim() === "" || inputMetodos == null) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Metodo de pago no asignado!',
                    text: 'Por favor, ingrese el metodo de pago.',
                });
                return false;
            		}
            	console.log(inputMetodos); */


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

            /* var inputClien = $("#clien").val();
            		if (inputClien.trim() === "" || inputClien == null) {
                Swal.fire({
                    icon: 'warning',
                    title: '¡Cliente no asignado!',
                    text: 'Por favor, ingrese el cliente.',
                });
                return false;
            		} */

            /* var inputEmpleado = $("#emple").val();
            		if (inputEmpleado.trim() === "" || inputEmpleado == null) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Empleado no asignado!',
                    text: 'Por favor, ingrese el empleado.',
                });
                return false;
            		} */

            var filas = $("#tabla-productos tbody tr").length;
            if (filas === 0) {
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
                /* var metodoPago = $("#metodoPagoId").val();
                var cliente = $("#clientes").val();
                var empleado = $("#empleados").val(); */

                /* formData.append('action', 'agregar'); */
                formData.append('producto_id[]', productoId);
                formData.append('cantidad[]', cantidad);
                formData.append('precio[]', precio);
                /* formData.append('metodoPagoId', metodoPago);
                formData.append('clientes', cliente);
                formData.append('empleados', empleado); */
                formData.append('total', total);
            });

            /* $.ajax({
                type: 'POST',
                url: '../public/indexRegistroVentas.php',
                data: formData,
                processData: false,
                contentType: false,
                success: function(respuesta) {
                    console.log("AJAX exitoso:", respuesta); // Verificar la respuesta
                    Swal.fire({
                        text: '¡Venta registrada correctamente!',
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: false
                    }).then(() => {
                        window.location.href = 'indexRegistroVentas.php';
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error en la solicitud AJAX:', error);
                    console.log(xhr.responseText); // Ver detalles del error del servidor
                }
            }); */

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: '{{ route('ventas.store') }}', // Usar route() si tienes una ruta definida
                data: formData,
                processData: false,
                contentType: false,
                success: function(respuesta) {
                    console.log("AJAX exitoso:", respuesta); // Verificar la respuesta
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
                    console.log(xhr.responseText); // Ver detalles del error del servidor
                }
            });
            return false;
        });
    });
</script>

@endsection('content')