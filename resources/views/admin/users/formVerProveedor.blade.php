@extends('layouts.app_profile')
@section('title')
    Usuarios Proveedor
@endsection
@section('page_active')
    @if (!($ver = 0))
        Ver Usuario Proveedor
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
                                        <div class="col-md-4">
                                            <label for="name" class="form-label">Nombre</label>
                                            <input type="text" class="form-control slug-title" id="name"
                                                name="name" value="{{ $data->name }}">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="last_name" class="form-label">Apellidos</label>
                                            <input type="text" class="form-control slug-title" id="last_name"
                                                name="last_name" value="{{ $data->last_name }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="job" class="form-label">Puesto que desempeña en la
                                                empresa</label>
                                            <input type="text" class="form-control slug-title" id="job"
                                                name="job" value="{{ $data->job }}">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="areaEmpresa" class="form-label">Área en la que se encuentra</label>
                                            <input type="text" class="form-control slug-title" id="areaEmpresa"
                                                name="areaEmpresa" value="{{ $data->areaEmpresa }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="telefonoEmpresa" class="form-label">Teléfono de la empresa /
                                                extensión</label>
                                            <input type="text" class="form-control slug-title" id="telefonoEmpresa"
                                                name="telefonoEmpresa" value="{{ $data->telefonoEmpresa }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="phone" class="form-label">Celular personal</label>
                                            <input type="text" class="form-control slug-title" id="phone"
                                                name="phone" value="{{ $data->phone }}">
                                        </div>


                                        <div class="col-md-4">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="text" class="form-control slug-title" id="email"
                                                name="email" value="{{ $data->email }}">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="company" class="form-label">Compañía</label>
                                            <input type="text" class="form-control slug-title" id="company"
                                                name="company" value="{{ $data->company }}">
                                        </div>



                                        <div class="col-md-4">
                                            <label for="calle" class="form-label">Calle</label>
                                            <input type="text" class="form-control slug-title" id="calle"
                                                name="calle" value="{{ $data->calle }}">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="numeroCalle" class="form-label">Número</label>
                                            <input type="text" class="form-control slug-title" id="numeroCalle"
                                                name="numeroCalle" value="{{ $data->numeroCalle }}">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="colonia" class="form-label">Colonia</label>
                                            <input type="text" class="form-control slug-title" id="colonia"
                                                name="colonia" value="{{ $data->colonia }}">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="cp" class="form-label">C.P</label>
                                            <input type="text" class="form-control slug-title" id="cp"
                                                name="cp" value="{{ $data->cp }}">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="municipio" class="form-label">Municipio</label>
                                            <input type="text" class="form-control slug-title" id="municipio"
                                                name="municipio" value="{{ $data->municipio }}">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="delegación" class="form-label">Delegación</label>
                                            <input type="text" class="form-control slug-title" id="delegación"
                                                name="delegación" value="{{ $data->delegación }}">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="estado" class="form-label">Estado</label>
                                            <input type="text" class="form-control slug-title" id="estado"
                                                name="estado" value="{{ $data->estado }}">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="country" class="form-label">País</label>
                                            <input type="text" class="form-control slug-title" id="country"
                                                name="country" value="{{ $data->country }}">
                                        </div>


                                        <div class="col-md-4" style="margin-top:25px;">
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
                                            <label for="fotoGafete" class="form-label">Foto de gafete ambos lados </label>
                                            <br>
                                            <a target="_blank" class="btn btn-warning"
                                                title="Foto de gafete ambos lados"
                                                href="{{ url(env('admin') . '/empresas/gafete/' . $data->fotoGafete) }}">
                                                <i class="bi bi-download"></i>
                                            </a>

                                        </div>
                                        <div class="col-md-6">
                                            <label for="fotoCredencial" class="form-label">Foto credencial de elector (INE) ambos lados</label>
                                            <br>
                                            <a target="_blank" class="btn btn-warning"
                                                title="Foto credencial de elector (INE) ambos lados"
                                                href="{{ url(env('admin') . '/empresas/credencial/' . $data->fotoCredencial) }}">
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
