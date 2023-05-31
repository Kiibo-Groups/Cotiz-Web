@extends('layouts.app_profile')
@section('title')
    Proveedores
@endsection
@section('page_active')
    Listado de Proveedores
@endsection

<link href="{{ asset('assets2/libs/choices.js/public/assets/styles/choices.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets2/libs/@iconscout/unicons/css/line.css') }}" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('assets2/css/icons.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
@section('content')
    <!-- Start -->
    <section class="relative">
        <div class="container">
			<div class="row">
                <form action="{{ url(env('admin'). '/providers')}}" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="search" id="filter_search" @if ($search != null) value="{{ $search }}" @endif placeholder="Buscar una Provedor" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <select name="filter_status" id="filter_status" class="form-select">
                            <option value="" @if ($status == '') selected @endif>Estatus</option>
                            <option value="1" @if ($status == '1') selected @endif>Activo</option>
                            <option value="0" @if ($status == '0') selected @endif>Inactivo</option>
                        </select>
                        <button class="btn btn-outline-primary" type="submit" id="button-addon2">Buscar</button>
                    </div>
                </form>
            </div>
            <div class="row">
                @foreach ($providers as $provider)
				<div class="col-12 col-sm-4 p-3">
					<div class="card">
						<div class="card-img-box">
                            @if($provider->logo)
							<img src="{{ asset('assets/img/logos/'.$provider->logo) }}" class="card-img" alt="logo">
                            @else
                                <img class="card-img" src="{{ asset('profile/img/user_profile.jpg') }}" alt="logo" />
                            @endif
						</div>
						<div class="card-body row">
							<div class="col-12">
								<h5 class="card-title">{{ $provider->name }}</h5>
							</div>
							<div class="col-12 mb-2">
								<p class="card-text text-muted m-0">Direccion</p>
								<h5 class="card-title m-0 p-0">{{ $provider->address }}</h5>
							</div>
							<div class="col-12 mb-2">
								<p class="card-text text-muted m-0">Email</p>
								<h5 class="card-title m-0 p-0">{{ $provider->email }}</h5>
							</div>
							<div class="col-12 mb-2">
								<p class="card-text text-muted m-0">Pais</p>
								<h5 class="card-title m-0 p-0">{{ $provider->country }}</h5>
							</div>
                            <div class="col-12 mb-2">
								<p class="card-text text-muted m-0">Estado</p>
								@if ($provider->user->status === 0)
                                        <h5 class="card-title m-0 p-0"><span class="badge text-white bg-secondary">Inactivo</span></h5>
                                    @elseif ($provider->user->status === 1)
                                        <h5 class="card-title m-0 p-0"><span class="badge text-white bg-success">Activo</span></h5>
                                    @endif
							</div>
							<div class="col-6 mt-3">
								<a href="{{ url(env('admin').'/providers/edit/'.$provider->id) }}" class="btn btn-primary">Editar</a>
							</div>
							<div class="col-6 mt-3">
								<a href="{{ url(env('admin').'/providers/delete/'.$provider->id) }}" class="btn btn-danger">Eliminar</a>
							</div>
						</div>
					</div>
				</div>

                @endforeach
                @if(count($providers)<1)
                <div class="d-flex align-items-center flex-column py-6">

                    <div>
                        No hay registros
                    </div>
                    @if (!Auth::guard('admin')->check())
                    <div class="mt-3">
                        <a href="{{ url(env('user').'/providers/add') }}" class="btn btn-primary">Crear nuevo</a>
                    </div>
                    @else
                    <div class="mt-3">
                        <a href="{{ url(env('admin').'/providers/add') }}" class="btn btn-primary">Crear nuevo</a>
                    </div>
                    @endif
                </div>
                @endif
            </div>

            <div class="grid md:grid-cols-12 grid-cols-1 mt-8 text-center">
                <div class="md:col-span-12 text-center">
                    {{ $providers->links('pagination::semantic-ui') }}
                </div>
            </div>
            <!--end grid-->
        </div>
        <!--end container-->
    </section>
    <!--end section-->
@endsection
