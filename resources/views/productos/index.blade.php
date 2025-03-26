@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Productos</h5>
                        </div>
                        <a href="{{ route('productos.create') }}" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; Nuevo Producto</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead class="text-center">
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Nombre
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Descripcion
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Precio
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Cantidad
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Imagen
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Estado
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($productos as $producto)
                                <tr>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $producto->nombre }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $producto->descripcion }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $producto->precio }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $producto->cantidad }}</p>
                                    </td>
                                    <td>
                                        <div>
                                            <img src="{{ asset('storage/' . $producto->imagen) }}" class="avatar avatar-lg me-3">
                                        </div>
                                    </td>
                                    @if ($producto->estado == 1)
                                    <td class="text-center">
                                        <span class="badge badge-sm bg-gradient-primary">Activo</span>
                                    </td>
                                    @elseif($producto->estado == 2)
                                    <td class="text-center">
                                        <span class="badge badge-sm bg-gradient-secondary">Offline</span>
                                    </td>
                                    @endif

                                    <td class="text-center">
                                        <a href="{{route('productos.edit', $producto)}}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Editar Producto">
                                            <i class="fas fa-user-edit text-secondary"></i>
                                        </a>
                                        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline;" id="delete-form-{{ $producto->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Eliminar Producto" style="border: none; background: transparent;" onclick="confirmDelete({{ $producto->id }})">
                                                <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection