@extends('layouts.app')
@section('content')
    @include('layouts.vp_header')
    <div class="container">
        <div class="row justify-content-center">
            <h4>
                Editar usuario
            </h4>
            <form action="{{ route('update/user', $user->id) }}" method="POST" class="container">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="name" class="vp-label-form">Nombre</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" id="name"
                                class="form-control">
                            @error('name')
                                <small style="color:red;">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="email" class="vp-label-form">Email</label>
                            <input type="email" value="{{ $user->email }}" id="email" class="form-control" readonly>
                            @error('email')
                                <small style="color:red;">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="telefono" class="vp-label-form">Teléfono</label>
                            <input type="phone" name="telefono" value="{{ old('telefono', $user->telefono) }}"
                                id="telefono" class="form-control">
                            @error('telefono')
                                <small style="color:red;">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="role_id" class="vp-label-form">Rol</label>
                            <select name="role_id" id="role_id" class="form-select">
                                <option value>Seleccione una opción</option>
                                @foreach ($roles as $rol)
                                    @if ($rol->id == $user->role_id)
                                        <option value="{{ $rol->id }}" selected>{{ $rol->name }}</option>
                                    @else
                                        <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('role_id')
                                <small style="color:red;">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="direccion" class="vp-label-form">Dirección</label>
                            <textarea type="phone" name="direccion" id="direccion" class="form-control">{{ old('direccion', $user->direccion) }}</textarea>
                            @error('direccion')
                                <small style="color:red;">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                    </div>
                </div>
                {{--  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password" class="vp-label-form">Contraseña</label>
                            <input type="password" name="password" id="password" class="form-control">
                            @error('password')
                                <small style="color:red;">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password" class="vp-label-form">Repetir contraseña</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control">
                            @error('password_confirmation')
                                <small style="color:red;">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                    </div>
                </div>  --}}
                <div class="row text-right">
                    <input type="submit" value="Actualizar" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection
