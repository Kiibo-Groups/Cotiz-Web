@extends('layouts.app_profile')
@if (Auth::guard('admin')->check() || Auth::user()->status != 0)
@section('title') Servicios @endsection
@section('page_active') Nuevo Servicio @endsection


@section('content')
    @if (!Auth::guard('admin')->check())
    <form action="{{ route('services_create_post') }}" method="POST" enctype="multipart/form-data">
    @else
    {!! Form::model($data, ['url' => ['admin/services'],'files' => true]) !!}
    @endif
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @include('admin.services.form')
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
                        <h2>Estimado proveedor debe esperar que el administrador apruebe su negocio para poder disfrutar de nuestros servicios</h2>
                    </div>
                </div>
                <!--end container-->
            </section>
        </div>

@endsection
@endif
