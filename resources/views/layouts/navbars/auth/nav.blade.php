<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl position-sticky blur shadow-blur mt-4 left-auto" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            @php
            $path = Request::path();
            $breadcrumbs = [];

            // Productos
            if (str_contains($path, 'productos')) {
                $breadcrumbs[] = ['label' => 'Productos', 'url' => url('productos')];
                if (str_contains($path, 'create')) {
                $breadcrumbs[] = ['label' => 'Nuevo producto'];
                } elseif (str_contains($path, 'edit')) {
                $breadcrumbs[] = ['label' => 'Editar producto'];
                } else {
                $breadcrumbs[] = ['label' => 'Listar productos'];
                }
            } elseif (str_contains($path, 'users')) {
                $breadcrumbs[] = ['label' => 'Usuarios', 'url' => url('users')];
                if (str_contains($path, 'create')) {
                $breadcrumbs[] = ['label' => 'Nuevo Usuario'];
                } elseif (str_contains($path, 'edit')) {
                $breadcrumbs[] = ['label' => 'Editar Usuario'];
                } else {
                $breadcrumbs[] = ['label' => 'Listar Usuarios'];
                }
            } elseif (str_contains($path, 'ventas')) {
                $breadcrumbs[] = ['label' => 'Ventas', 'url' => url('ventas')];
                if (str_contains($path, 'create')) {
                $breadcrumbs[] = ['label' => 'Nueva Venta'];
                } else {
                $breadcrumbs[] = ['label' => 'Listar Ventas'];
                }
            } else {
                $breadcrumbs[] = ['label' => ucwords(str_replace('-', ' ', $path))];
            }
            @endphp

            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                @foreach ($breadcrumbs as $breadcrumb)
                    @if (isset($breadcrumb['url']))
                    <li class="breadcrumb-item text-sm">
                        <a class="opacity-5 text-dark" href="{{ $breadcrumb['url'] }}">
                            {{ $breadcrumb['label'] }}
                        </a>
                    </li>
               
                
                    @endif
                @endforeach
            </ol>

            @if (str_contains(Request::path(), 'productos'))
                @if (str_contains(Request::path(), 'create'))
                    <h6 class="font-weight-bolder mb-0 text-capitalize" aria-current="page">Nuevo producto</h6>
                @elseif (str_contains(Request::path(), 'edit'))
                    <h6 class="font-weight-bolder mb-0 text-capitalize" aria-current="page">Editar producto</h6>
                @else
                    <h6 class="font-weight-bolder mb-0 text-capitalize" aria-current="page">Listar productos</h6>
                @endif
            @elseif (str_contains(Request::path(), 'ventas'))
                @if (str_contains(Request::path(), 'create'))
                    <h6 class="font-weight-bolder mb-0 text-capitalize" aria-current="page">Nueva venta</h6>
                @elseif (str_contains(Request::path(), 'edit'))
                    <h6 class="font-weight-bolder mb-0 text-capitalize" aria-current="page">Editar venta</h6>
                @else
                    <h6 class="font-weight-bolder mb-0 text-capitalize" aria-current="page">Listar ventas</h6>
                @endif
            @elseif (str_contains(Request::path(), 'users'))
                @if (str_contains(Request::path(), 'create'))
                    <h6 class="font-weight-bolder mb-0 text-capitalize" aria-current="page">Nuevo usuario</h6>
                @elseif (str_contains(Request::path(), 'edit'))
                    <h6 class="font-weight-bolder mb-0 text-capitalize" aria-current="page">Editar usuario</h6>
                @else
                    <h6 class="font-weight-bolder mb-0 text-capitalize" aria-current="page">Listar usuarios</h6>
                @endif
                @else
                <h6 class="font-weight-bolder mb-0 text-capitalize" aria-current="page">{{ Request::path()}}</h6>
            @endif
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 d-flex justify-content-end" id="navbar">
            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item d-flex align-items-center">
                    <a href="{{ url('/logout')}}" class="nav-link text-body font-weight-bold px-0">
                        <i class="fa-solid fa-door-closed"></i>
                        <span class="d-sm-inline d-none" style="margin-right: 10px;">Sign Out</span>
                    </a>
                </li>
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </li>
                <!--  <li class="nav-item px-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0">
                        <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                    </a>
                </li> -->
                <!-- <li class="nav-item dropdown pe-2 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-bell cursor-pointer"></i>
                    </a>
                    <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                        <li class="mb-2">
                            <a class="dropdown-item border-radius-md" href="javascript:;">
                                <div class="d-flex py-1">
                                    <div class="my-auto">

                                        <img src="{{ asset( '../assets/img/team-2.jpg') }}" class="avatar avatar-sm  me-3 ">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                            <span class="font-weight-bold">New message</span> from Laur
                                        </h6>
                                        <p class="text-xs text-secondary mb-0">
                                            <i class="fa fa-clock me-1"></i>
                                            13 minutes ago
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a class="dropdown-item border-radius-md" href="javascript:;">
                                <div class="d-flex py-1">
                                    <div class="my-auto">
                                        <img src="{{ asset( '../assets/img/small-logos/logo-spotify.svg') }}" class="avatar avatar-sm bg-gradient-dark  me-3">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                            <span class="font-weight-bold">New album</span> by Travis Scott
                                        </h6>
                                        <p class="text-xs text-secondary mb-0">
                                            <i class="fa fa-clock me-1"></i>
                                            1 day
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item border-radius-md" href="javascript:;">
                                <div class="d-flex py-1">
                                    <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                                        <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>credit-card</title>
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                                    <g transform="translate(1716.000000, 291.000000)">
                                                        <g transform="translate(453.000000, 454.000000)">
                                                            <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                                            <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                            Payment successfully completed
                                        </h6>
                                        <p class="text-xs text-secondary mb-0">
                                            <i class="fa fa-clock me-1"></i>
                                            2 days
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li> -->
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->