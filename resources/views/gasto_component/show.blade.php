<!-- Modal -->
<div wire:ignore.self class="modal fade" id="show_vale_{{ $vale->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold color-primary-sys" id="exampleModalLabel">
                    Detalles del vale
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="vp-label-form">Descripción</label>
                            <b>{{ $vale->descripcion }}</b>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="vp-label-form">Cant. Recibida</label>
                            <b>${{ $vale->cantidad_recibida }}</b>
                        </div>
                        <div class="col-md-4">
                            <label class="vp-label-form">Cant. Devuelta</label>
                            <b>${{ $vale->cantidad_regresada }}</b>
                        </div>
                        <div class="col-md-4">
                            <label class="vp-label-form">Gasto total</label>
                            <b>${{ $vale->gasto_total }}</b>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="vp-label-form">Autorizado por</label>
                            <b>{{ $vale->autorizado_por }}</b>
                        </div>
                        <div class="col-md-6">
                            <label class="vp-label-form">Recobido_por</label>
                            <b>{{ $vale->recibido_por }}</b>
                        </div>
                    </div>
                </div>
                @include('gasto_component.table')
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
