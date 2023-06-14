<div class="container">
    <h5 class="text-center font-weight-bold p-1" style="background-color:#60b22f;color:white;">
        DATOS DEL CLIENTE
    </h5>
    <hr style="height:2px; width:100%; border-width:0; color:#60b22f; background-color:#60b22f">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="client_id" class="vp-label-form">RAZÓN
                    SOCIAL*</label>
                <input value="{{ $ticket->usuario->cliente->razon_social }}" class="form-control" readonly>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="usuario_id" class="vp-label-form">USUARIO*</label>
                <input value="{{ $ticket->usuario->name }}" class="form-control" readonly>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="area" class="vp-label-form">ÁREA</label>
                <input value="{{ $ticket->usuario->area }}" class="form-control" readonly>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="telefono" class="vp-label-form">TELÉFONO</label>
                <input value="{{ $ticket->usuario->telefono }}" class="form-control" readonly>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="email" class="vp-label-form">EMAIL</label>
                <input value="{{ $ticket->usuario->email }}" class="form-control" readonly>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <label for="tipo_servicio" class="vp-label-form">TIPO DE SERVICIO</label>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Tipo</th>
                        <th scope="col">Detalles</th>
                    </tr>
                </thead>
                <tbody id="tbody_service_types">
                    @foreach ($ticket->tipos_servicios as $tipo_servicio)
                        <tr>
                            <td>{{ $tipo_servicio->tipo }}</td>
                            <td>{{ $tipo_servicio->detalle }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="direccion" class="vp-label-form">DIRECCIÓN</label>
            <input value="{{ $ticket->usuario->direccion }}" class="form-control" readonly>
        </div>
    </div>
</div>
<h5 class="text-center font-weight-bold p-1" style="background-color:#60b22f;color:white;">
    TIPO DE MANTENIMIENTO
</h5>
<hr style="height:2px; width:100%; border-width:0; color:#60b22f; background-color:#60b22f">
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="prioridad" class="vp-label-form">PRIORIDAD*</label>
            <input value="{{ $ticket->prioridad }}" class="form-control" readonly>
        </div>
    </div>
    {{--  <div class="col-md-4">
            <div class="form-group">
                <label for="clase_id" class="vp-label-form">CLASE*</label>
                <input value="{{ $ticket->clase->tipo }}" class="form-control" readonly>
            </div>
        </div>  --}}
    <div class="col-md-6">
        <div class="form-group">
            <label for="coordinador_id" class="vp-label-form">COORDINADOR DEL PROYECTO</label>
            <input value="{{ $ticket->coordinador->name }}" class="form-control" readonly>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="problematica" class="vp-label-form">PROBLEMATICA / SOLICITUD*</label>
            <input value="{{ $ticket->problematica }}" class="form-control" readonly>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="comentarios_usuario" class="vp-label-form">COMENTARIOS USUARIO</label>
            <input value="{{ $ticket->comentarios_usuario }}" class="form-control" readonly>
        </div>
    </div>
</div>
<h5 class="text-center font-weight-bold p-1" style="background-color:#60b22f;color:white;">
    DATOS DEL EQUIPO
</h5>
<hr style="height:2px; width:100%; border-width:0; color:#60b22f; background-color:#60b22f">
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="tipo_equipo" class="vp-label-form">TIPO</label>
            <input value="{{ $ticket->tipo_equipo }}" class="form-control" readonly>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="marca_equipo" class="vp-label-form">MARCA</label>
            <input value="{{ $ticket->marca_equipo }}" class="form-control" readonly>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="modelo_equipo" class="vp-label-form">MODELO</label>
            <input value="{{ $ticket->modelo_equipo }}" class="form-control" readonly>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="serie_equipo" class="vp-label-form">N° DE SERIE</label>
            <input value="{{ $ticket->serie_equipo }}" class="form-control" readonly>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="password_equipo" class="vp-label-form">PASSWORD</label>
            <input value="{{ $ticket->password_equipo }}" class="form-control" readonly>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="disco_duro_equipo" class="vp-label-form">DISCO DURO</label>
            <input value="{{ $ticket->disco_duro_equipo }}" class="form-control" readonly>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="capacidad_equipo" class="vp-label-form">CAPACIDAD</label>
            <input value="{{ $ticket->capacidad_equipo }}" class="form-control" readonly>
        </div>
    </div>
</div>
<h5 class="text-center font-weight-bold p-1" style="background-color:#60b22f;color:white;">
    LLENE EN CASO DE QUE APIQUE
</h5>
<hr style="height:2px; width:100%; border-width:0; color:#60b22f; background-color:#60b22f">
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="procesador_equipo" class="vp-label-form">PROCESADOR</label>
            <input value="{{ $ticket->procesador_equipo }}" class="form-control" readonly>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="ram_equipo" class="vp-label-form">MEMORIA RAM</label>
            <input value="{{ $ticket->ram_equipo }}" class="form-control" readonly>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="so_equipo" class="vp-label-form">S.O.</label>
            <input value="{{ $ticket->so_equipo }}" class="form-control" readonly>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="office_equipo" class="vp-label-form">OFFICE</label>
            <input value="{{ $ticket->office_equipo }}" class="form-control" readonly>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="antivirus_equipo" class="vp-label-form">ANTIVIRUS</label>
            <input value="{{ $ticket->antivirus_equipo }}" class="form-control" readonly>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="office_caducidad_equipo" class="vp-label-form">CADUCIDAD | DÍAS RESTANTES</label>
            <input value="{{ $ticket->office_caducidad_equipo }}" class="form-control" readonly>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="antivirus_caducidad_equipo" class="vp-label-form">CADUCIDAD | DÍAS
                RESTANTES</label>
            <input value="{{ $ticket->antivirus_caducidad_equipo }}" class="form-control" readonly>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="software_equipo" class="vp-label-form">SOFTWARE ESPECIAL</label>
            <input value="{{ $ticket->software_equipo }}" class="form-control" readonly>
        </div>
    </div>
</div>
<h5 class="text-center font-weight-bold p-1" style="background-color:#60b22f;color:white;">
    VALORACIÓN TÉCNICA
</h5>
<hr style="height:2px; width:100%; border-width:0; color:#60b22f; background-color:#60b22f">
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="danio" class="vp-label-form">DAÑO</label>
            <textarea class="form-control" readonly>{{ $ticket->danio }}</textarea>
            @error('danio')
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
            <label for="advertencia" class="vp-label-form">ADVERTENCIA</label>
            <textarea class="form-control" readonly>{{ $ticket->advertencia }}</textarea>
            @error('advertencia')
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
            <label for="solucion" class="vp-label-form">SOLUCIÓN / RECOMENDACIONES</label>
            <textarea class="form-control" readonly>{{ $ticket->solucion }}</textarea>
            @error('solucion')
                <small style="color:red;">
                    <strong>{{ $message }}</strong>
                </small>
            @enderror
        </div>
    </div>
</div>
<h5 class="text-center font-weight-bold p-1" style="background-color:#60b22f;color:white;">
    CALIFICACIÓN DE SERVICIO
</h5>
<div class="row">
    <div class="col-md-12">
        <table style="width: 100%;">
            <tr>
                <td class="text-center">
                    <span class="icon icon-star-empty"></span>
                    <span class="icon icon-star-empty"></span>
                    <span class="icon icon-star-empty"></span>
                    <br>
                    @if ($ticket->calificacion == 'MALO')
                        <input type="radio" name="calificacion" value="MALO" checked disabled>
                    @else
                        <input type="radio" name="calificacion" value="MALO" disabled>
                    @endif
                    MALO
                </td>
                <td class="text-center">
                    <span class="icon icon-star-full" style="color:yellow"></span>
                    <span class="icon icon-star-empty"></span>
                    <span class="icon icon-star-empty"></span>
                    <br>
                    @if ($ticket->calificacion == 'REGULAR')
                        <input type="radio" name="calificacion" value="REGULAR" checked disabled>
                    @else
                        <input type="radio" name="calificacion" value="REGULAR" disabled>
                    @endif
                    REGULAR
                </td>
                <td class="text-center">
                    <span class="icon icon-star-full" style="color:yellow"></span>
                    <span class="icon icon-star-full" style="color:yellow"></span>
                    <span class="icon icon-star-empty"></span>
                    <br>
                    @if ($ticket->calificacion == 'BUENO')
                        <input type="radio" name="calificacion" value="BUENO" checked disabled>
                    @else
                        <input type="radio" name="calificacion" value="BUENO" disabled>
                    @endif
                    BUENO
                </td>
                <td class="text-center">
                    <span class="icon icon-star-full" style="color:yellow"></span>
                    <span class="icon icon-star-full" style="color:yellow"></span>
                    <span class="icon icon-star-full" style="color:yellow"></span>
                    <br>
                    @if ($ticket->calificacion == 'EXCELENTE')
                        <input type="radio" name="calificacion" value="EXCELENTE" checked disabled>
                    @else
                        <input type="radio" name="calificacion" value="EXCELENTE" disabled>
                    @endif
                    EXCELENTE
                </td>
            </tr>
        </table>
    </div>
</div>
<hr style="height:2px; width:100%; border-width:0; color:#60b22f; background-color:#60b22f">
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="comentarios_cliente" class="vp-label-form">COMENTARIOS CLIENTE</label>
            <input value="{{ $ticket->comentarios_cliente }}" class="form-control" readonly>
        </div>
    </div>
</div>
@if ($ticket->status->id == 6)
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="motivo_cancelacion" class="vp-label-form">MOTIVO DE CANCELACIÓN</label>
                <textarea name="motivo_cancelacion" id="motivo_cancelacion" class="form-control" disabled>{{ old('motivo_cancelacion', $ticket->motivo_cancelacion ?: '') }}</textarea>
                @error('comentarios_cliente')
                    <small style="color:red;">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror
            </div>
        </div>
    </div>
@endif
</div>
