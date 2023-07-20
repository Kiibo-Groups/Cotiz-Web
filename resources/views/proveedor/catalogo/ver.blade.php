@extends('layouts.app_proveedor')

@section('title')
    Ver Servicios
@endsection
@section('page_active')
    Ver Servicios
@endsection

<link href="{{ asset('assets2/libs/choices.js/public/assets/styles/choices.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets2/libs/@iconscout/unicons/css/line.css') }}" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('assets2/css/icons.css') }}" />

@section('content')
    <div class="container relative -mt-16 z-1">
        <div class="grid grid-cols-1">
            <!-- Start -->
            <section class="relative">
                <div class="container">

                    @include('alerts')

                    <div class="row">

                    </div>




                    <div class="col-lg-12" style="margin-left: 8px">

                        <div class="row" style="margin-right:1px;margin-top:3px;">
                            <div class="col-md-4">
                                <label for="nombre">Nombre </label>
                                <input id="nombre" type="text" class="form-control" name="nombre"
                                    @if ($data->id) value="{{ $data->nombre }}" @endif readonly>

                            </div>
                            <div class="col-md-4">
                                <label for="apellidoPaterno">Apellido paterno </label>
                                <input id="apellidoPaterno" type="text" class="form-control" name="apellidoPaterno"
                                    @if ($data->id) value="{{ $data->apellidoPaterno }}" @endif readonly>

                            </div>
                            <div class="col-md-4">
                                <label for="apellidoMaterno">Apellido materno </label>
                                <input id="apellidoMaterno" type="text" class="form-control" name="apellidoMaterno"
                                    @if ($data->id) value="{{ $data->apellidoMaterno }}" @endif readonly>


                            </div>
                        </div>

                        <div class="row" style="margin-right:1px;margin-top:3px;">

                            <div class="col-md-4">
                                <label for="carrera">Carrera profesional </label>
                                <input id="carrera" type="text" class="form-control" name="carrera"
                                    @if ($data->id) value="{{ $data->carrera }}" @endif readonly>

                            </div>

                            <div class="col-md-4">
                                <label for="especialidad">Especialidad </label>
                                <input id="especialidad" type="text" class="form-control" name="especialidad"
                                    @if ($data->id) value="{{ $data->especialidad }}" @endif readonly>

                            </div>
                            <div class="col-md-4">
                                <label for="calle">Calle </label>
                                <input id="calle" type="text" class="form-control" name="calle"
                                    @if ($data->id) value="{{ $data->calle }}" @endif readonly>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12" style="margin-left: 8px">
                        <div class="row" style="margin-right:1px;margin-top:18px;">

                            <div class="col-md-4">
                                <label for="numeroCalle">Número </label>
                                <input id="numeroCalle" type="text" class="form-control" name="numeroCalle"
                                    @if ($data->id) value="{{ $data->numeroCalle }}" @endif readonly>

                            </div>

                            <div class="col-md-4">
                                <label for="colonia">Colonia </label>
                                <input id="colonia" type="text" class="form-control" name="colonia"
                                    @if ($data->id) value="{{ $data->colonia }}" @endif readonly>

                            </div>
                            <div class="col-md-4">
                                <label for="cp">C.P </label>
                                <input id="cp" type="text" class="form-control" name="cp"
                                    @if ($data->id) value="{{ $data->cp }}" @endif readonly>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12" style="margin-left: 8px">
                        <div class="row" style="margin-right:1px;margin-top:18px;">
                            <div class="col-md-4">
                                <label for="municipio">Municipio </label>
                                <input id="municipio" type="text" class="form-control" name="municipio"
                                    @if ($data->id) value="{{ $data->municipio }}" @endif readonly>

                            </div>
                            <div class="col-md-4">
                                <label for="delegación">Delegación </label>
                                <input id="delegación" type="text" class="form-control" name="delegación"
                                    @if ($data->id) value="{{ $data->delegación }}" @endif readonly>

                            </div>

                            <div class="col-md-4">
                                <label for="estado">Estado </label>
                                <input id="estado" type="text" class="form-control" name="estado"
                                    @if ($data->id) value="{{ $data->estado }}" @endif readonly>

                            </div>

                        </div>
                    </div>
                    <div class="col-lg-12" style="margin-left: 8px">
                        <div class="row" style="margin-right:1px;margin-top:18px;">
                            <div class="col-md-4">
                                <label for="country">País </label>
                                <input id="country" type="text" class="form-control" name="country"
                                    @if ($data->id) value="{{ $data->country }}" @endif readonly>

                            </div>
                            <div class="col-md-4">
                                <label for="celular">Celular personal </label>
                                <input id="celular" type="text" class="form-control" name="celular"
                                    @if ($data->id) value="{{ $data->celular }}" @endif readonly>

                            </div>
                            <div class="col-md-4">
                                <label for="email">Email </label>
                                <input id="email" type="text" class="form-control" name="email"
                                    @if ($data->id) value="{{ $data->email }}" @endif readonly>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12" style="margin-left: 8px">
                        <div class="row" style="margin-right:1px;margin-top:18px;">
                            <div class="col-md-4">
                                <label for="fb">FB </label>
                                <input id="fb" type="text" class="form-control" name="fb"
                                    @if ($data->id) value="{{ $data->fb }}" @endif readonly>

                            </div>
                            <div class="col-md-4">
                                <label for="linkedin">LinkedIn </label>
                                <input id="linkedin" type="text" class="form-control" name="linkedin"
                                    @if ($data->id) value="{{ $data->linkedin }}" @endif readonly>

                            </div>

                            <div class="col-md-4">
                                <label for="instagram">Instagram </label>
                                <input id="instagram" type="text" class="form-control" name="instagram"
                                    @if ($data->id) value="{{ $data->instagram }}" @endif readonly>

                            </div>

                        </div>
                    </div>

                    <div class="col-lg-12" style="margin-left: 8px">
                        <div class="row" style="margin-right:1px;margin-top:18px;">
                            <div class="col-md-4">
                                <label for="delegación" class="form-label">Titulo o Carta pasante a color lado #1</label>
                                <br>
                                <a target="_blank" class="btn btn-warning"
                                    title="Descargar Titulo o Carta pasante a color lado #1"
                                    href="{{ url(env('user') . '/catalogo/file/' . $data->titulo1) }}">
                                    <i class="bi bi-download"></i>
                                </a>


                            </div>
                            <div class="col-md-4">
                                <label for="delegación" class="form-label">Titulo o Carta pasante a color lado #2</label>
                                <br>
                                <a target="_blank" class="btn btn-warning"
                                    title="Descargar Titulo o Carta pasante a color lado #2"
                                    href="{{ url(env('user') . '/catalogo/file/' . $data->titulo2) }}">
                                    <i class="bi bi-download"></i>
                                </a>

                            </div>
                            <div class="col-md-4">
                                <label for="delegación" class="form-label">Cedula profesional a color lado #1</label>
                                <br>
                                <a target="_blank" class="btn btn-warning"
                                    title="Descargar Cedula profesional a color lado #1"
                                    href="{{ url(env('user') . '/catalogo/file/' . $data->cedula1) }}">
                                    <i class="bi bi-download"></i>
                                </a>

                            </div>

                        </div>
                    </div>

                    <div class="row" style="margin-right:1px;margin-top:18px;">
                        <div class="col-md-4">
                            <label for="delegación" class="form-label">Cedula profesional a color lado #2</label>
                            <br>
                            <a target="_blank" class="btn btn-warning"
                                title="Descargar Cedula profesional a color lado #2"
                                href="{{ url(env('user') . '/catalogo/file/' . $data->cedula2) }}">
                                <i class="bi bi-download"></i>
                            </a>

                        </div>
                        <div class="col-md-4">
                            <label for="delegación" class="form-label">CV actualizado a color</label>
                            <br>
                            <a target="_blank" class="btn btn-warning" title="Descargar CV actualizado a color"
                                href="{{ url(env('user') . '/catalogo/file/' . $data->cv) }}">
                                <i class="bi bi-download"></i>
                            </a>

                        </div>
                        <div class="col-md-4">
                            <label for="delegación" class="form-label">Foto (INE) lado #1</label>
                            <br>
                            <a target="_blank" class="btn btn-warning"
                                title="Descargar Foto credencial de elector (INE) lado #1"
                                href="{{ url(env('user') . '/catalogo/file/' . $data->fotoCredencial) }}">
                                <i class="bi bi-download"></i>
                            </a>

                        </div>

                    </div>
                    <div class="row" style="margin-right:1px;margin-top:18px;">
                        <div class="col-md-4">
                            <label for="delegación" class="form-label">Foto credencial de elector (INE) lado #2</label>
                            <br>
                            <a target="_blank" class="btn btn-warning"
                                title="Descargar Foto credencial de elector (INE) lado #2"
                                href="{{ url(env('user') . '/catalogo/file/' . $data->fotoCredencial2) }}">
                                <i class="bi bi-download"></i>
                            </a>

                        </div>
                        <div class="col-md-4">
                            <label for="delegación" class="form-label">Descripción de casos de éxitos en su carrera profesional</label>
                            <br>
                            <a target="_blank" class="btn btn-warning" title="Descargar Descripción de casos de éxitos en su carrera profesional"
                                href="{{ url(env('user') . '/catalogo/file/' . $data->exitos) }}">
                                <i class="bi bi-download"></i>
                            </a>

                        </div>


                    </div>

                </div>

        </div>


        <!--end container-->
        </section>
    </div>
@endsection