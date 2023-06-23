
<section class="section banners">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="card info-card">
                    <div class="card-header card-header-border-bottom">
                        @if(!$data->id)
                        <h2>Agregar Nueva Empresa</h2>
                        @else
                        <h2>Ver Empresa #{{$data->id}}</h2>
                        @endif
                    </div>

                    <div class="row ec-vendor-uploads">
                        <div class="col-lg-12">
                            <div class="ec-vendor-upload-detail">
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label for="last_name" class="form-label">RFC</label>
                                        <input type="text" class="form-control slug-title" id="rfc" name="rfc" value="{{$data->rfc}}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="name" class="form-label">Nombre</label>
                                        <input type="text" class="form-control slug-title"  id="name" name="name" value="{{$data->nombre}}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="calle" class="form-label">Calle</label>
                                        <input type="text" class="form-control slug-title" id="calle" name="calle" value="{{$data->calle}}">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="numeroCalle" class="form-label">Número</label>
                                        <input type="text" class="form-control slug-title" id="numeroCalle" name="numeroCalle" value="{{$data->numeroCalle}}">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="colonia" class="form-label">Colonia</label>
                                        <input type="text" class="form-control slug-title" id="colonia" name="colonia" value="{{$data->colonia}}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="cp" class="form-label">C.P</label>
                                        <input type="text" class="form-control slug-title" id="cp" name="cp" value="{{$data->cp}}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="municipio" class="form-label">Municipio</label>
                                        <input type="text" class="form-control slug-title" id="municipio" name="municipio" value="{{$data->municipio}}">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="delegación" class="form-label">Delegación</label>
                                        <input type="text" class="form-control slug-title" id="delegación" name="delegación" value="{{$data->delegación}}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="estado" class="form-label">Estado</label>
                                        <input type="text" class="form-control slug-title" id="estado" name="estado" value="{{$data->estado}}">
                                    </div>
                                    <div class="col-md-6" style="margin-top:25px;">
                                        <label class="form-label">País</label>
                                        <input type="text" class="form-control slug-title" id="pais" name="pais" value="{{$data->pais}}">
                                    </div>

                                    <div class="col-md-6" style="margin-top:25px;">
                                        <label class="form-label">Status</label>

                                        <select name="status" id="status" class="form-select" required="required">
                                            <option value="0" @if($data->status == 0) selected @endif>Aprobado</option>
                                            <option value="1" @if($data->status == 1) selected @endif>Pendiente</option>
                                        </select>
                                    </div>

                                    <div class="col-md-12" style="margin-top:25px;">
                                        <label class="form-label">Descripción de actividad principal de la empresa</label>
                                        <textarea class="form-control" rows="2" name="actividadPPal">{{$data->actividadPPal}}</textarea>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="delegación" class="form-label">Opinión positiva</label>
                                        <a target="_blank" class="btn btn-warning" href="{{ url(env('admin').'/empresas/file/'.$data->opinionPositiva) }}">
                                            <i class="bi bi-download"></i>
                                        </a>


                                    </div>
                                    <div class="col-md-4">
                                        <label for="delegación" class="form-label">Información bancaria</label>
                                        <a target="_blank" class="btn btn-warning" href="{{ url(env('admin').'/empresas/file/'.$data->infoBancaria) }}">
                                            <i class="bi bi-download"></i>
                                        </a>

                                    </div>
                                    <div class="col-md-4">
                                        <label for="delegación" class="form-label">Constancia de situación fiscal</label>
                                        <a target="_blank" class="btn btn-warning" href="{{ url(env('admin').'/empresas/file/'.$data->constFiscal) }}">
                                            <i class="bi bi-download"></i>
                                        </a>

                                    </div>
                                    <div class="col-md-4">
                                        <label for="delegación" class="form-label">Registro de Domiclio fiscal</label>
                                        <a target="_blank" class="btn btn-warning" href="{{ url(env('admin').'/empresas/file/'.$data->domicilioFiscal) }}">
                                            <i class="bi bi-download"></i>
                                        </a>

                                    </div>
                                    <div class="col-md-4">
                                        <label for="delegación" class="form-label">Número de planta industrial</label>
                                        <a target="_blank" class="btn btn-warning" href="{{ url(env('admin').'/empresas/file/'.$data->numeroPlanta) }}">
                                            <i class="bi bi-download"></i>
                                        </a>

                                    </div>


                                </div>

                                <div class="mt-5" style="justify-items: end;display: grid;padding:20px;">
                                    <a href="javascript:history.back()" class="btn btn-primary mb-2 btn-pill">
                                        Volver Atrás
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
