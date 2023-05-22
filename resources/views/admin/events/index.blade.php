@extends('layouts.app_profile')
@section('title') Eventos @endsection
@section('page_active') Listado de Eventos @endsection 


@section('content')
	<section class="section events">
		<div class="row"> 
			<div class="col-12 text-align-right">
				<div class="card-body" style="justify-items: right;display: grid;">
					<a href="{{url(env('admin').'/events/add')}}" class="btn btn-primary"> Agrega Evento</a>
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
										<th>Fecha</th>
										<th>Hora</th>
										<th>Nivel</th>
										<th>Código</th>
										<th>Confirmaciones</th>
										<th>Status</th>
										<th>Acciones</th>
									</tr>
								</thead>

								<tbody> 
									@foreach($data as $row)
									<tr>
										<td >
											<img src="<?php echo asset('public/assets/img/photos/'.$row->img) ?>" style="max-width: 150px;" alt="Banner Image" />
										</td>
										<td >{{$row->titulo}}</td> 
										<td >{{$row->fecha}}</td>  
										<td >{{$row->hora}}</td> 
										<td> 
                                            @switch($row->level)
                                                @case(0)
                                                Cuenta Gratis
                                                @break
                                                @case(1)
                                                Light
                                                @break
                                                @case(2)
                                                Thermal
                                                @break
                                                @case(3)
                                                Chemical
                                                @break
                                                @case(4)
                                                Motion
                                                @break
                                                @case(5) 
                                                Nuclear
                                                    @break
                                                @default
                                            @endswitch
                                        </td> 
										<td>{{ $row->code }}</td>
										<td >{{$row->events_confirms_count}}</td> 
										<td >
											@if($row->status == 0)
											<span class="badge bg-red rounded-pill">Inactivo</span> 
											@else 
											<span class="badge bg-primary rounded-pill">Activo</span>
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
													<a class="dropdown-item" href="{{ url(env('admin').'/events/edit/'.$row->id) }}">Editar</a>
													<a class="dropdown-item" href="{{ url(env('admin').'/events/status/'.$row->id) }}">Activar/Desactivar</a>
													<a class="dropdown-item" href="{{ url(env('admin').'/events/delete/'.$row->id) }}">Eliminar</a>
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