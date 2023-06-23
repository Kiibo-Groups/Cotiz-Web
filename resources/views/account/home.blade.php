@extends('layouts.app_profile')
@section('title')
    Panel de administración
@endsection
@section('page_active')
    Dashboard
@endsection


@section('content')
    <section class="section dashboard">
        <div class="row">
            @if ($services->count() > 0)
                <h2>Explora nuestros servicios disponibles</h2>
            @else
                <h2>No hay servicios disponibles</h2>
            @endif
            @foreach ($services as $service)
                <div class="col-4">
                    <div class="card">
                        <div class="card-img-box">
                            <div style="background-image:url('{{ asset('assets/img/logos/'.$service->logo) }}');background-size: cover;width: 100%;height: 210px;background-position: center center;"></div>
                        </div>
                        <div class="card-body row justify-content-center">
                            <div class="col-12">
                                <h5 class="card-title">{{ $service->provider->name }}</h5>
                            </div>
                            <div class="col-12 mb-2">
                                <p class="card-text text-muted m-0">Titulo</p>
                                <h5 class="card-title m-0 p-0">{{ $service->title }}</h5>
                            </div>
                            <div class="col-12 mb-2">
                                <p class="card-text text-muted m-0">Descripcion</p>
                                <h5 class="card-title m-0 p-0">{{ $service->description }}</h5>
                            </div>
                            <div class="col-12 mb-2">
                                <p class="card-text text-muted m-0">Tipo</p>
                                <h5 class="card-title m-0 p-0">
                                    @if ($service->type === 'service')
                                        Servicio
                                    @elseif ($service->type === 'product')
                                        Producto
                                    @else
                                        Personal
                                    @endif
                                </h5>
                            </div>
                            <a class="btn btn-success w-75" data-bs-toggle="modal" data-bs-target="#request-{{ $service->id }}">Solicitar</a>

                            <div class="modal fade" id="request-{{ $service->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Solicitar Servicio</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ url(env('user') . '/request/create') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <p>En este campos podrás añadir detalles importantes a tu solicitud para que sea procesada con mayor efectividad.</p>
                                                <label for="description">Descripción:</label>
                                                <textarea name="description" id="description" cols="30" style="min-height: 200px;" rows="1" class="form-control"></textarea>
                                                <input type='file' id="document" name="document" class="ec-image-upload mt-3" accept=".png, .jpg, .jpeg, .pdf, .docx, .txt"/>
                                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                                <input type="hidden" name="service_id" value="{{ $service->id }}">
                                                <input type="hidden" name="status" value="0">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn" data-bs-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-success">Solicitar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </section>
@endsection
