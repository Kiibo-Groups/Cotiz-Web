<section class="section container services">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header card-header-border-bottom">
                    @if (!$data->id)
                        <h4>Agregar Nueva referencias</h4>
                    @else
                        <h2>Editando Servicio #{{ $data->id }}</h2>
                    @endif
                </div>



                <div class="row ec-vendor-uploads">
                    <div class="row ec-vendor-uploads">

                        <div class="col-md-12"
                            style="margin-top:5px;margin-left:10px;margin-right:10px;">

                            <div class="col-md-12" style="margin-top:5px; ">
                                <input type="hidden" name="prove_id" value="{{ $user }}">
                                <input type="hidden" name="servi_id" value="{{ $id }}">

                                <label class="form-label">Referencias</label>
                                <select name="referencia" id="referencia" class="form-select js-example-basic-single" required>
                                    <option value="" selected></option>
                                    <option value="Profesionales" @if ($data->referencia === 'Profesionales') selected @endif>
                                        Profesionales</option>
                                    <option value="Personales" @if ($data->referencia === 'Personales') selected @endif>
                                        Personales</option>

                                </select>
                            </div>


                            <div class="col-md-12" style="margin-top:5px;">

                                <label class="form-label">Nombre completo</label>
                                <input type="text" name="nombre" class="form-control" required
                                    @if ($data->id) value="{{ $data->nombre }}" @endif>
                            </div>

                            <div class="col-md-12" style="margin-top:5px;">

                                <label for="direccion" class="form-label">Direccion</label>
                                <input type="text" name="direccion" id="direccion" class="form-control" required
                                    @if ($data->id) value="{{ $data->direccion }}" @endif>
                            </div>
                            <div class="col-md-12" style="margin-top:5px;">

                                <label for="tiempo" class="form-label">Tiempo de conocer</label>
                                <input type="text" name="tiempo" id="tiempo" class="form-control" required
                                    @if ($data->id) value="{{ $data->tiempo }}" @endif>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="ec-vendor-upload-detail">
                        <div class="mt-3" style="justify-items: end;display: grid;padding:5px;">
                            <button type="submit" class="btn btn-primary text-white rounded">
                                @if (!$data->id)
                                    Agregar
                                @else
                                    Actualizar
                                @endif
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
