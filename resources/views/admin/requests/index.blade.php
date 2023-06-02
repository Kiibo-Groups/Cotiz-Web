@extends('layouts.app_profile')
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
                <form action="{{ url(env('admin'). '/request')}}" method="GET">
                @else
                <form action="{{ url(env('user'). '/request')}}" method="GET">
                @endif
                    <div class="row">
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
                        <input type="text" class="form-control" name="search" id="filter_search" @if ($search != null) value="{{ $search }}" @endif placeholder="Buscar una solicitud" aria-label="Recipient's username" aria-describedby="button-addon2">
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
                @foreach ($requests as $request)
                    <div class="col-12 col-sm-4 p-3">
                        <div class="card p-3">
                            <div class="card-body row">
                                @if (Auth::guard('admin')->check() || Auth::user()->role == 2)
                                    <div class="col-12 p-0">
                                        <p class="card-text text-muted m-0">Usuario</p>
                                        <h5 class="card-title m-0 p-0">{{ $request->user->name }}</h5>
                                    </div>
                                @endif
                                <div class="col-12 p-0">
                                    <p class="card-text text-muted m-0">Servicio</p>
                                    <h5 class="card-title m-0 p-0">{{ $request->service->title }}</h5>
                                </div>
                                <div class="col-12 p-0 mb-2">
                                    <p class="card-text text-muted m-0">Descripcion</p>
                                    <h5 class="card-title m-0 p-0">{{ $request->description }}</h5>
                                </div>
                                <div class="col-9 mb-2 p-0">
                                    <p class="card-text text-muted m-0">Estado</p>
                                    @if ($request->status === 0)
                                        <h5 class="card-title m-0 p-0"><span class="badge text-white bg-secondary">Pendiente</span></h5>
                                    @elseif ($request->status === 1)
                                        <h5 class="card-title m-0 p-0"><span class="badge text-white bg-success">Aprobado</span></h5>
                                    @elseif ($request->status === 2)
                                        <h5 class="card-title m-0 p-0"><span class="badge text-white bg-danger">Rechazado</span></h5>
                                    @elseif ($request->status === 5)
                                        <h5 class="card-title m-0 p-0"><span class="badge text-white bg-success">Finalizado</span></h5>
                                    @endif
                                </div>
                                @if (!is_null($request->document))
                                <div class="col-9 mb-2 p-0">
                                    <p class="card-text text-muted m-0">Archivo</p>
                                    <a href="/assets/documents/users/{{$request->document}}">Descargar</a>
                                </div>
                                @endif
                                @if (Auth::guard('admin')->check() || Auth::user()->role == 2)
                                    <div class="col-6 mt-3 p-0">
                                        <a class="btn btn-primary p-1" data-bs-toggle="modal" data-bs-target="#editRequest">Editar</a>

                                        <div class="modal fade" id="editRequest" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modificar
                                                            solicitud</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    @if (!Auth::guard('admin')->check())
                                                    <form action="{{ url(env('user') . '/request/edit/' . $request->id) }}" method="POST">
                                                    @else
                                                    <form action="{{ url(env('admin') . '/request/edit/' . $request->id) }}" method="POST">
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
                                                            <button type="button" class="btn"
                                                                data-bs-dismiss="modal">Cancelar</button>
                                                            <button type="submit"
                                                                class="btn btn-primary">Aceptar</button>
                                                        </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 mt-3 p-0">
                                        @if (!Auth::guard('admin')->check())
                                        <a href="{{ url(env('user') . '/request/delete/' . $request->id) }}"
                                            class="btn btn-danger p-1">Eliminar</a>
                                        @else
                                        <a href="{{ url(env('admin') . '/request/delete/' . $request->id) }}"
                                            class="btn btn-danger p-1">Eliminar</a>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
                @if(count($requests)<1)
                <div class="d-flex align-items-center flex-column py-6">
                    <div>
                        No hay solocitudes...
                    </div>
                </div>
                @endif
            </div>

            <div class="grid md:grid-cols-12 grid-cols-1 mt-8 text-center">
                <div class="md:col-span-12 text-center">
                    {{ $requests->links('pagination::semantic-ui') }}
                </div>
            </div>
            <!--end grid-->
        </div>
        <!--end container-->
    </section>
    <!--end section-->
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
