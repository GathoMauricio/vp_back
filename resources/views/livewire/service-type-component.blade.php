<div class="container">
    <div class="row justify-content-center">
        <h4>
            Tipos de servicio
        </h4>
        <div class="form">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tipo" class="vp-label-form">Tipo</label>
                        <input type="text" wire:model="tipo" name="tipo" id="tipo" class="form-control">
                        @error('tipo')
                            <small style="color:red;">
                                <strong>{{ $message }}</strong>
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="abrev" class="vp-label-form">Abreviatura</label>
                        <input type="text" wire:model="abrev" name="abrev" id="abrev" class="form-control">
                        @error('abrev')
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
                        Tipo
                    </th>
                    <th style="color:white;">
                        Abreviatura
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
                @foreach ($tipos as $item)
                    <tr>
                        <td width="45%">{{ $item->tipo }}</td>
                        <td width="45%">{{ $item->abrev }}</td>
                        <td width="10%"><button onclick="deleteTipoServicio({{ $item->id }})"
                                class="btn btn-danger"><span class="icon icon-bin"></span></button></td>
                    </tr>
                @endforeach
            </thead>
        </table>
    </div>
</div>
