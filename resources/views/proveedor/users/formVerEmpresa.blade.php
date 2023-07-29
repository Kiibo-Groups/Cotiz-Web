@extends('layouts.app_proveedor')
@section('title')
    Usuarios Empresa
@endsection
@section('page_active')
    @if (!($ver = 0))
        Ver Usuario Empresa
    @else
        Editando Usuario #{{ $data->id }}
    @endif
@endsection


@section('content')
    {!! Form::model($data, ['url' => $form_url, 'files' => true, 'method' => 'PATCH']) !!}
    <input type="hidden" value="{{ $data->id }}" name="id">
    <section class="section banners">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="card info-card">
                        <div class="card-header card-header-border-bottom">


                        </div>

                        <div class="row ec-vendor-uploads">

                            <div class="col-lg-12">
                                <div class="ec-vendor-img-upload">
                                    <div class="ec-vendor-main-img">
                                        <div class="avatar-upload">
                                            <div class="avatar-edit">
                                                <input type='file' id="img"
                                                    @if (!$data->id) required="required" @endif
                                                    name="img" class="ec-image-upload" accept=".png, .jpg, .jpeg" />

                                            </div>

                                            <div class="avatar-preview ec-preview">
                                                <div class="imagePreview ec-div-preview">
                                                    @if ($data->id)
                                                        <img class="ec-image-preview" src="{{ asset('assets/img/logos/'.$data->pic_profile) }}"
                                                            alt="usuario" />
                                                    @else
                                                        <img class="ec-image-preview"
                                                            src="{{ asset('profile/img/user_profile.jpg') }}"
                                                            alt="edit" />
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-12">

                                <div class="ec-vendor-upload-detail">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="name" class="form-label">Nombre</label>
                                            <input type="text" class="form-control slug-title" id="name"
                                                name="name" value="{{ $data->name }}">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="last_name" class="form-label">Apellidos</label>
                                            <input type="text" class="form-control slug-title" id="last_name"
                                                name="last_name" value="{{ $data->last_name }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="job" class="form-label">Puesto que desempeña en la
                                                empresa</label>
                                            <input type="text" class="form-control slug-title" id="job"
                                                name="job" value="{{ $data->job }}">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="areaEmpresa" class="form-label">Área en la que se encuentra</label>
                                            <input type="text" class="form-control slug-title" id="areaEmpresa"
                                                name="areaEmpresa" value="{{ $data->areaEmpresa }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="telefonoEmpresa" class="form-label">Teléfono de la empresa /
                                                extensión</label>
                                            <input type="text" class="form-control slug-title" id="telefonoEmpresa"
                                                name="telefonoEmpresa" value="{{ $data->telefonoEmpresa }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="phone" class="form-label">Celular personal</label>
                                            <input type="text" class="form-control slug-title" id="phone"
                                                name="phone" value="{{ $data->phone }}">
                                        </div>


                                        <div class="col-md-6">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="text" class="form-control slug-title" id="email"
                                                name="email" value="{{ $data->email }}">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="company" class="form-label">Compañía</label>
                                            <input type="text" class="form-control slug-title" id="company"
                                                name="company" value="{{ $data->company }}">
                                        </div>



                                        <div class="col-md-6" style="margin-top:25px;">
                                            <label class="form-label">Dirección de empresa</label>
                                            <input type="text" class="form-control slug-title" id="address"
                                                name="address" value="{{ $data->address }}">
                                        </div>

                                        <div class="col-md-6" style="margin-top:25px;">
                                            <label class="form-label">Status</label>
                                            <select name="status" id="status" class="form-select"
                                                required="required">
                                                <option value="1" @if ($data->status == 1) selected @endif>
                                                    Inactivo</option>
                                                <option value="0" @if ($data->status == 0) selected @endif>
                                                    Activo</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="fotoGafete" class="form-label">Foto de gafete lado #1 </label>
                                            <br>
                                            <a target="_blank" class="btn btn-warning"
                                                title="Foto de gafete lado #1"
                                                href="{{ url(env('admin') . '/empresas/gafete/' . $data->fotoGafete) }}">
                                                <i class="bi bi-download"></i>
                                            </a>

                                        </div>
                                        <div class="col-md-6">
                                            <label for="fotoGafete" class="form-label">Foto de gafete lado #2 </label>
                                            <br>
                                            <a target="_blank" class="btn btn-warning"
                                                title="Foto de gafete lado #2"
                                                href="{{ url(env('admin') . '/empresas/gafete/' . $data->fotoGafete2) }}">
                                                <i class="bi bi-download"></i>
                                            </a>

                                        </div>
                                        <div class="col-md-6">
                                            <label for="fotoCredencial" class="form-label">Foto credencial de elector (INE)  lado #1 </label>
                                            <br>
                                            <a target="_blank" class="btn btn-warning"
                                                title="Foto credencial de elector (INE)  lado #1"
                                                href="{{ url(env('admin') . '/empresas/credencial/' . $data->fotoCredencial) }}">
                                                <i class="bi bi-download"></i>
                                            </a>

                                        </div>
                                        <div class="col-md-6">
                                            <label for="fotoCredencial" class="form-label">Foto credencial de elector (INE) lado #2 </label>
                                            <br>
                                            <a target="_blank" class="btn btn-warning"
                                                title="Foto credencial de elector (INE) lado #2"
                                                href="{{ url(env('admin') . '/empresas/credencial/' . $data->fotoCredencial2) }}">
                                                <i class="bi bi-download"></i>
                                            </a>

                                        </div>
                                    </div>



                                    <div class="mt-5" style="justify-items: end;display: grid;padding:20px;">

                                        @if (!($ver = 0))
                                            <a href="javascript:history.back()" class="btn btn-primary mb-2 btn-pill">
                                                Volver Atrás
                                            </a>
                                        @else
                                            <h2>Editando Usuario #{{ $data->id }}</h2>
                                        @endif

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </form>
@endsection
