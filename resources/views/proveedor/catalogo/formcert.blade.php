<section class="section container services">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header card-header-border-bottom">
                    @if (!$data->id)
                        <h4>Agregar Nuevo certificado</h4>
                    @else
                        <h2>Editando Servicio #{{ $data->id }}</h2>
                    @endif
                </div>



                <div class="row ec-vendor-uploads">
                    <div class="row ec-vendor-uploads">

                        <div class="col-md-12"
                            style="margin-top:5px;margin-left:10px;margin-right:10px;">


                            <input type="hidden" name="prove_id" value="{{ $user }}">
                            <input type="hidden" name="servi_id" value="{{ $id }}">

                            <div class="col-md-12" style="margin-top:5px;">

                                <label class="form-label">Nombre Certificados / constancias /
                                    cursos</label>
                                <input type="text" name="nombre" class="form-control" required
                                    @if ($data->id) value="{{ $data->nombre }}" @endif>
                            </div>

                            <div class="col-md-12" style="margin-top:5px;">

                                <label for="imagen" class="form-label">Documento</label>
                                <input type="file" name="imagen" id="imagen" class="form-control" required
                                   >
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
