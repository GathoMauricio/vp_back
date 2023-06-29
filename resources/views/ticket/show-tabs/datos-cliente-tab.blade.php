<div class="tab-pane fade show active" id="datos-cliente" role="tabpanel" aria-labelledby="datos-cliente-tab">
    <h5 class="text-center font-weight-bold p-1" style="background-color:#60b22f;color:white;">
        DATOS DEL CLIENTE
    </h5>
    <hr style="height:2px; width:100%; border-width:0; color:#60b22f; background-color:#60b22f">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="client_id" class="vp-label-form">RAZÓN
                    SOCIAL*</label>
                <input type="text" value="{{ $ticket->usuario->cliente->razon_social }}" class="form-control"
                    readonly>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="usuario_id" class="vp-label-form">USUARIO*</label>
                <input type="text" value="{{ $ticket->usuario->name }}" class="form-control" readonly>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="area" class="vp-label-form">ÁREA</label>
                <input type="text" name="area" id="area" class="form-control" readonly>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="telefono" class="vp-label-form">TELÉFONO</label>
                <input type="text" name="telefono" id="telefono" class="form-control" readonly>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="email" class="vp-label-form">EMAIL</label>
                <input type="text" name="email" id="email" class="form-control" readonly>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="direccion" class="vp-label-form">DIRECCIÓN</label>
                <textarea name="direccion" id="direccion" class="form-control" readonly></textarea>
            </div>
        </div>
    </div>
</div>
