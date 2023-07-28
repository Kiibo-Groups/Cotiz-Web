@extends('layouts.app_profile')
@section('title')
    Ver Solicitudes
@endsection
@section('page_active')
    Listado de Documentos
@endsection


@section('content')

    <section class="section banners">
        <div class="row">
            <div class="col-12 text-align-right">
                <div class="card-body" style="justify-items: right;display: grid;">
                    <a href="{{ url(env('admin') . '/servicios/add/' . $id) }}" class="btn btn-primary"> Agregar Documento</a>
                </div>
            </div>

            @if ($request->tipo == 'service')
                <div class="container">
                    <hr />
                    <div class="row">
                        <div class="col-sm">
                            <b>Servicio :</b>
                            <p>{{ $request->nombre }}</p>
                        </div>
                        <div class="col-sm">

                            <b>Descripción :</b>
                            <p>{{ $request->modelo }}</p>
                        </div>
                        <div class="col-sm">

                            <b>Presupuesto :</b>
                            <p>$ {{ number_format($request->presupuesto, 1) }}</p>
                        </div>
                        @if ($request->link)
                            <div class="col-sm">
                                <b>Link Drive :</b>
                                <a target="_blank" href="{{ $request->link }}" class="btn btn-info" title="Ir a Drive"> url</a>
                            </div>
                        @endif


                    </div>
                    <hr />
                </div>
            @endif

            @if ($request->tipo == 'product')
                <div class="container">
                    <hr />
                    <div class="row">
                        <div class="col-sm">
                            <b>Nombre :</b>
                            <p style="margin-left: 10px">{{ $request->nombre }}</p>
                        </div>
                        <div class="col-sm">

                            <b>Modelo :</b>
                            <p style="margin-left: 10px">{{ $request->modelo }}</p>
                        </div>
                        <div class="col-sm">

                            <b>Presupuesto :</b>
                            <p style="margin-left: 10px">$ {{ number_format($request->presupuesto, 1) }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm">
                            <b>Marca :</b>
                            <p style="margin-left: 10px">{{ $request->marca }}</p>
                        </div>
                        <div class="col-sm">

                            <b>Cantidad :</b>
                            <p style="margin-left: 10px">{{ $request->cantidad }}</p>
                        </div>
                        @if ($request->link)
                            <div class="col-sm">
                                <b>Link Drive :</b>
                                <a target="_blank" href="{{ $request->link }}" class="btn btn-info" title="Ir a Drive"> url</a>
                            </div>
                        @endif

                    </div>
                    <hr />

                </div>
            @endif


            @if ($request->tipo == 'employe')
                <div class="container">
                    <hr />
                    <div class="row">
                        <div class="col-sm">
                            <b>Trabajo a realizar :</b>
                            <p style="margin-left: 10px">{{ $request->nombre }}</p>
                        </div>
                        <div class="col-sm">

                            <b>Tiempo para implementar :</b>
                            <p style="margin-left: 10px">{{ $request->presupuesto }}</p>
                        </div>

                        <div class="col-sm">

                            <b>Conocimientos :</b>
                            <p style="margin-left: 10px">{{ $request->marca }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <b>Certificaciones :</b>
                            <p style="margin-left: 10px">{{ $request->cantidad }}</p>
                        </div>
                        <div class="col-sm">

                            <b>Detalles del trabajo :</b>
                            <p style="margin-left: 10px">{{ $request->modelo }}</p>
                        </div>

                        @if ($request->link)
                            <div class="col-sm">
                                <b>Link Drive :</b>
                                <a target="_blank" href="{{ $request->link }}" class="btn btn-info" title="Ir a Drive"> url</a>
                            </div>
                        @endif


                    </div>
                    <hr />
                </div>
            @endif

        </div>

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
                                                    href="/assets/documento/servicios/{{ $row->documento }}">
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
                    <hr />
                    No hay registros
                    <hr />
                </div>

            </div>
        @endif
        </div>
    </section>
@endsection
