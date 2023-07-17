@extends('layouts.app_proveedor')
@if (Auth::guard()->check() || Auth::user()->status != 0)
    @section('title')
        Servicios
    @endsection
    @section('page_active')
        Nuevo Servicio
    @endsection


    @section('content')
        <form action="{{ route('catalogo_create_post') }}" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            @include('proveedor.catalogo.form')
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
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

@section('scripts')
    @parent

@endsection
