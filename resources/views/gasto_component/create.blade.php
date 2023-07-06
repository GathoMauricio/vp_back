<!-- Modal -->
<div wire:ignore.self class="modal fade" id="create_gasto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <br><br>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold color-primary-sys" id="exampleModalLabel">
                    Agregar gasto
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
                                <label class="vp-label-form">Proveedor</label>
                                <select wire:change="changeProvider" wire:model="proveedor" class="form-select">
                                    <option value>Seleccione una opción</option>
                                    @foreach ($proveedores as $key => $p)
                                        <option value="{{ $p->proveedor }}">{{ $p->proveedor }}</option>
                                    @endforeach
                                    <option value="OTRO">Otro</option>
                                </select>
                                @error('proveedor')
                                    <span style="color:rgb(219, 9, 149)">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row" style="display:{{ $displayOtroProveedor ? 'block' : 'none' }}">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="vp-label-form">Otro proveedor</label>
                                <input type="text" wire:model="proveedor_otro" class="form-control">
                                @error('proveedor_otro')
                                    <span style="color:rgb(219, 9, 149)">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="vp-label-form">Concepto</label>
                                <select wire:change="changeConcept" wire:model="concepto" class="form-select">
                                    <option value>Seleccione una opción</option>
                                    @foreach ($conceptos as $key => $c)
                                        <option value="{{ $c->concepto }}">{{ $c->concepto }}</option>
                                    @endforeach
                                    <option value="OTRO">Otro</option>
                                </select>
                                @error('concepto')
                                    <span style="color:rgb(219, 9, 149)">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row"style="display:{{ $displayOtroConcepto ? 'block' : 'none' }}">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="vp-label-form">Otro concepto</label>
                                <input type="text" wire:model="concepto_otro" class="form-control">
                                @error('concepto_otro')
                                    <span style="color:rgb(219, 9, 149)">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="vp-label-form">Costo</label>
                                <input type="number" step='0.1' wire:model="costo" class="form-control">
                                @error('costo')
                                    <span style="color:rgb(219, 9, 149)">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="vp-label-form">Detalle</label>
                                <input type="text" wire:model="detalle" class="form-control">
                                @error('detalle')
                                    <span style="color:rgb(219, 9, 149)">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button id="dismissCreateGasto" type="button" class="btn btn-secondary"
                    data-dismiss="modal">Cancelar</button>
                <button type="button" wire:click="store" class="btn btn-primary">Agregar</button>
            </div>
        </div>
    </div>
</div>
