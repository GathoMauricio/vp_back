<div class="tab-pane fade" id="tipo-mantenimiento" role="tabpanel" aria-labelledby="tipo-mantenimiento-tab">
    <h5 class="text-center font-weight-bold p-1" style="background-color:#60b22f;color:white;">
        TIPO DE MANTENIMIENTO
    </h5>
    <hr style="height:2px; width:100%; border-width:0; color:#60b22f; background-color:#60b22f">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="cbo_tipo_servicio" class="vp-label-form">TIPO DE SERVICIO</label>
                <select id="cbo_tipo_servicio" name="cbo_tipo_servicio" class="form-select">
                    @foreach ($tipos_servicios as $tipos_servicio)
                        <option value="{{ $tipos_servicio->abrev }}">{{ $tipos_servicio->tipo }}
                        </option>
                    @endforeach
                </select>
                <br>
                <input id="detalle_tipo_servicio" type="text" class="form-control" placeholder="Detalles...">
                <br>
                <button onclick="addServiceType();" type="button" class="btn btn-primary btn-block">Agregar</button>
            </div>
        </div>
        <div class="col-md-6">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Tipo</th>
                        <th scope="col">Detalles</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody id="tbody_service_types">
                    <tr>
                        <td class="text-center" colspan="3">No se han agregado tipos de servicio
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="prioridad" class="vp-label-form">PRIORIDAD*</label>
                <select value="{{ old('prioridad') }}" name="prioridad" id="prioridad" class="form-select">
                    <option value>Seleccione una opción</option>
                    <option value="Baja">Baja</option>
                    <option value="Media">Media</option>
                    <option value="Alta">Alta</option>
                    <option value="Urgente">Urgente</option>
                </select>
                @error('prioridad')
                    <small style="color:red;">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="coordinador_id" class="vp-label-form">COORDINADOR DEL PROYECTO</label>
                <select value="{{ old('coordinador_id') }}" name="coordinador_id" id="coordinador_id"
                    class="form-select">
                    <option value>Seleccione una opción</option>
                    @foreach ($coordinadores as $coordinador)
                        <option value="{{ $coordinador->id }}">{{ $coordinador->name }}</option>
                    @endforeach
                </select>
                @error('coordinador_id')
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
                <label for="problematica" class="vp-label-form">PROBLEMATICA / SOLICITUD*</label>
                <textarea name="problematica" id="problematica" class="form-control">{{ old('problematica') }}</textarea>
                @error('problematica')
                    <small style="color:red;">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="comentarios_usuario" class="vp-label-form">COMENTARIOS USUARIO</label>
                <textarea name="comentarios_usuario" id="comentarios_usuario" class="form-control">{{ old('comentarios_usuario') }}</textarea>
                @error('comentarios_usuario')
                    <small style="color:red;">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror
            </div>
        </div>
    </div>
</div>
