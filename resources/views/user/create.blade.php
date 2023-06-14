@extends('layouts.app')
@section('content')
    @include('layouts.vp_header')
    <div class="container">
        <div class="row justify-content-center">
            <h4>
                Crear usuario
            </h4>
            <form action="{{ route('store/user') }}" method="POST" class="container">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="name" class="vp-label-form">Nombre</label>
                            <input type="text" name="name" value="{{ old('name') }}" id="name"
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
                            <input type="email" name="email" value="{{ old('email') }}" id="email"
                                class="form-control">
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
                            <input type="phone" name="telefono" value="{{ old('telefono') }}" id="telefono"
                                class="form-control">
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
                                    <option value="{{ $rol->id }}">{{ $rol->name }}</option>
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
                <div class="row" style="display: none;">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="direccion" class="vp-label-form">Dirección</label>
                            <textarea type="phone" name="direccion" id="direccion" class="form-control">{{ old('direccion') }}</textarea>
                            @error('direccion')
                                <small style="color:red;">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cp" class="vp-label-form">Código postal</label>
                            <input onkeyup="loadSepomex(this.value)" value="{{ old('cp') }}" type="number"
                                name="cp" id="cp" class="form-control">
                            @error('cp')
                                <small style="color:red;">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="ciudad" class="vp-label-form">Ciudad</label>
                            <input type="text" name="ciudad" id="ciudad" class="form-control" readonly>
                            @error('ciudad')
                                <small style="color:red;">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="municipio" class="vp-label-form">Municipio</label>
                            <input type="text" name="municipio" id="municipio" class="form-control" readonly>
                            @error('municipio')
                                <small style="color:red;">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="asentamiento" class="vp-label-form">Colonia</label>
                            <select name="sepomex_id" id="asentamiento" class="form-select"></select>
                            @error('asentamiento')
                                <small style="color:red;">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="num_ext" class="vp-label-form">Núm. Exterior</label>
                            <input type="text" name="num_ext" id="num_ext" class="form-control">
                            @error('num_ext')
                                <small style="color:red;">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="num_int" class="vp-label-form">Núm. Interior</label>
                            <input type="text" name="num_int" id="num_int" class="form-control">
                            @error('num_int')
                                <small style="color:red;">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
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
                </div>
                <div class="row text-right">
                    <input type="submit" value="Guardar" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection
