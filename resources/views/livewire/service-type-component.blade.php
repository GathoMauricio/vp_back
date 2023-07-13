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
                        <label for="abrev" wire:model="abrev" class="vp-label-form">Avreviatura</label>
                        <input type="text" name="abrev" id="abrev" class="form-control">
                        @error('abrev')
                            <small style="color:red;">
                                <strong>{{ $message }}</strong>
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <button type="buttos" style="height: 80%;" class="btn btn-primary btn-block">Agregar</button>
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
                <tr>
                    <td width="45%">qwerty</td>
                    <td width="45%">qwerty</td>
                    <td width="10%"><button class="btn btn-danger"><span class="icon icon-bin"></span></button></td>
                </tr>
            </thead>
        </table>
    </div>
</div>
