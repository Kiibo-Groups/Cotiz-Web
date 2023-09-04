@extends('layouts.app_profile')
@section('title')
    Empresas Proveedor
@endsection
@section('page_active')
    Listado de Empresas Proveedoras
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


                <div class="col-lg-12">
                    @include('alerts')
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Listado de Empresas Proveedoras</h5>

                            <!-- Default Table -->
                            <div class="table table-responsive">
                                <table class="table table-responsive" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">RFC</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Calle</th>
                                            <th scope="col">Número</th>
                                            <th scope="col">Colonia</th>
                                            <th scope="col">Creación</th>
                                            <th scope="col">Status</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($requests as $req)
                                            <tr>
                                                <th scope="row">{{ $req->rfc }}</th>
                                                <td>{{ $req->nombre }}</td>
                                                <td>{{ $req->calle }} </td>
                                                <td>{{ $req->numeroCalle }}</td>
                                                <td>{{ $req->colonia }}</td>
                                                <td class="col-md-1" style="font-size: 14px">
                                                    {{ $req->created_at->format('d-m-Y') }}</td>
                                                <td class="col-md-1">
                                                    @if ($req->status === 1)
                                                        <h5 class="card-title m-0 p-0"><span
                                                                class="badge text-white bg-secondary">Pendiente</span></h5>
                                                    @else
                                                        <h5 class="card-title m-0 p-0"><span
                                                                class="badge text-white bg-success">Aprobado</span></h5>
                                                    @endif


                                                </td>
                                                <td class="col-md-1">
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
                                                                href="{{ url(env('admin') . '/empresas/proveedores/ver/' . $req->id) }}">Ver</a>
                                                            <a class="dropdown-item"
                                                                href="{{ url(env('admin') . '/empresas/proveedores/status/' . $req->id) }}">Activar/Desactivar</a>
                                                            <a class="dropdown-item"
                                                                href="{{ url(env('admin') . '/empresas/proveedores/usuarios/ver/' . $req->id) }}">Ver
                                                                Usuários</a>


                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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
                    {{ $requests->links('pagination::semantic-ui') }}
                </div>
            </div>
            <!--end grid-->
        </div>
        <!--end container-->
    </section>
    <!--end section-->
@endsection
