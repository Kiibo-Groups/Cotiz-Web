@extends('layouts.app_empresa')
@section('title')
    Ver Solicitudes
@endsection
@section('page_active')
    Listado de Documentos
@endsection


@section('content')

    <section class="section banners">
        <div class="row">


            @if (count($servicios) > 0)
                <div class="col-12">
                    @include('alerts')
                    <div class="card card-default">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr style="text-align: center">
                                            <th scope="row">Usuario</th>
                                            <th scope="row">Descripción</th>
                                            <th scope="row">Fecha</th>
                                            <th scope="row">Acciones</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($servicios as $row)
                                            <tr>
                                                <td>
                                                    @if ($row->origen == 'admin')
                                                    {{ $row->admin->name }}
                                                    @else
                                                        {{ $row->user->name }} {{ $row->user->last_name }}
                                                    @endif

                                                </td>
                                                <td>{{ $row->descripcion }}</td>
                                                <td style="text-align: center">{{ $row->created_at->format('d-m-Y') }}</td>
                                                <td style="text-align: center">
                                                    <a target="_blank" class="btn btn-warning" title="Descargar Documento"
                                                        href="/public/assets/documento/servicios/{{ $row->documento }}">
                                                        <i class="bi bi-download"></i>
                                                    </a>
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
