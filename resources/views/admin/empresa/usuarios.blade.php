@extends('layouts.app_profile')
@section('title')
    Empresas- Usuarios
@endsection
@section('page_active')
    Listado Empresa - Usuarios de {{ $empresa }}
@endsection


@section('content')
    <section class="section banners">
        <div class="row">
            {{--		<div class="col-12 text-align-right">
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
                                          {{-- <th>Perfil</th> --}}
                                            <th>Nombre</th>
                                            <th>Email</th>
                                            <th>Telefono</th>
                                            {{-- <th>Nivel</th> --}}
                                            <th>Status</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @foreach ($data as $row)
                                            <tr>
                                                <td>
                                                    @if ($row->pic_profile)
                                                        <img class="tbl-thumb"
                                                            src="{{ asset('assets/img/logos/' . $row->pic_profile) }}"
                                                            style="max-width: 50px;" alt="Banner Image" />
                                                    @else
                                                        <img class="tbl-thumb"
                                                            src="{{ asset('profile/img/user_profile.jpg') }}"
                                                            style="max-width: 50px;" alt="Banner Image" />
                                                    @endif

                                                </td>
                                                <td>{{ $row->name }} {{ $row->last_name }}</td>
                                                <td>{{ $row->email }}</td>
                                                <td>{{ $row->phone }}</td>

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
                                                            {{-- <aclass="dropdown-item"href="url(env('admin').'/users/edit/'.$row->id) }}">Editar</a> --}}
                                                            <a class="dropdown-item"
                                                                href="{{ url(env('admin') . '/users/status/' . $row->id) }}">Activar/Desactivar</a>

                                                            <a href="javascript::void()" class="dropdown-item"
                                                                onclick="deleteConfirm('{{ url(env('admin') . '/users/delete/' . $row->id) }}')">
                                                                Eliminar
                                                            </a>
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
