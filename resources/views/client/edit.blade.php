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
                <div class="row" style="display:none;">
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
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cp" class="vp-label-form">Código postal</label>
                            <input onkeyup="loadSepomex(this.value)" value="{{ old('cp', $client->cp) }}" type="number"
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
                            <input type="text" name="num_ext" value="{{ old('num_ext', $client->num_ext) }}"
                                id="num_ext" class="form-control">
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
                            <input type="text" name="num_int" value="{{ old('num_int', $client->num_int) }}"
                                id="num_int" class="form-control">
                            @error('num_int')
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
@section('ready_scripts')
    loadSepomex($('#cp').val());
    setTimeout(function(){
    $("#asentamiento").val('{{ $client->sepomex_id }}');
    },3*1000);
@endsection
