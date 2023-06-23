@extends('layouts.app_profile')
@section('title') Banners @endsection
@section('page_active') Listado de Banners @endsection 


@section('content')
	<section class="section banners">
		<div class="row"> 
			<div class="col-12 text-align-right">
				<div class="card-body" style="justify-items: right;display: grid;">
					<a href="{{url(env('admin').'/banners/add')}}" class="btn btn-primary"> Agrega Banner</a>
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
										<th>Titulo</th>
										<th>SubTitulo</th>
										<th>Descripción</th>
										<th>Posición</th>
										<th>Status</th>
										<th>Acciones</th>
									</tr>
								</thead>

								<tbody>
									
									@foreach($data as $row)
									<tr>
										<td >
											<img src="<?php echo asset('public/profile/img/banner/'.$row->img) ?>" style="max-width: 150px;" alt="Banner Image" />
										</td>
										<td >{{$row->title}}</td>
										<td >{{$row->subtitle}}</td>
										<td >{{$row->descript}}</td>
										<td>
											@if($row->position == 0)
											Principal
											@elseif($row->position == 1)
											Intermedio
											@else 
											Final
											@endif
										</td>
										<td >
											@if($row->status == 0)
											Inactivo 
											@else 
											Activo
											@endif
										</td>
										<td >
											<div class="btn-group mb-1">
												 
												<button type="button" class="btn btn-outline-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
													<span class="sr-only">
														<i class="bi bi-menu-button-wide-fill"></i>
													</span>
												</button>

												<div class="dropdown-menu">
													<a class="dropdown-item" href="{{ url(env('admin').'/banners/edit/'.$row->id) }}">Editar</a>
													<a class="dropdown-item" href="{{ url(env('admin').'/banners/status/'.$row->id) }}">Activar/Desactivar</a>
													<a class="dropdown-item" href="{{ url(env('admin').'/banners/delete/'.$row->id) }}">Eliminar</a>
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