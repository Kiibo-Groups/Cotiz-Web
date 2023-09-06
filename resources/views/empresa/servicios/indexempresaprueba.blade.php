@extends('layouts.app_empresa')
@section('title')
    Solicitudes
@endsection
@section('page_active')
    Listado de Solicitudes
@endsection

<link href="{{ asset('assets2/libs/choices.js/public/assets/styles/choices.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets2/libs/@iconscout/unicons/css/line.css') }}" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('assets2/css/icons.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
@section('content')
    <!-- Start -->
    <section class="relative">
        <div class="container">
            <div class="row">

                @if (Auth::guard('admin')->check())
                    <form action="{{ url(env('admin') . '/prueba/solicitud') }}" method="GET">
                    @else
                        <form action="{{ url(env('user') . '/prueba/solicitud') }}" method="GET">
                @endif
                <div class="row ">
                    @include('alerts')
                    <div class="col-6 mb-3">
                        <label for="filter_from">Desde</label>
                        <input type="date" name="filter_from" class="form-control">
                    </div>
                    <div class="col-6 mb-3">
                        <label for="filter_even">Hasta</label>
                        <input type="date" name="filter_even" id="filter_even" class="form-control">
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="search" id="filter_search"
                        @if ($search != null) value="{{ $search }}" @endif
                        placeholder="Buscar una solicitud por Descripción" aria-label="Recipient's username"
                        aria-describedby="button-addon2">

                    <select name="filter_status" id="filter_status" class="form-select">
                        <option value="" selected>Estatus</option>
                        <option value="0">SOLICITANDO</option>
                        <option value="1">EN PROCESO COTIIZ</option>
                        <option value="5">CONTESTADA </option>
                        <option value="6">EXAMINANDO</option>
                        <option value="7">APROBADA</option>
                        <option value="8">RECHAZADA</option>



                    </select>

                    <button class="btn btn-outline-primary" type="submit" id="button-addon2">Buscar</button>
                </div>

                </form>
            </div>
            <div class="row">


                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Listado de Solicitudes de {{ $solicitud }}</h5>

                            <!-- Default Table -->
                            <div class="table table-responsive">
                                <table class="table table-responsive" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>

                                            <th scope="col">Tipo</th>
                                            <th scope="col">Fecha</th>
                                            <th scope="col">Descripción</th>
                                            <th scope="col">Status</th>
                                            @if (auth()->user()->status == 0)
                                                <th scope="col">Ocpiones</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($requests as $req)
                                            <tr>

                                                <td class="col-md-1">{{ $req->tipo }}</td>
                                                <td class="col-md-2">{{ $req->created_at->format('d-m-Y') }}</td>
                                                <td class="col-md-6"> {{ $req->description }}</td>
                                                <td class="col-md-1">
                                                    @if ($req->status === 0)
                                                        <h5 class="card-title m-0 p-0"><span
                                                                class="badge text-white bg-secondary">SOLICITANDO</span>
                                                        </h5>
                                                    @elseif ($req->status === 7)
                                                        <h5 class="card-title m-0 p-0"><span
                                                                class="badge text-white bg-success">APROBADA</span></h5>
                                                    @elseif ($req->status === 8)
                                                        <h5 class="card-title m-0 p-0"><span
                                                                class="badge text-white bg-danger">RECHAZADA</span></h5>
                                                    @elseif ($req->status === 5)
                                                        <h5 class="card-title m-0 p-0"><span
                                                                class="badge text-white bg-dark">CONTESTADA</span></h5>
                                                    @elseif ($req->status === 6)
                                                        <h5 class="card-title m-0 p-0"><span
                                                                class="badge text-white bg-primary">EXAMINANDO</span></h5>
                                                    @elseif ($req->status === 1)
                                                        <h5 class="card-title m-0 p-0"><span
                                                                class="badge text-white bg-info">EN
                                                                PROCESO COTIIZ</span>
                                                        </h5>
                                                    @endif
                                                </td>
                                                @if (auth()->user()->status == 0)
                                                    <td class="col-md-2">
                                                        <a class="btn btn-info btn-sm" title="Documentos Relacionados"
                                                            href="{{ url(env('user') . '/prueba/servicios/ver/' . $req->id) }}">
                                                            <i class="bi bi-book"></i>
                                                        </a>
                                                        @if (!is_null($req->document))
                                                            <a target="_blank" class="btn btn-warning btn-sm"
                                                                title="Descargar Documento"
                                                                href="/public/assets/documento/buzonempresa/{{ $req->document }}">
                                                                <i class="bi bi-download"></i>
                                                            </a>
                                                        @endif

                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- End Default Table Example -->
                        </div>
                    </div>
                </div>

                @if (auth()->user()->status == 1)
                    <div class="d-flex align-items-center flex-column py-6">
                        <div>
                            <p style="color: red; font-size: 38px"> Tus Datos están siendo revisados por Cotiiz estás pendiente de aprobación...</p>
                        </div>
                    </div>
                @endif

                @if (count($requests) < 1)
                    <div class="d-flex align-items-center flex-column py-6">
                        <div>
                            No hay solocitudes...
                        </div>
                    </div>
                @endif
            </div>

            <div class="grid md:grid-cols-12 grid-cols-1 mt-8 text-center">
                <div class="md:col-span-12 text-center">
                    {{ $requests->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
            <!--end grid-->
        </div>
        <!--end container-->
    </section>
    <!--end section-->

    @if ($requests)
        @foreach ($requests as $req)
            <!-- Modal Edit Element -->
            <div class="modal fade" id="editRequest" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Modificar
                                solicitud</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        @if (!Auth::guard('admin')->check())
                            <form action="{{ url(env('user') . '/request/edit/' . $req->id) }}" method="POST">
                            @else
                                <form action="{{ url(env('admin') . '/request/edit/' . $req->id) }}" method="POST">
                        @endif


                        @csrf
                        <div class="modal-body">
                            <label for="status">Estado</label>
                            <select name="status" id="status" class="form-select">
                                <option value="0" selected>Pendiente</option>
                                <option value="1">Aprobado</option>
                                <option value="5">Pagado <small>(Se aplicara el cashback previsto)</small> </option>
                                <option value="2">Rechazado</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Aceptar</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <!-- Modal Edit Element -->
        @endforeach
    @endif
    <script>
        const asignarParametrosURL = () => {
            const urlParams = new URLSearchParams(window.location.search);

            const searchParam = urlParams.get('search');
            const filterStatusParam = urlParams.get('filter_status');

            if (searchParam || filterStatusParam) {
                const filterStatusSelect = document.getElementById('filter_status');
                const filterSearch = document.getElementById('filter_search');

                if (searchParam) {
                    filterSearch.value = searchParam;
                }

                if (filterStatusParam) {
                    filterStatusSelect.value = filterStatusParam;
                }
            }
        };
        window.onload = () => {
            asignarParametrosURL();
        };
    </script>
@endsection
