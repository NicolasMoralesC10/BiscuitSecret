<div class="row padding-1 p-1">
    @if (!$user->id)
    <div class="col-md-6">
        @else
        <div class="col-md-4">
            @endif
            <div class="form-group mb-2 mb20">
                <label for="name" class="form-label">{{ __('Nombre') }}</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user?->name) }}" id="name" placeholder="Nombre">
                {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
        </div>
        @if (!$user->id)
        <div class="col-md-6">
            @else
            <div class="col-md-4">
                @endif
                <div class="form-group mb-2 mb20">
                    <label for="email" class="form-label">{{ __('Correo') }}</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user?->email) }}" id="email" placeholder="Correo">
                    {!! $errors->first('email', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            @if (!$user->id)
            <div class="col-md-6">
                <div class="form-group mb-2 mb20">
                    <label for="password" class="form-label">{{ __('Contraseña') }}</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password', $user?->password) }}" id="password" placeholder="Contraseña">
                    {!! $errors->first('password', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                @else
                <div class="col-md-4">
                    @endif
                    <div class="form-group mb-2 mb20">
                        <label for="phone" class="form-label">{{ __('Teléfono') }}</label>
                        <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $user?->phone) }}" id="phone" placeholder="Teléfono">
                        {!! $errors->first('phone', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                    </div>
                </div>

            </div>
            <div class="d-flex justify-content-end mt-4">
                <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
            </div>
        </div>