@extends('layouts.app_profile')
@section('title') Proveedores @endsection
@section('page_active') Listado de Proveedores @endsection 


@section('content')
	<section class="section providers">
		<div class="row"> 
			<div class="col-12 text-right">
				<div class="card-body">
					<a href="{{url(env('admin').'/providers/add')}}"class="btn btn-primary btn-icon btn-icon-start rounded"> Agrega un Proveedor</a>
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
										<th>Nombre</th>
										<th>Direccion</th>
										<th>Correo</th>
										<th>Telefono</th>
										<th>Pais</th>
									</tr>
								</thead>

								<tbody>
									
									@foreach($providers as $provider)
									<tr>
										<td >
											<img src="<?php echo asset('assets/img/logos/'.$provider->logo) ?>" style="max-width: 150px;" alt="Provider Image" />
										</td>
										<td >{{ $provider->name }}</td>
										<td >{{ $provider->address}}</td>
										<td >{{ $provider->email}}</td>
										<td >{{ $provider->phone}}</td>
										<td >{{ $provider->country}}</td>
										<td>
											<div class="btn-group mb-1">
												<button type="button" class="btn btn-outline-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
													<span class="sr-only">
														<i class="bi bi-menu-button-wide-fill"></i>
													</span>
												</button>

												<div class="dropdown-menu">
													<a class="dropdown-item" href="{{ url(env('admin').'/providers/edit/'.$provider->id) }}">Editar</a>
													<a class="dropdown-item" href="{{ url(env('admin').'/providers/delete/'.$provider->id) }}">Eliminar</a>
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

 