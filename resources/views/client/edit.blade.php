@extends('layouts.app')
@section('content')
    @include('layouts.vp_header')
    <div class="container">
        <div class="row justify-content-center">
            <h4>
                Editar cliente
            </h4>
            <form action="{{ route('update/client', $client->id) }}" method="POST" class="container">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="razon_social" class="vp-label-form">Razon social</label>
                            <input type="text" name="razon_social"
                                value="{{ old('razon_social', $client->razon_social) }}" id="razon_social"
                                class="form-control">
                            @error('razon_social')
                                <small style="color:red;">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="rfc" class="vp-label-form">RFC</label>
                            <input type="text" name="rfc" value="{{ old('rfc', $client->rfc) }}" id="rfc"
                                class="form-control">
                            @error('rfc')
                                <small style="color:red;">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="telefono" class="vp-label-form">Teléfono</label>
                            <input type="phone" name="telefono" value="{{ old('telefono', $client->telefono) }}"
                                id="telefono" class="form-control">
                            @error('telefono')
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
                            <textarea name="direccion" value="" id="direccion"class="form-control">{{ old('direccion', $client->direccion) }}</textarea>
                            @error('direccion')
                                <small style="color:red;">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row text-right">
                    <input type="submit" value="Actualizar" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection