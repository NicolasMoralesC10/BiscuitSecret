@extends('layouts.user_type.auth')

@section('content')

<div class="container-fluid py-4">
    <div class="card">
        <div class="card-header pb-0 px-3">
            <h6 class="mb-0">{{ __('Editar Producto') }}</h6>
        </div>
        <div class="card-body pt-4 p-3">
            <!-- Modal -->
            <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-gradient-primary">
                            <h5 class="modal-title" id="imageModalLabel">Imagen</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                        </div>
                        <div class="modal-body text-center">
                            <img id="modalImage" src="" class="img-fluid" alt="Imagen">
                        </div>
                    </div>
                </div>
            </div>
            <form action="{{ route('productos.update', $producto) }}" method="POST" role="form text-left" enctype="multipart/form-data">
                @csrf
                @method('PUT')
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
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="user-name" class="form-control-label">Nombre</label>
                            <div class="@error('user.name')border border-danger rounded-3 @enderror">
                                <input class="form-control" value="{{ $producto->nombre }}" type="text" placeholder="Name" name="nombre" required>
                                @error('name')
                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">

                        <div class="form-group">
                            <label for="user.phone" class="form-control-label">Precio</label>
                            <div class="@error('precio')border border-danger rounded-3 @enderror">
                                <input class="form-control" value="{{ $producto->precio }}" type="number" min="1" placeholder="Precio" name="precio" required>
                                @error('precio')
                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="user-email" class="form-control-label">Imagen</label> <button type="button" class="" style="border: none; background:transparent;box-shadow:none;color: #67748e;font-size:0.7rem" data-bs-toggle="modal" data-bs-target="#imageModal" data-img-url="{{ asset('storage/' . $producto->imagen) }}" data-title-img="{{ $producto->nombre }}">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                            <div class="@error('image')border border-danger rounded-3 @enderror">
                                <input class="form-control" value="" type="file" accept="image/*" name="imagen">
                                @error('image')
                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user.phone" class="form-control-label">Cantidad</label>
                            <div class="@error('cantidad')border border-danger rounded-3 @enderror">
                                <input class="form-control" type="number" placeholder="Cantidad" name="cantidad" min="1" value="{{ $producto->cantidad }}" required>
                                @error('cantidad')
                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        @if($producto->estado == 1)
                        <div class="form-group">
                            <label for="user.location" class="form-control-label">Estado</label>
                            <div class="@error('user.location') border border-danger rounded-3 @enderror">
                                <select class="form-select" aria-label="Default select example" name="estado" required>
                                    <option selected value="1">Activo</option>
                                    <option value="2">Inactivo</option>
                                </select>
                            </div>
                        </div>
                        @elseif ($producto->estado == 2)
                        <div class="form-group">
                            <label for="user.location" class="form-control-label">Estado</label>
                            <div class="@error('user.location') border border-danger rounded-3 @enderror">
                                <select class="form-select" aria-label="Default select example" name="estado" required>
                                    <option selected value="2">Inactivo</option>
                                    <option value="1">Activo</option>
                                </select>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="about">Descripcion</label>
                    <div class="@error('user.about')border border-danger rounded-3 @enderror">
                        <textarea class="form-control" rows="3" placeholder="Detalles del productos" name="descripcion">{{$producto->descripcion}}</textarea>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Guardar Cambios' }}</button>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection