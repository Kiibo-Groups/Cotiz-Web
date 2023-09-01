@extends('layouts.app')
@section('content')
    <section class=" bg-image bg-no-repeat bg-center bg-overlay bg-overlay-black-600 text-white py-md-16 "
        data-image-src="{{ asset('assets2/images/bg-login.jpg') }}"
        style="height:100vh; background-repeat: no-repeat;background-size: cover;">
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black"></div>
        <div class="container">
            <div class="row">
                <div class=" col-lg-8 col-xl-8 col-xxl-8 mx-auto">
                    <div class="card">
                        <div class="card-body p-11 text-center">
                            <h2>Regístrese en Cotiz</h2>
                            <p class="lead mb-6" style="color:black;">El registro toma menos de un minuto.</p>
                            <div id="divempresa" class="row form-floating mb-4">
                                <div id="" class="col-6" style="float: right">
                                    <a href="{{ route('register_get') }}" >
                                        <button type="submit" class="btn btn-info rounded-pill btn-login w-100 mb-2">
                                            Empresas
                                        </button>
                                    </a>
                                </div>
                                <div class="col-6"style="float: right">
                                    <a href="{{ route('registerprove_get') }}" >
                                        <button type="submit" class="btn btn-info rounded-pill btn-login w-100 mb-2">
                                            Proveedores
                                        </button>
                                    </a>
                                </div>
                            </div>
                            <p class="mb-0" style="color:black;">Ya tienes una cuenta? <a href="{{ route('login') }}"
                                    class="hover">Ingresar</a></p>
                        </div>
                        <!--/.card-body -->
                    </div>
                    <!--/.card -->
                </div>
                <!-- /column -->
            </div>
        </div>
    </section>
    <!-- /section -->

    <section class="wrapper bg-light">

    </section>
    <!-- /section -->
@endsection
