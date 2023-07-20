@extends('layouts.app_profile')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
                    <form action="{{ url(env('admin') . '/requests') }}" method="GET">
                    @else
                        <form action="{{ url(env('user') . '/requests') }}" method="GET">
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
                        placeholder="Buscar una solicitud por usuario" aria-label="Recipient's username"
                        aria-describedby="button-addon2">
                    @if (Auth::user() && Auth::user()->role != 1)
                        <select name="filter_status" id="filter_status" class="form-select">
                            <option value="" selected>Estatus</option>
                            <option value="0" @if ($status == 0) selected @endif>Pendiente</option>
                            <option value="1" @if ($status == 1) selected @endif>Aprobado</option>
                            <option value="2" @if ($status == 2) selected @endif>Rechazado</option>
                        </select>
                    @endif
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
                            <table class="table">
                                <thead>
                                    <tr>

                                        <th scope="col">Tipo</th>
                                        <th scope="col">Servicio</th>
                                        <th scope="col">Usuario</th>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($requests as $req)
                                        <tr>

                                            <td class="col-md-1">{{ $req->tipo }}</td>
                                            <td class="col-md-1">{{ $req->servicio }}</td>
                                            <td class="col-md-2">
                                                @if ($req->solicitud == 2)
                                                    {{ $req->prueba->name }} {{ $req->prueba->last_name }}
                                                @else
                                                    {{ $req->prove->nombre }}
                                                @endif

                                            </td>
                                            <td>{{ $req->description }}</td>
                                            <td class="col-md-1">
                                                @if ($req->status === 0)
                                                    <h5 class="card-title m-0 p-0"><span
                                                            class="badge text-white bg-secondary">Pendiente</span></h5>
                                                @elseif ($req->status === 1)
                                                    <h5 class="card-title m-0 p-0"><span
                                                            class="badge text-white bg-success">Aprobado</span></h5>
                                                @elseif ($req->status === 2)
                                                    <h5 class="card-title m-0 p-0"><span
                                                            class="badge text-white bg-danger">Rechazado</span></h5>
                                                @elseif ($req->status === 5)
                                                    <h5 class="card-title m-0 p-0"><span
                                                            class="badge text-white bg-success">Finalizado</span></h5>
                                                @endif
                                            </td>
                                            <td class="col-md-2">
                                                <a class="btn btn-info btn-sm" title="Documentos Relacionados"
                                                    href="{{ url(env('admin') . '/servicios/ver/' . $req->id) }}">
                                                    <i class="bi bi-book"></i>
                                                </a>
                                                @if (!is_null($req->document))
                                                    <a target="_blank" class="btn btn-warning btn-sm"
                                                        title="Descargar Documento"
                                                        href="/assets/documento/buzonempresa/{{ $req->document }}">
                                                        <i class="bi bi-download"></i>
                                                    </a>
                                                @endif
                                                {{--  @if (Auth::guard('admin')->check() || Auth::user()->role == 2)  --}}
                                                @if (Auth::guard('admin')->check())
                                                    <a type="button" class=" open-modal btn btn-success btn-sm"
                                                        title="Editar Estado" data-nombre="{{ $req->id }}">
                                                        <i class="bi bi-pencil"></i>
                                                    </a>

                                                    @if (!Auth::guard('admin')->check())
                                                        <a class="btn btn-danger btn-sm"
                                                            href="{{ url(env('user') . '/request/delete/' . $req->id) }}">
                                                            <i class="bi bi-trash"></i>
                                                        </a>
                                                    @else
                                                        {{-- <a class="btn btn-danger btn-sm"
                                                            href="{{ url(env('admin') . '/request/delete/' . $req->id) }}">
                                                            <i class="bi bi-trash"></i>
                                                        </a> --}}
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Default Table Example -->
                        </div>
                    </div>
                </div>



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


    <!-- Modal Edit Element -->
    <div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modificar
                        solicitud</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                @if (!Auth::guard('admin')->check())
                    <form action="{{ url(env('user') . '/request/edit/' . $req->id) }}" method="POST">
                    @else
                        <form action="{{ url(env('admin') . '/request/edit/' . $req->id) }}" method="POST">
                @endif


                @csrf
                <input id="id" name="id" type="hidden"  />
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('.open-modal').click(function() {

            var id = $(this).data('nombre');
            console.log(id);
           $('#id').val(id);
           $(".modal").modal("show");
        });

        $('.close').click(function() {
            $(".modal").modal("hide");
        });
    });
</script>
