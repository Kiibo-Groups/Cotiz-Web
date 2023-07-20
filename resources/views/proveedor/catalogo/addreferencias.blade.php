@extends('layouts.app_proveedor')
@if (Auth::guard()->check() || Auth::user()->status != 0)
    @section('title')
        Ver Servicios
    @endsection
    @section('page_active')
        Servicio agregar referencias
    @endsection


    @section('content')
        <form action="{{ route('catalogo_referencia_post') }}" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            @include('proveedor.catalogo.formref')
        </form>
    @endsection
@else
    @section('content')
        <div class="container relative -mt-16 z-1">
            <div class="grid grid-cols-1">
                <!-- Start -->
                <section class="relative">
                    <div class="container">
                        <div class="row">
                            <h2>Estimado proveedor debe esperar que el administrador apruebe su negocio para poder disfrutar
                                de nuestros servicios</h2>
                        </div>
                    </div>
                    <!--end container-->
                </section>
            </div>
        @endsection
@endif


@section('scripts')
    @parent
@endsection
