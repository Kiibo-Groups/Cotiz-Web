@extends('layouts.app_profile')
@section('title') Sub Administración @endsection
@section('page_active') Listado de Usuarios @endsection


@section('content')
	<section class="section banners">
		<div class="row">
			<div class="col-12 text-align-right">
				<div class="card-body" style="justify-items: right;display: grid;">
					<a href="{{url(env('admin').'/subAccounts/add')}}" class="btn btn-primary"> Agrega Administador</a>
				</div>
			</div>
            @if(count($accounts)>0)
			<div class="col-12">
                <div class="card card-default">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="row">UserName</th>
                                        <th scope="row">Tipo</th>
                                        <th scope="row">Email</th>
                                        <th scope="row">Permisos</th>
                                        <th scope="row">Status</th>
                                        <th scope="row">Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($accounts as $row)
                                    <tr>
                                        <td>{{$row->username}}</td>
                                        <td>
                                            @if($row->id === 1)
                                            <span class="badge text-white bg-success">
                                               Principal
                                             </span>
                                            @else
                                            <span class="badge text-white bg-info">
                                                Secundaria
                                             </span>
                                            @endif
                                        </td>
                                        <td>{{$row->email}}</td>
                                        <td>
                                            @if($row->id === 1)
                                            Todos los permisos
                                            @else
                                            <?php
                                                $perms = explode(',',$row->perm);
                                                foreach ($perms as $key) {
                                                ?>
                                                    <small>
                                                        <span class="badge text-white bg-success">
                                                            {{ $key }}
                                                        </span>&nbsp;
                                                    </small>
                                                <?php
                                                }
                                            ?>
                                            @endif
                                        </td>
                                        <td>
                                            @switch($row->status)
                                                @case(1)
                                                <span class="badge text-white bg-success">
                                                    Cuenta Activa
                                                </span>
                                                @break
                                                @case(0)
                                                <span class="badge text-white bg-danger">
                                                    Inactivo
                                                </span>
                                                @break
                                            @endswitch
                                        </td>
                                        <td class="col-md-1">
                                            @if($row->id != 1)
                                            <a class="btn btn-success btn-sm" href="{{ url(env('admin').'/subAccounts/edit/'.$row->id) }}">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <a class="btn btn-warning btn-sm" href="{{ url(env('admin').'/subAccounts/status/'.$row->id) }}">
                                                <i class="bi bi-file-lock"></i>
                                            </a>
                                           {{-- <aclass="btnbtn-danger"href="url(env('admin').'/subAccounts/delete/'.$row->id)}}">
                                                <i class="bi bi-trash"></i>
                                            </a>--}}
                                            @endif
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
