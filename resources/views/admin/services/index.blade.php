@extends('layouts.app_profile')
@section('title') Servicios @endsection
@section('page_active') Listado de Servicios @endsection

<link href="{{ asset('assets2/libs/choices.js/public/assets/styles/choices.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets2/libs/@iconscout/unicons/css/line.css') }}" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('assets2/css/icons.css') }}" />

@section('content')
<div class="container relative -mt-16 z-1">
	<div class="grid grid-cols-1">
		<!-- Start -->
		<section class="relative">
			<div class="container">
				<div class="row">
					<form action="{{ url(env('admin'). '/services')}}" method="GET">
						<div class="input-group mb-3">
							<input type="text" class="form-control" name="search" @if ($search != null) value="{{ $search }}" @endif placeholder="Buscar una solicitud" aria-label="Recipient's username" aria-describedby="button-addon2">
							<button class="btn btn-outline-primary" type="submit" id="button-addon2">Buscar</button>
						</div>
					</form>
				</div>
				<div class="row">
					@foreach ($services as $service)
					<div class="col-12 col-sm-4 p-3">
						<div class="card">
							<div class="card-img-box">
								<img src="{{ asset('assets/img/logos/'.$service->logo) }}" class="card-img" alt="logo">
							</div>
							<div class="card-body row">
								<div class="col-12">
									<h5 class="card-title">{{ $service->provider->name }}</h5>
								</div>
								<div class="col-12 mb-2">
									<p class="card-text text-muted m-0">Titulo</p>
									<h5 class="card-title m-0 p-0">{{ $service->title }}</h5>
								</div>
								<div class="col-12 mb-2">
									<p class="card-text text-muted m-0">Descripcion</p>
									<h5 class="card-title m-0 p-0">{{ $service->description }}</h5>
								</div>
								<div class="col-12 mb-2">
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
								</div>
								@if (!Auth::guard('admin')->check())
								<div class="col-6 mt-3">
									<a href="{{ url(env('user').'/services/edit/'.$service->id) }}" class="btn btn-primary">Editar</a>
								</div>
								<div class="col-6 mt-3">
									<a href="{{ url(env('user').'/services/delete/'.$service->id) }}" class="btn btn-danger">Eliminar</a>
								</div>
								@else
								<div class="col-6 mt-3">
									<a href="{{ url(env('admin').'/services/edit/'.$service->id) }}" class="btn btn-primary">Editar</a>
								</div>
								<div class="col-6 mt-3">
									<a href="{{ url(env('admin').'/services/delete/'.$service->id) }}" class="btn btn-danger">Eliminar</a>
								</div>
								@endif
							</div>
						</div>
					</div>

					@endforeach
                    @if(count($services)<1)
                    <div class="d-flex align-items-center flex-column py-6">

                        <div>
                            No hay registros
                        </div>
                        @if (!Auth::guard('admin')->check())
                        <div class="mt-3">
                            <a href="{{ url(env('user').'/services/add') }}" class="btn btn-primary">Crear nuevo</a>
                        </div>
                        @else
                        <div class="mt-3">
                            <a href="{{ url(env('admin').'/services/add') }}" class="btn btn-primary">Crear nuevo</a>
                        </div>
                        @endif
                    </div>
                    @endif
				</div>

				<div class="grid md:grid-cols-12 grid-cols-1 mt-8 text-center">
					<div class="md:col-span-12 text-center">
						{{ $services->links('pagination::semantic-ui') }}
					</div>
				</div>
				<!--end grid-->
			</div>
			<!--end container-->
		</section>
</div>

@endsection

