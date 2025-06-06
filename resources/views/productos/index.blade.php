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

                        <!-- Modal -->
                        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-gradient-primary">
                                        <h5 class="modal-title text-light text-bold" id="imageModalLabel">Imagen</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <img id="modalImage" src="" class="img-fluid" alt="Imagen">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <table class="table align-items-center mb-0">
                            <thead class="text-center">
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                        Nombre
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">
                                        Descripcion
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">
                                        Precio
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">
                                        Cantidad
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">
                                        Imagen
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">
                                        Estado
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @forelse($productos as $producto)
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
                                            <button type="button" class="btn" style="border: none; background:transparent;box-shadow:none;padding:0%;margin:0" data-bs-toggle="modal" data-bs-target="#imageModal" data-img-url="{{ asset('storage/' . $producto->imagen) }}" data-title-img="{{ $producto->nombre }}" >
                                                <img src="{{ asset('storage/' . $producto->imagen) }}" class="avatar avatar-lg ">
                                            </button>
                                        </div>
                                    </td>
                                    @if ($producto->estado == 1)
                                    <td class="text-center">
                                        <span class="badge badge-sm bg-gradient-primary">Activo</span>
                                    </td>
                                    @elseif($producto->estado == 2)
                                    <td class="text-center">
                                        <span class="badge badge-sm bg-gradient-secondary">Inactivo</span>
                                    </td>
                                    @endif

                                    <td class="text-center">
                                        <!-- <a href="{{route('productos.edit', $producto)}}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Editar Producto">
                                            <i class="fas fa-user-edit text-secondary"></i>
                                        </a> -->
                                        <a href="{{route('productos.edit', $producto)}}">
                                            <button class="edit-button bg-gradient-primary">
                                                <svg class="edit-svgIcon" viewBox="0 0 512 512">
                                                    <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path>
                                                </svg>
                                            </button>
                                        </a>
                                        <form action="{{route('productos.destroy', $producto->id) }}" method="POST" style="display:inline;" id="delete-form-{{ $producto->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <!-- <button type="button" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Eliminar Producto" style="border: none; background: transparent;" onclick="confirmDelete({{ $producto->id }})">
                                                <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                            </button> -->
                                            <button type="button" class="buttonDel bg-gradient-primary" onclick="confirmDelete({{ $producto->id }})">
                                                <svg viewBox="0 0 448 512" class="svgIcon">
                                                    <path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">
                                        No hay registros en la tabla.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="pagination-container">
                            {{ $productos->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection