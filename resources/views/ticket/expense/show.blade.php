<!-- Modal -->
<div class="modal fade" id="show_expense_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalle vale de gastos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="provider_id" class="vp-label-form">PROVEEDOR</label>
                                <input type="text" id="show_expense_provider_id" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="concept_id" class="vp-label-form">CONCEPTO</label>
                                <input type="text" id="show_expense_concept_id" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="responsable_id" class="vp-label-form">RESPONSABLE</label>
                                <input type="text" id="show_expense_responsable_id" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="autoriza_id" class="vp-label-form">AUTORIZADO POR</label>
                                <input type="text" id="show_expense_autoriza_id" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="recibe_id" class="vp-label-form">RECIBIDO POR</label>
                                <input type="text" id="show_expense_recibe_id" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="estatus" class="vp-label-form">ESTATUS</label>
                                <input type="text" id="show_expense_estatus" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="cantidad" class="vp-label-form">CANTIDAD</label>
                                <input type="text" id="show_expense_cantidad" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="motivo_visita" class="vp-label-form">MOTIVO VISITA</label>
                                <textarea name="motivo_visita" id="show_expense_motivo_visita" class="form-control" readonly></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="detalle" class="vp-label-form">DETALLE</label>
                                <textarea name="detalle" id="show_expense_detalle" class="form-control" readonly></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="btn_dismiss_modal_show_expense" type="button" class="btn btn-secondary"
                    data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
