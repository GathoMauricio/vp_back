<!-- Modal -->
<div class="modal fade" id="create_expense_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar vale de gastos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('store/expense_voucher') }}" method="POST" id="form_expense_store">
                @csrf
                <input type="hidden" name="ticket_id" id="expense_ticket_id" value="{{ $ticket->id }}">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="provider_id" class="vp-label-form">PROVEEDOR</label>
                                    <select name="provider_id" id="expense_provider_id" class="form-select"
                                        style="width:100%">
                                        <option value>Seleccione una opción</option>
                                        @foreach ($proveedores as $proveedor)
                                            <option value="{{ $proveedor->id }}">{{ $proveedor->proveedor }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="concept_id" class="vp-label-form">CONCEPTO</label>
                                    <select name="concept_id" id="expense_concept_id" class="form-select"
                                        style="width:100%">
                                        <option value>Seleccione una opción</option>
                                        @foreach ($conceptos as $concepto)
                                            <option value="{{ $concepto->id }}">{{ $concepto->concepto }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="responsable_id" class="vp-label-form">RESPONSABLE</label>
                                    <select name="responsable_id" id="expense_responsable_id" class="form-select"
                                        style="width:100%">
                                        <option value>Seleccione una opción</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }} {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="autoriza_id" class="vp-label-form">AUTORIZADO POR</label>
                                    <select name="autoriza_id" id="expense_autoriza_id" class="form-select"
                                        style="width:100%">
                                        <option value>Seleccione una opción</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="recibe_id" class="vp-label-form">RECIBIDO POR</label>
                                    <select name="recibe_id" id="expense_recibe_id" class="form-select"
                                        style="width:100%">
                                        <option value>Seleccione una opción</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="estatus" class="vp-label-form">ESTATUS</label>
                                    <select name="estatus" id="expense_estatus" class="form-select" style="width:100%">
                                        <option value>Seleccione una opción</option>
                                        <option value="PENDIENTE">PENDIENTE</option>
                                        <option value="APROBADO">APROBADO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="cantidad" class="vp-label-form">CANTIDAD</label>
                                    <input type="number" name="cantidad" id="expense_cantidad" step="0.1"
                                        class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="motivo_visita" class="vp-label-form">MOTIVO VISITA</label>
                                    <textarea name="motivo_visita" id="expense_motivo_visita" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="detalle" class="vp-label-form">DETALLE</label>
                                    <textarea id="expense_detalle" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btn_dismiss_modal_expense" type="button" class="btn btn-secondary"
                        data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" onclick="storeExpence()">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
