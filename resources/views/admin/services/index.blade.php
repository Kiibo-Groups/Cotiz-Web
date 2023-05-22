@extends('layouts.app_profile')
@section('title') Servicios @endsection
@section('page_active') Listado de Servicios @endsection 


@section('content')
	<section class="section services">
		<div class="row"> 
			<div class="col-12 text-right">
				<div class="card-body">
					<a href="{{url(env('admin').'/services/add')}}"class="btn btn-primary btn-icon btn-icon-start rounded"> Agregar Servicio</a>
				</div> 
			</div>

			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div class="table table-borderless">
							<table class="table">
								<thead>
									<tr>
										<th>Logo</th>
										<th>Proveedor</th>
										<th>Tipo</th>
										<th>Titulo</th>
										<th>Description</th>
										<th>Fecha de Creacion</th>
									</tr>
								</thead>

								<tbody>
									
									@foreach($services as $service)
									<tr>
										<td >
											<img src="<?php echo asset('assets/img/logos/'.$service->logo) ?>" style="max-width: 150px;" alt="services Image" />
										</td>
										<td >{{ $service->provider->name}}</td>
										<td >{{$service->type}}</td>
										<td >{{$service->title}}</td>
										<td >{{$service->description}}</td>
										<td >{{$service->created_at}}</td>
										<td>
											<div class="btn-group mb-1">
												<button type="button" class="btn btn-outline-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
													<span class="sr-only">
														<i class="bi bi-menu-button-wide-fill"></i>
													</span>
												</button>

												<div class="dropdown-menu">
													<a class="dropdown-item" href="{{ url(env('admin').'/services/edit/'.$service->id) }}">Editar</a>
													<a class="dropdown-item" href="{{ url(env('admin').'/services/delete/'.$service->id) }}">Eliminar</a>
												</div>
											</div>
										</td>
									</tr>
									@endforeach
								</tbody> 
							</table>
						</div>
					</div>
				</div>
			</div> 
		</div>
	</section>
@endsection

 