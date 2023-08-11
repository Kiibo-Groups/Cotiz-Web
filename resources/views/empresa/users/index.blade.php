@extends('layouts.app_empresa')
@section('title')
    Usuarios Empresa
@endsection
@section('page_active')
    Listado de Usuarios Empresa
@endsection


@section('content')
    <section class="section banners">
        <div class="row">
            {{-- <div class="col-12 text-align-right">
				<div class="card-body" style="justify-items: right;display: grid;">
					<a href="{{url(env('admin').'/users/add')}}" class="btn btn-primary"> Agrega Usuario</a>
				</div>
			</div> --}}
            @if (count($data) > 0)
                <div class="col-12">
                    @include('alerts')
                    <div class="card card-default">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Perfil1</th>
                                            <th>Nombre</th>
                                            <th>Email</th>
                                            <th>Telefono</th>

                                            <th>Ingresos</th>
                                            <th>Status</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @foreach ($data as $row)
                                            <tr>
                                                <td>
                                                    @if ($row->role == 1)
                                                        Usuario
                                                    @else
                                                        <span style="color:green;">Principal</span>
                                                    @endif
                                                </td>
                                                <td>{{ $row->name }} {{ $row->last_name }}</td>
                                                <td>{{ $row->email }}</td>
                                                <td>{{ $row->phone }}</td>

                                                <td style="text-align: center">{{ $row->ingresos }}</td>
                                                <td>
                                                    @if ($row->status == 1)
                                                        <span style="color:red;">Inactivo</span>
                                                    @else
                                                        Activo
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="btn-group mb-1">
                                                        <button type="button"
                                                            class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false" data-display="static">
                                                            <span class="sr-only">
                                                                <i class="bi bi-menu-button-wide-fill"></i>
                                                            </span>
                                                        </button>

                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item"
                                                                href="{{ url(env('user') . '/empresa/users/ver/' . $row->id) }}">Ver</a>
                                                            {{-- <aclass="dropdown-item"href="url(env('admin').'/users/status/'.$row->id) }}">Activar/Desactivar</a>
                                                    <a class="dropdown-item" href="{{ url(env('admin').'/users/delete/'.$row->id) }}">Eliminar</a> --}}
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
            @else
                <div class="d-flex align-items-center flex-column py-6">
                    <div>
                        No hay registros
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
