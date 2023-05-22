@extends('layouts.app_profile')
@section('title') Usuarios @endsection
@section('page_active') Listado de Usuarios @endsection 


@section('content')
	<section class="section banners">
		<div class="row"> 
			<div class="col-12 text-align-right">
				<div class="card-body" style="justify-items: right;display: grid;">
					<a href="{{url(env('admin').'/users/add')}}" class="btn btn-primary"> Agrega Usuario</a>
				</div> 
			</div>

			<div class="col-12">
                <div class="card card-default">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Perfil</th>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Telefono</th> 
                                        <th>Nivel</th> 
                                        <th>Status</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    
                                    @foreach($data as $row)
                                    <tr>
                                        <td>
                                            <img class="tbl-thumb" src="{{ asset('profile/img/'.$row->pic_profile) }}" style="max-width: 50px;" alt="Banner Image" />
                                        </td>
                                        <td>{{$row->name}} {{$row->last_name}}</td>
                                        <td>{{$row->email}}</td>
                                        <td>{{$row->phone}}</td> 
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
                                        <td>
                                            @if($row->status == 1)
                                            <span style="color:red;">Inactivo</span> 
                                            @else 
                                            Activo
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
                                                    <a class="dropdown-item" href="{{ url(env('admin').'/users/edit/'.$row->id) }}">Editar</a>
                                                    <a class="dropdown-item" href="{{ url(env('admin').'/users/status/'.$row->id) }}">Activar/Desactivar</a>
                                                    <a class="dropdown-item" href="{{ url(env('admin').'/users/delete/'.$row->id) }}">Eliminar</a>
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