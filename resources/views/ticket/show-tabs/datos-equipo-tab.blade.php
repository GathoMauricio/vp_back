<div class="tab-pane fade" id="datos-equipo" role="tabpanel" aria-labelledby="datos-equipo-tab">
    <h5 class="text-center font-weight-bold p-1" style="background-color:#60b22f;color:white;">
        DATOS DEL EQUIPO
    </h5>
    <hr style="height:2px; width:100%; border-width:0; color:#60b22f; background-color:#60b22f">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="tipo_equipo" class="vp-label-form">TIPO</label>
                <input value="{{ old('tipo_equipo', $ticket->tipo_equipo ?: '') }}" type="text" name="tipo_equipo"
                    id="tipo_equipo" class="form-control" readonly>
                @error('tipo_equipo')
                    <small style="color:red;">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="marca_equipo" class="vp-label-form">MARCA</label>
                <input value="{{ old('marca_equipo', $ticket->marca_equipo ?: '') }}" type="text" name="marca_equipo"
                    id="marca_equipo" class="form-control" readonly>
                @error('marca_equipo')
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
                <label for="modelo_equipo" class="vp-label-form">MODELO</label>
                <input value="{{ old('modelo_equipo', $ticket->modelo_equipo ?: '') }}" type="text"
                    name="modelo_equipo" id="modelo_equipo" class="form-control" readonly>
                @error('modelo_equipo')
                    <small style="color:red;">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="serie_equipo" class="vp-label-form">N° DE SERIE</label>
                <input value="{{ old('serie_equipo', $ticket->serie_equipo ?: '') }}" type="text" name="serie_equipo"
                    id="serie_equipo" class="form-control" readonly>
                @error('serie_equipo')
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
                <label for="password_equipo" class="vp-label-form">PASSWORD</label>
                <input value="{{ old('password_equipo', $ticket->password_equipo ?: '') }}" type="text"
                    name="password_equipo" id="password_equipo" class="form-control" readonly>
                @error('password_equipo')
                    <small style="color:red;">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="disco_duro_equipo" class="vp-label-form">DISCO DURO</label>
                <input value="{{ old('disco_duro_equipo', $ticket->disco_duro_equipo ?: '') }}" type="text"
                    name="disco_duro_equipo" id="disco_duro_equipo" class="form-control" readonly>
                @error('disco_duro_equipo')
                    <small style="color:red;">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="capacidad_equipo" class="vp-label-form">CAPACIDAD</label>
                <input value="{{ old('capacidad_equipo', $ticket->capacidad_equipo ?: '') }}" type="text"
                    name="capacidad_equipo" id="capacidad_equipo" class="form-control" readonly>
                @error('capacidad_equipo')
                    <small style="color:red;">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror
            </div>
        </div>
    </div>
</div>
