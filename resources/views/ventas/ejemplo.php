<?php
require_once '../models/MySQL.php';
// Inicializar la conexión a la base de datos
$mysql = new MySQL;
$mysql->conectar();

// Obtener los productos disponibles para autocompletar
$productos = $mysql->efectuarConsulta("SELECT inv_Id, inv_NombreProd, inv_PrecioProd FROM inventario WHERE inv_EstadoProd != 'Inactivo'");
$empleados = $mysql->efectuarConsulta("SELECT emp_Id, emp_Nombre, emp_Apellido FROM empleados WHERE emp_Estado != 'Inactivo'");
$clientes = $mysql->efectuarConsulta("SELECT cli_Id, cli_Nombre, cli_Apellido FROM clientes WHERE cli_Estado != 'Inactivo'");
$metodosPago = $mysql->efectuarConsulta("SELECT pag_Id, pag_Metodo FROM pagos");
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'obtener_stock') {
    $id_pro = $_POST['id_pro'];

    // Obtener el stock del producto
    $resultado = $mysql->efectuarConsulta("SELECT inv_CantProd FROM inventario WHERE inv_Id = $id_pro");
    $row = mysqli_fetch_array($resultado);

    if ($row) {
        echo json_encode([
            'inv_CantProd' => $row['inv_CantProd']
        ]);
    } else {
        echo json_encode([
            'error' => 'Producto no encontrado.'
        ]);
    }

    $mysql->desconectar();
    exit();
}
// Cerrar la conexión a la base de datos
$mysql->desconectar();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Ventas - Dashboard</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- Favicon -->
    <link href="../assets/img/LogoCanino.png" rel="icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet" />

    <!-- Font Awesome -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <!--Bootstrap-->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous" />

    <!-- AdminLTE -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css" />

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap5.min.css" />

    <!-- Vendor CSS Files -->
    <!-- <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
     -->
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet" />
    <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet" />
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
    <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet" />
</head>

<body style="display: flex; flex-direction: column; min-height: 100vh; margin: 0;">

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <a href="#" class="logo d-flex align-items-center">
                <img src="../assets/img/LogoCanino.png" alt="" />
                <span class="d-none d-lg-block">Canino Feliz</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>
        <!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle" href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li>
                <!-- End Search Icon-->

                <li class="nav-item dropdown pe-3">
                    <a
                        class="nav-link nav-profile d-flex align-items-center pe-0"
                        href="#"
                        data-bs-toggle="dropdown">
                        <img src="../assets/img/UserVacio.jpg" alt="Profile" class="rounded-circle" />
                        <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['nombre'] ?></span>
                    </a>
                    <!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6><?php echo $_SESSION['nombre'] ?></h6>
                            <span><?php echo $_SESSION['rolNombre'] ?></span>

                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="../controllers/LogoutController.php">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Cerrar Sesión</span>
                            </a>
                        </li>
                    </ul>
                    <!-- End Profile Dropdown Items -->
                </li>
                <!-- End Profile Nav -->
            </ul>
        </nav>
    </header>
    <!-- End Header -->

    <!-- ======= Navegador lateral ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link collapsed" href="../public/indexHome.php">
                    <i class="fas fa-home"></i>
                    <span>Inicio</span>
                </a>
            </li>
            <!-- End Dashboard Nav -->

            <li class="nav-heading">Gestion Comercial</li>
            <?php if ($_SESSION['rol'] == 2 || $_SESSION['rol'] == "Admin") : ?>
                <li class="nav-item">
                    <a
                        class="nav-link collapsed"
                        data-bs-target="#menuCitas"
                        data-bs-toggle="collapse"
                        href="#">
                        <i class="fa fa-calendar-alt"></i></i><span>Citas</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="menuCitas" class="collapse nav-content" data-bs-parent="#sidebar-nav">
                        <li class="nav-item">
                            <a class="nav-link collapsed" href="../public/indexAgendarCitas.php">
                                <i class="bi bi-circle-fill"></i><span>Agendar Citas</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link collapsed" href="../public/indexListarCitas.php">
                                <i class="bi bi-circle-fill"></i><span>Ver Citas</span>
                            </a>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if ($_SESSION['rol'] == 1 || $_SESSION['rol'] == "Admin") : ?>
                <li class="nav-item">
                    <a
                        class="nav-link"
                        data-bs-target="#menuVentas"
                        data-bs-toggle="collapse"
                        href="#">
                        <i class="fas fa-cash-register"></i><span>Ventas</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="menuVentas" class="nav-content show collapse" data-bs-parent="#sidebar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="../public/indexRegistroVentas.php">
                                <i class="bi bi-circle-fill"></i><span>Registrar Ventas</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link collapsed" href="../public/indexVentas.php">
                                <i class="bi bi-circle-fill"></i><span>Reportes Ventas</span>
                            </a>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if ($_SESSION['rol'] == "Admin") : ?>
                <li class="nav-heading">Gestion Interna</li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="../public/indexInventario.php">
                        <i class="fas fa-archive"></i>
                        <span>Inventario</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="../public/indexServicios.php">
                        <i class="fas fa-bone"></i>
                        <span>Servicios</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="../public/indexClientes.php">
                        <i class="fas fa-users"></i>
                        <span>Clientes</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="../public/indexMascotas.php">
                        <i class="fas fa-paw"></i>
                        <span>Mascotas</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="../public/indexEmpleados.php">
                        <i class="fas fa-user-tie"></i>
                        <span>Empleados</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="../public/indexAdmin.php">
                        <i class="fas fa-users-cog"></i>
                        <span>Administradores</span>
                    </a>
                </li>

                <li class="nav-heading">Rendimiento</li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="../public/indexReportes.php">
                        <i class="fas fa-signal"></i>
                        <span>Graficas y Reportes</span>
                    </a>
                </li>
            <?php endif; ?>

        </ul>
    </aside>
    <!-- End Navegador lateral-->

    <!-- ======= Main ======= -->
    <main id="main" class="main" style="flex: 1;">

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form id="form-venta" method="POST" action="crearventa.php">
                            <div class="card card-primary">
                                <div class="card-header" style="background-color: #012970;">
                                    <h2 class="card-title text-light">Información de la Venta</h2>
                                </div>
                                <div class="card-body">
                                    <div class="form-group mt-3 mb-4">
                                        <label for="product">Buscar Producto</label>
                                        <input type="text" class="form-control" id="product" placeholder="Ingrese el nombre del producto">
                                    </div>

                                    <table class="table table-bordered" id="tabla-productos">
                                        <thead>
                                            <tr>
                                                <th>Producto</th>
                                                <th>Cantidad</th>
                                                <th>Precio</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Aquí se agregan dinámicamente las filas -->
                                        </tbody>
                                    </table>
                                </div>

                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <label for="total-pagar">Total a Pagar</label>
                                            <input type="text" class="form-control" id="total-pagar" placeholder="Total a pagar" readonly>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="dinero-recibido">Dinero Recibido</label>
                                            <input type="number" class="form-control" id="dinero-recibido" placeholder="Ingrese el dinero recibido">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="cambio">Cambio</label>
                                            <input type="text" class="form-control" id="cambio" placeholder="Cambio a devolver" readonly>

                                        </div>
                                    </div>
                                </div>


                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" style="background-color: #012970; border-color:#012970">Crear Venta</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        </div>
        </div>
    </main>
    <!-- End Main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer" style="background-color: #ffffff; text-align: center; padding: 10px 0;">
        <div class="copyright">
            &copy; Copyright <strong><span>Canino Feliz</span></strong>. Todos los derechos reservados
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!------------------------------------------------------------------------------>
    <!------------------------------------------------------------------------------>

    <!-- jQuery y jQuery UI-->
    <script src="../assets/jquery/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Bootstrap JS -->
    <!-- <script
		src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
		crossorigin="anonymous">
	</script> -->

    <!-- <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
     --><!-- Vendor JS Files -->
    <script src="../public/advertencias.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>
    <!-- Vendor JS Files -->
    <script src="../public/advertencias.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/quill/quill.js"></script>
    <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../assets/vendor/tinymce/tinymce.min.js"></script>

    <!-- AdminLTE -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>

    <!-- Script para limpiar la URL -->
    <script>
        setTimeout(() => {
            window.history.replaceState(null, null, window.location.pathname);
        }, 0);
    </script>

    <!-- --------------------------------------------------------------------------------------------->

    <!-- Validaciones -->
    <script>
        $(document).ready(function() {

            // -----------------------------------
            //    VERIFICAR PRODUCTOS DISPONIBLES
            // -----------------------------------

            // Se declara un array de productos disponibles llamado "availableProducts"
            /* var availableProducts = [
                <?php while ($row = mysqli_fetch_array($productos)) { ?> {
                        label: "<?php echo addslashes($row['inv_NombreProd']); ?>",
                        value: "<?php echo $row['inv_Id']; ?>",
                        precio: "<?php echo $row['inv_PrecioProd']; ?>"
                    },
                <?php } ?>
            ]; */
            
            // Se convierte la variable de PHP $productos a un formato JSON que es manejable en JavaScript
            var availableProducts = @json($productos->map(function($producto) {
                return [
                    'label' => $producto->nombre,
                    'value' => $producto->id,
                    'precio' => $producto->precio,
                ];
            }));

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

            // -----------------------------------
            //    LLAMADO CALCULAR VALOR A DEVOLVER
            // -----------------------------------

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
                    var nuevaFila = `
                  <tr>
                      <td><input type="hidden" name="producto_id[]" value="` + id + `">` + nombre + `</td>
                      <td><input type="number" name="cantidad[]" id="cantidad" class="form-control" placeholder="Cantidad" required></td>
                      <td><input type="number" name="precio[]" id="precioInput" class="form-control" placeholder="` + precio + `" required></td>
                      <td style="text-align: center;"><button type="button"class="btn btn-danger btn-sm eliminar-fila"><i class="fas fa-trash"></i></button></td>
                  </tr>
              `;
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

            $(document).on('blur', 'input[name="cantidad[]"]', function() {
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
                    url: '../public/indexRegistroVentas.php',
                    type: 'POST',
                    data: {
                        action: 'obtener_stock',
                        id_pro: id_pro
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
                            var stock = parseInt(data.inv_CantProd, 10);
                            cantidad = parseInt(cantidad, 10);
                            if (cantidad > stock) {
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'La cantidad excede el stock!',
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
                // VERIFICAR INPUTS VACIOS
                // -----------------------------------
                var inputMetodos = $("#metodos").val();
                if (inputMetodos.trim() === "" || inputMetodos == null) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Metodo de pago no asignado!',
                        text: 'Por favor, ingrese el metodo de pago.',
                    });
                    return false;
                }
                console.log(inputMetodos);


                /*          var inputPrecio = $("#precio").val();
                         if (inputPrecio.trim() === "" || inputPrecio == null) {
                             Swal.fire({
                                 icon: 'warning',
                                 title: 'Pago no asignada!',
                                 text: 'Por favor, ingrese el pago.',
                             });
                             return false;
                         }
                         console.log(inputPrecio); */

                var inputClien = $("#clien").val();
                if (inputClien.trim() === "" || inputClien == null) {
                    Swal.fire({
                        icon: 'warning',
                        title: '¡Cliente no asignado!',
                        text: 'Por favor, ingrese el cliente.',
                    });
                    return false;
                }

                var inputEmpleado = $("#emple").val();
                if (inputEmpleado.trim() === "" || inputEmpleado == null) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Empleado no asignado!',
                        text: 'Por favor, ingrese el empleado.',
                    });
                    return false;
                }

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
                $("#tabla-productos tbody tr").each(function() {
                    var productoId = $(this).find("input[name='producto_id[]']").val();
                    var cantidad = $(this).find("input[name='cantidad[]']").val();
                    var precio = $(this).find("input[name='precio[]']").val();
                    var metodoPago = $("#metodoPagoId").val();
                    var cliente = $("#clientes").val();
                    var empleado = $("#empleados").val();

                    formData.append('action', 'agregar');
                    formData.append('metodoPagoId', metodoPago);
                    formData.append('clientes', cliente);
                    formData.append('empleados', empleado);
                    formData.append('producto_id[]', productoId);
                    formData.append('cantidad[]', cantidad);
                    formData.append('precio[]', precio);
                });

                $.ajax({
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
                });
                return false;
            });
        });
    </script>
</body>

</html>