<!-- Modal -->
<div wire:ignore.self class="modal fade" id="edit_vale" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold color-primary-sys" id="exampleModalLabel">
                    Editar vale de gastos
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <labelclass="vp-label-form">Descripción</label>
                                    <input type="text" wire:model="descripcion" class="form-control">
                                    @error('descripcion')
                                        <span style="color:rgb(219, 9, 149)">{{ $message }}</span>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <labelclass="vp-label-form">Cantidad recibida</label>
                                    <input type="number" step="0.1" wire:model="cantidad_recibida"
                                        class="form-control">
                                    @error('cantidad_recibida')
                                        <span style="color:rgb(219, 9, 149)">{{ $message }}</span>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <labelclass="vp-label-form">Responsable</label>
                                    <input type="text" wire:model="responsable" class="form-control">
                                    @error('responsable')
                                        <span style="color:rgb(219, 9, 149)">{{ $message }}</span>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <labelclass="vp-label-form">Cantidad devuelta</label>
                                    <input type="number" step="0.1" wire:model="cantidad_regresada"
                                        class="form-control">
                                    @error('cantidad_regresada')
                                        <span style="color:rgb(219, 9, 149)">{{ $message }}</span>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <labelclass="vp-label-form">Autorizado por</label>
                                    <input type="text" wire:model="autorizado_por" class="form-control">
                                    @error('autorizado_por')
                                        <span style="color:rgb(219, 9, 149)">{{ $message }}</span>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <labelclass="vp-label-form">Recibido por</label>
                                    <input type="text" wire:model="recibido_por" class="form-control">
                                    @error('recibido_por')
                                        <span style="color:rgb(219, 9, 149)">{{ $message }}</span>
                                    @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button id="dismissEditVale" type="button" class="btn btn-secondary"
                    data-dismiss="modal">Cancelar</button>
                <button type="button" wire:click="update" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
    </div>
</div>
