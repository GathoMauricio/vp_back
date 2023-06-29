<div class="tab-pane fade" id="tipo-mantenimiento" role="tabpanel" aria-labelledby="tipo-mantenimiento-tab">
    <h5 class="text-center font-weight-bold p-1" style="background-color:#60b22f;color:white;">
        TIPO DE MANTENIMIENTO
    </h5>
    <hr style="height:2px; width:100%; border-width:0; color:#60b22f; background-color:#60b22f">
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
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="prioridad" class="vp-label-form">PRIORIDAD*</label>
                <input value="{{ $ticket->prioridad }}" class="form-control" readonly>
            </div>
        </div>
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
</div>
