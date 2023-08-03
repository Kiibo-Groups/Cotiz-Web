@extends('layouts.app_empresa')
@section('title')
    Perfil de administración
@endsection
@section('page_active')
    Perfil
@endsection


@section('content')
    {!! Form::model($data, ['url' => [$form_url], 'files' => true]) !!}
    <input type="hidden" value="{{ $data->id }}" name="id">
    <section class="section banners">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="card info-card">
                        <div class="card-header card-header-border-bottom">
                            @if ($data->role == 3)
                                <p style="color: red">Usuario Principal de Empresa</p>
                            @endif

                        </div>

                        <div class="row ec-vendor-uploads">




                            <div class="col-lg-12">
                                @include('alerts')
                                <div class="ec-vendor-upload-detail">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="name" class="form-label">Nombre</label>
                                            <input type="text" class="form-control slug-title" id="name"
                                                name="name" value="{{ $data->name }}">
                                        </div>
                                        @if ($data->role != 3)
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
                                                <label for="areaEmpresa" class="form-label">Área en la que se
                                                    encuentra</label>
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
                                                    name="email" value="{{ $data->email }}" readonly>
                                            </div>



                                            <div class="col-md-6" style="margin-top:25px;">
                                                <label class="form-label">Dirección de empresa</label>
                                                <input type="text" class="form-control slug-title" id="address"
                                                    name="address" value="{{ $data->address }}">
                                            </div>


                                    </div>
                                    @endif

                                    <div class="col-md-6" style="margin-top:25px;">
                                        <label class="form-label">Contraseña</label>
                                        <input type="password" class="form-control slug-title" id="password"
                                            name="password">
                                    </div>

                                    @if ($data->role == 3)
                                        <div class="col-md-12">
                                            <span class="d-block mt-1" style="font-size:14px;color:red;">
                                                Los archivos PDF no deben sobrepasar los 3 MB de tamaño..
                                            </span>
                                        <div class="col-md-12" style="margin-top:25px;">
                                            <label class="form-label">Opinión positiva</label>
                                            <input type="file" accept=".pdf" class="form-control slug-title" id="opinionPositiva"
                                                name="opinionPositiva">
                                        </div>
                                    @endif



                                    <div class="row mb-12">
                                        <div class="col-md-10" style="margin-top:25px; text-align: right">


                                        </div>

                                        <div class="col-md-2" style="margin-top:25px;">
                                            <button type="submit" class="btn btn-primary mb-2 btn-pill">
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
                </div>
            </div>
        </div>
    </section>
    </form>
@endsection
