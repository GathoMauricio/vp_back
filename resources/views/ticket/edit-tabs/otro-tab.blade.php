<div class="tab-pane fade" id="otro" role="tabpanel" aria-labelledby="otro-tab">
    <h5 class="text-center font-weight-bold p-1" style="background-color:#60b22f;color:white;">
        OTRO
    </h5>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="category_id" class="vp-label-form">CATEGORÍA</label>
                <select name="category_id" id="category_id" class="form-select">
                    @foreach ($categories as $category)
                        @if ($category->id == $ticket->category_id)
                            <option value="{{ $category->id }}" selected>{{ $category->categoria }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->categoria }}</option>
                        @endif
                    @endforeach
                </select>
                @error('category_id')
                    <small style="color:red;">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="cotizar_producto" class="vp-label-form"> COTIZAR PRODUCTO</label>
                <select onchange="cotizarProducto(this.value)" name="cotizar_producto" id="cotizar_producto"
                    class="form-select">
                    @if ($ticket->cotizar_producto == 'SI')
                        <option value="NO">NO</option>
                        <option value="SI" selected>SI</option>
                    @else
                        <option value="NO" selected>NO</option>
                        <option value="SI">SI</option>
                    @endif
                </select>
                <br>
                <input type="text" value="{{ $ticket->especifique_cotizar_producto }}"
                    name="especifique_cotizar_producto" class="form-control" id="especifique_cotizar_producto"
                    placeholder="ESPECIFIQUE..." @if ($ticket->cotizar_producto == 'NO') style="display:none;" @endif>
                @error('especifique_cotizar_producto')
                    <small style="color:red;">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h5 class="text-center font-weight-bold p-1" style="background-color:#60b22f;color:white;">
                CALIFICACIÓN DE SERVICIO
            </h5>
            <table style="width: 100%;">
                <tr>
                    <td class="text-center">
                        <span class="icon icon-star-empty"></span>
                        <span class="icon icon-star-empty"></span>
                        <span class="icon icon-star-empty"></span>
                        <br>
                        @if ($ticket->calificacion == 'MALO')
                            <input type="radio" name="calificacion" value="MALO" checked>
                        @else
                            <input type="radio" name="calificacion" value="MALO">
                        @endif
                        MALO
                    </td>
                    <td class="text-center">
                        <span class="icon icon-star-full" style="color:yellow"></span>
                        <span class="icon icon-star-empty"></span>
                        <span class="icon icon-star-empty"></span>
                        <br>
                        @if ($ticket->calificacion == 'REGULAR')
                            <input type="radio" name="calificacion" value="REGULAR" checked>
                        @else
                            <input type="radio" name="calificacion" value="REGULAR">
                        @endif
                        REGULAR
                    </td>
                    <td class="text-center">
                        <span class="icon icon-star-full" style="color:yellow"></span>
                        <span class="icon icon-star-full" style="color:yellow"></span>
                        <span class="icon icon-star-empty"></span>
                        <br>
                        @if ($ticket->calificacion == 'BUENO')
                            <input type="radio" name="calificacion" value="BUENO" checked>
                        @else
                            <input type="radio" name="calificacion" value="BUENO">
                        @endif
                        BUENO
                    </td>
                    <td class="text-center">
                        <span class="icon icon-star-full" style="color:yellow"></span>
                        <span class="icon icon-star-full" style="color:yellow"></span>
                        <span class="icon icon-star-full" style="color:yellow"></span>
                        <br>
                        @if ($ticket->calificacion == 'EXCELENTE')
                            <input type="radio" name="calificacion" value="EXCELENTE" checked>
                        @else
                            <input type="radio" name="calificacion" value="EXCELENTE">
                        @endif
                        EXCELENTE
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-md-6">
            <h5 class="text-center font-weight-bold p-1" style="background-color:#60b22f;color:white;">
                ESTATUS PAGADO
            </h5>
            <select name="pagado" id="pagado" class="form-select">
                @switch($ticket->pagado)
                    @case('N|A')
                        <option value="N|A" selected>NO APLICA</option>
                        <option value="PPP">PENDIENTE POR PAGAR</option>
                        <option value="PAG">PAGADO</option>
                        <option value="PPD">PAGADO POR PARCIALIDADES O DIFERIDO </option>
                    @break

                    @case('PPP')
                        <option value="N|A">NO APLICA</option>
                        <option value="PPP" selected>PENDIENTE POR PAGAR</option>
                        <option value="PAG">PAGADO</option>
                        <option value="PPD">PAGADO POR PARCIALIDADES O DIFERIDO </option>
                    @break

                    @case('PAG')
                        <option value="N|A">NO APLICA</option>
                        <option value="PPP">PENDIENTE POR PAGAR</option>
                        <option value="PAG" selected>PAGADO</option>
                        <option value="PPD">PAGADO POR PARCIALIDADES O DIFERIDO </option>
                    @break

                    @case('PPD')
                        <option value="N|A">NO APLICA</option>
                        <option value="PPP">PENDIENTE POR PAGAR</option>
                        <option value="PAG">PAGADO</option>
                        <option value="PPD" selected>PAGADO POR PARCIALIDADES O DIFERIDO </option>
                    @break
                @endswitch
            </select>
        </div>
    </div>
    <hr style="height:2px; width:100%; border-width:0; color:#60b22f; background-color:#60b22f">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="comentarios_cliente" class="vp-label-form">COMENTARIOS CLIENTE</label>
                <textarea name="comentarios_cliente" id="comentarios_cliente" class="form-control">{{ old('comentarios_cliente', $ticket->comentarios_cliente ?: '') }}</textarea>
                @error('comentarios_cliente')
                    <small style="color:red;">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror
            </div>
        </div>
    </div>
    @if ($ticket->status->id == 6)
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="motivo_cancelacion" class="vp-label-form">MOTIVO DE
                        CANCELACIÓN</label>
                    <textarea name="motivo_cancelacion" id="motivo_cancelacion" class="form-control">{{ old('motivo_cancelacion', $ticket->motivo_cancelacion ?: '') }}</textarea>
                    @error('comentarios_cliente')
                        <small style="color:red;">
                            <strong>{{ $message }}</strong>
                        </small>
                    @enderror
                </div>
            </div>
        </div>
    @endif
</div>
