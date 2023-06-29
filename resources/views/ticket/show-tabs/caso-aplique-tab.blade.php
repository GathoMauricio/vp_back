<div class="tab-pane fade" id="caso-aplique" role="tabpanel" aria-labelledby="caso-aplique-tab">
    <h5 class="text-center font-weight-bold p-1" style="background-color:#60b22f;color:white;">
        LLENE EN CASO DE QUE APIQUE
    </h5>
    <hr style="height:2px; width:100%; border-width:0; color:#60b22f; background-color:#60b22f">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="procesador_equipo" class="vp-label-form">PROCESADOR</label>
                <input value="{{ old('procesador_equipo', $ticket->procesador_equipo ?: '') }}" type="text"
                    name="procesador_equipo" id="procesador_equipo" class="form-control" readonly>
                @error('procesador_equipo')
                    <small style="color:red;">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="ram_equipo" class="vp-label-form">MEMORIA RAM</label>
                <input value="{{ old('ram_equipo', $ticket->ram_equipo ?: '') }}" type="text" name="ram_equipo"
                    id="ram_equipo" class="form-control" readonly>
                @error('ram_equipo')
                    <small style="color:red;">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="so_equipo" class="vp-label-form">S.O.</label>
                <input value="{{ old('so_equipo', $ticket->so_equipo ?: '') }}" type="text" name="so_equipo"
                    id="so_equipo" class="form-control" readonly>
                @error('so_equipo')
                    <small style="color:red;">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="office_equipo" class="vp-label-form">OFFICE</label>
                <input value="{{ old('office_equipo', $ticket->office_equipo ?: '') }}" type="text"
                    name="office_equipo" id="office_equipo" class="form-control" readonly>
                @error('office_equipo')
                    <small style="color:red;">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="antivirus_equipo" class="vp-label-form">ANTIVIRUS</label>
                <input value="{{ old('antivirus_equipo', $ticket->antivirus_equipo ?: '') }}" type="text"
                    name="antivirus_equipo" id="antivirus_equipo" class="form-control" readonly>
                @error('antivirus_equipo')
                    <small style="color:red;">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="office_caducidad_equipo" class="vp-label-form">CADUCIDAD | DÍAS
                    RESTANTES</label>
                <input value="{{ old('office_caducidad_equipo', $ticket->office_caducidad_equipo ?: '') }}"
                    type="number" name="office_caducidad_equipo" id="office_caducidad_equipo" class="form-control"
                    readonly>
                @error('office_caducidad_equipo')
                    <small style="color:red;">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="antivirus_caducidad_equipo" class="vp-label-form">CADUCIDAD | DÍAS
                    RESTANTES</label>
                <input value="{{ old('antivirus_caducidad_equipo', $ticket->antivirus_caducidad_equipo ?: '') }}"
                    type="number" name="antivirus_caducidad_equipo" id="antivirus_caducidad_equipo"
                    class="form-control" readonly>
                @error('antivirus_caducidad_equipo')
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
                <label for="software_equipo" class="vp-label-form">SOFTWARE ESPECIAL</label>
                <textarea name="software_equipo" id="software_equipo" class="form-control" readonly>{{ old('software_equipo', $ticket->software_equipo ?: '') }}</textarea>
                @error('software_equipo')
                    <small style="color:red;">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror
            </div>
        </div>
    </div>
</div>
