@extends('layouts.app_profile')
@if (Auth::guard('admin')->check() || Auth::user()->status != 0)
    @section('title')
        Servicios
    @endsection
    @section('page_active')
        Listado de Servicios
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
                            @if (!Auth::guard('admin')->check())
                                <form action="{{ url(env('user') . '/services') }}" method="GET">
                                @else
                                    <form action="{{ url(env('admin') . '/services') }}" method="GET">
                            @endif
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="search" id="filter_search"
                                    @if ($search != null) value="{{ $search }}" @endif
                                    placeholder="Buscar un Servicio" aria-label="Recipient's username"
                                    aria-describedby="button-addon2">
                                <select name="filter_status" id="filter_status" class="form-select">
                                    <option value="" @if ($status == '') selected @endif>Estatus
                                    </option>
                                    <option value="1" @if ($status == '1') selected @endif>Activo</option>
                                    <option value="0" @if ($status == '0') selected @endif>Inactivo
                                    </option>
                                </select>
                                <button class="btn btn-outline-primary" type="submit" id="button-addon2">Buscar</button>
                            </div>
                            </form>
                        </div>

                        <div class="row">
                            @foreach ($services as $service)
                                <div class="col-12 col-sm-4 p-3">
                                    <div class="card">
                                        <div class="card-img-box">
                                            <div
                                                style="background-image:url('{{ asset('assets/img/logos/' . $service->logo) }}');background-size: cover;width: 100%;height: 210px;background-position: center center;">
                                            </div>
                                        </div>
                                        <div class="card-body row">
                                            <div class="col-12">
                                                <h5 class="card-title">
                                                    @if ($services !== null)

                                                    @endif


                                                    @php
                                                        ($service->provider == NULL) ? 1 : {{ $service->provider->nombre }}
                                                    @endphp
                                                </h5>
                                                @if ($service->status === 0)
                                                    <span class="badge text-white bg-secondary"
                                                        style="float: right;top: -40px;position: relative;">Inactivo</span>
                                                @else
                                                    <span class="badge text-white bg-success"
                                                        style="float: right;top: -40px;position: relative;">Activo</span>
                                                @endif
                                            </div>
                                            <div class="col-12 mb-2">
                                                {{-- <pclass="card-texttext-mutedm-0">Titulo</p> --}}
                                                <h5 class="card-title m-0 p-0">{{ $service->title }}</h5>
                                            </div>
                                            {{--    <div class="col-12 mb-2">
                                            <p class="card-text text-muted m-0">Tipo</p>
                                            <h5 class="card-title m-0 p-0">
                                                @if ($service->type === 'service')
                                                    Servicio
                                                @elseif ($service->type === 'product')
                                                    Producto
                                                @else
                                                    Personal
                                                @endif
                                            </h5>
                                        </div> --}}
                                            <div class="col-12 mb-2">
                                                <p class="card-text text-muted m-0">Costo</p>
                                                <h5 class="card-title m-0 p-0">
                                                    <span class="badge text-white bg-success">$
                                                        {{ number_format($service->price, 2) }}</span>
                                                </h5>
                                            </div>

                                            @if (!Auth::guard('admin')->check())
                                                <div class="col-6 mt-3">
                                                    <a href="{{ url(env('user') . '/services/edit/' . $service->id) }}"
                                                        class="btn btn-primary">Editar</a>
                                                </div>
                                                <div class="col-6 mt-3">
                                                    <a href="{{ url(env('user') . '/services/delete/' . $service->id) }}"
                                                        class="btn btn-danger">Eliminar</a>
                                                </div>
                                            @else
                                                <div class="col-4 mt-3">
                                                    <a href="{{ url(env('admin') . '/services/edit/' . $service->id) }}"
                                                        class="btn btn-primary">Editar</a>
                                                </div>
                                                <div class="col-4 mt-3">
                                                    <a href="{{ url(env('admin') . '/services/delete/' . $service->id) }}"
                                                        class="btn btn-danger">Eliminar</a>
                                                </div>
                                                <div class="col-4 mt-3">
                                                    <a href="{{ url(env('admin') . '/catalogo/enviar/' . $service->id) }}"
                                                        class="btn btn-success">Enviar</a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @if (count($services) < 1)
                                <div class="d-flex align-items-center flex-column py-6">

                                    <div>
                                        No hay registros
                                    </div>
                                    {{--  @if (!Auth::guard('admin')->check())
                                    <div class="mt-3">
                                        <a href="{{ url(env('user') . '/services/add') }}" class="btn btn-primary">Crear
                                            nuevo</a>
                                    </div>
                                @else
                                    <div class="mt-3">
                                        <a href="{{ url(env('admin') . '/services/add') }}" class="btn btn-primary">Crear
                                            nuevo</a>
                                    </div>
                                @endif --}}
                                </div>
                            @endif
                        </div>

                        <div class="mt-8 text-center">
                            <div class="md:col-span-12 text-center">
                                {{ $services->links('vendor.pagination.bootstrap-4') }}
                            </div>
                        </div>
                        <!--end grid-->

                    </div>
                    <!--end container-->
                </section>
            </div>
        @endsection
    @else
        @section('content')
            <div class="container relative -mt-16 z-1">
                <div class="grid grid-cols-1">
                    <!-- Start -->
                    <section class="relative">
                        <div class="container">
                            <div class="row">
                                <h2>Estimado proveedor debe esperar que el administrador apruebe su negocio para poder
                                    disfrutar de nuestros servicios</h2>
                            </div>
                        </div>
                        <!--end container-->
                    </section>
                </div>
            @endsection
@endif
