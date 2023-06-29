<div class="tab-pane fade" id="valoracion-tecnica" role="tabpanel" aria-labelledby="valoracion-tecnica-tab">
    <h5 class="text-center font-weight-bold p-1" style="background-color:#60b22f;color:white;">
        VALORACIÓN TÉCNICA
    </h5>
    <hr style="height:2px; width:100%; border-width:0; color:#60b22f; background-color:#60b22f">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="danio" class="vp-label-form">DAÑO</label>
                <textarea name="danio" id="danio" class="form-control">{{ old('danio', $ticket->danio ?: '') }}</textarea>
                @error('danio')
                    <small style="color:red;">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="advertencia" class="vp-label-form">ADVERTENCIA</label>
                <textarea name="advertencia" id="advertencia" class="form-control">{{ old('advertencia', $ticket->advertencia ?: '') }}</textarea>
                @error('advertencia')
                    <small style="color:red;">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="solucion" class="vp-label-form">SOLUCIÓN / RECOMENDACIONES</label>
                <textarea name="solucion" id="solucion" class="form-control">{{ old('solucion', $ticket->solucion ?: '') }}</textarea>
                @error('solucion')
                    <small style="color:red;">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror
            </div>
        </div>
    </div>
</div>
