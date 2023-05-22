@extends('layouts.app_profile')
@section('title') Mentores @endsection
@section('page_active') Listado de Mentores @endsection 


@section('content')
	<section class="section mentors">
		<div class="row"> 
			<div class="col-12 text-align-right">
				<div class="card-body" style="justify-items: right;display: grid;">
					<a href="{{url(env('admin').'/mentors/add')}}" class="btn btn-primary"> Agrega Mentor</a>
				</div> 
			</div>

			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div class="table table-borderless">
							<table class="table">
								<thead>
									<tr>
										<th>Imagen</th>
										<th>Nombre</th> 
										<th>email</th>
										<th>Status</th>
										<th>Acciones</th>
									</tr>
								</thead>

								<tbody> 
									@foreach($data as $row)
									<tr>
										<td >
											<img src="<?php echo asset('public/assets/img/mentors/'.$row->img) ?>" style="max-width: 150px;" alt="mentors Image" />
										</td>
										<td >{{$row->nombre}}</td> 
										<td >{{$row->email}}</td>   
										<td>
											@if($row->status == 0)
											<span class="badge bg-danger">Inactivo</span> 
											@else 
											<span class="badge bg-success">Activo</span>
											@endif
										</td>
										<td>
											<div class="btn-group mb-1">
												 
												<button type="button" class="btn btn-outline-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
													<span class="sr-only">
														<i class="bi bi-menu-button-wide-fill"></i>
													</span>
												</button>

												<div class="dropdown-menu">
													<a class="dropdown-item" href="{{ url(env('admin').'/mentors/edit/'.$row->id) }}">Editar</a>
													<a class="dropdown-item" href="{{ url(env('admin').'/mentors/status/'.$row->id) }}">Activar/Desactivar</a>
													<a class="dropdown-item" href="{{ url(env('admin').'/mentors/delete/'.$row->id) }}">Eliminar</a>
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