<div class="container">
    <div class="row justify-content-center">
        <h4>
            Proveedores
        </h4>
        <div class="form">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="proveedor" class="vp-label-form">proveedor</label>
                        <input type="text" wire:model="proveedor" name="proveedor" id="proveedor" class="form-control">
                        @error('proveedor')
                            <small style="color:red;">
                                <strong>{{ $message }}</strong>
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <button wire:click="store" type="button" style="height: 80%;"
                        class="btn btn-primary btn-block">Agregar</button>
                </div>
            </div>
        </div>
        <table class="table table-stripped">
            <thead>
                <tr style="background-color:#60b22f">
                    <th style="color:white;">
                        Proveedor
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
                @foreach ($proveedores as $item)
                    <tr>
                        <td width="90%">{{ $item->proveedor }}</td>
                        <td width="10%"><button onclick="deleteProveedor({{ $item->id }})"
                                class="btn btn-danger"><span class="icon icon-bin"></span></button></td>
                    </tr>
                @endforeach
            </thead>
        </table>
    </div>
</div>
