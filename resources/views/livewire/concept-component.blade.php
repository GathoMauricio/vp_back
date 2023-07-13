<div class="container">
    <div class="row justify-content-center">
        <h4>
            Conceptos de pago
        </h4>
        <div class="form">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="concepto" class="vp-label-form">Concepto</label>
                        <input type="text" wire:model="concepto" name="concepto" id="concepto" class="form-control">
                        @error('concepto')
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
                        Concepto
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
                @foreach ($conceptos as $item)
                    <tr>
                        <td width="90%">{{ $item->concepto }}</td>
                        <td width="10%"><button onclick="deleteConcepto({{ $item->id }})"
                                class="btn btn-danger"><span class="icon icon-bin"></span></button></td>
                    </tr>
                @endforeach
            </thead>
        </table>
    </div>
</div>
