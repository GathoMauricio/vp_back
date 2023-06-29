<div class="tab-pane fade" id="otro" role="tabpanel" aria-labelledby="otro-tab">
    <h5 class="text-center font-weight-bold p-1" style="background-color:#60b22f;color:white;">
        OTRO
    </h5>
    <hr style="height:2px; width:100%; border-width:0; color:#60b22f; background-color:#60b22f">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="category_id" class="vp-label-form">CATEGORÍA</label>
                <select name="category_id" id="category_id" class="form-select">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->categoria }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <small style="color:red;">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="cotizar_producto" class="vp-label-form"> COTIZAR PRODUCTO</label>
                <select onchange="cotizarProducto(this.value)" name="cotizar_producto" id="cotizar_producto"
                    class="form-select">
                    <option value="NO">NO</option>
                    <option value="SI">SI</option>
                </select>
                <br>
                <input type="text" name="especifique_cotizar_producto" class="form-control"
                    id="especifique_cotizar_producto" placeholder="ESPECIFIQUE..." style="display:none;">
                @error('especifique_cotizar_producto')
                    <small style="color:red;">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="ticket_id" class="vp-label-form"> ¿ESTE TICKET DEPENDE DE OTRO?</label>
                <select name="ticket_id" id="ticket_id" class="form-select select2" style="width:100%;">
                    <option value>NO</option>
                    @foreach ($tickets as $ticket)
                        <option value="{{ $ticket->id }}">{{ $ticket->folio }} -
                            {{ $ticket->usuario->cliente->razon_social }} - {{ $ticket->usuario->name }}
                        </option>
                    @endforeach
                </select>
                @error('cotizar_producto')
                    <small style="color:red;">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror
            </div>
        </div>
    </div>
</div>
