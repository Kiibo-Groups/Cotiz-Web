@extends('layouts.app_profile')
@section('title') Panel de administración @endsection
@section('page_active') Dashboard @endsection 


@section('content')
    <section class="section dashboard">
        <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body pb-0">
                  <h5 class="card-title">Eventos a tu nivel</h5>
                    <!-- Eventos de mi nivel o inferiores -->
                    <div class="row"> 
                        @if(count($eventsMens) > 0) 
                            @foreach ($eventsMens as $evt)
                            <div class="col-xxl-4 col-md-6">
                                <div class="card">
                                    <img src="{{ asset('assets/img/photos/'.$evt->img) }}" class="card-img-top" style="height: 260px;width: auto;">
                                    <div class="card-img-overlay">
                                    <h5 class="card-title">{{$evt->titulo}}</h5>
                                    <p class="card-text">{{$evt->subtitulo}}<br />

                                        <span class="text-success small pt-1 fw-bold">Nivel</span> 
                                        <span class="text-muted small pt-2 ps-1">
                                            @switch($evt->level)
                                                @case(0)
                                                Cuenta Gratis
                                                @break
                                                @case(1)
                                                Light
                                                @break
                                                @case(2)
                                                Thermal
                                                @break
                                                @case(3)
                                                Chemical
                                                @break
                                                @case(4)
                                                Motion
                                                @break
                                                @case(5) 
                                                Nuclear
                                                @break
                                                @default
                                            @endswitch
                                        </span>
                                        <br /><hr />
                                        @if($evt->events_confirms_count == 0)
                                            <a href="./home/activeEvent/{{ $evt->id }}" class="card-link btn btn-primary rounded-pill" style="margin: 0px 0 25px 0;font-size: 12px;">
                                                Confirmar participacion
                                            </a> 
                                        @else  
                                        <a class="card-link btn btn-success rounded-pill" style="margin: 0px 0 25px 0;font-size: 12px;">
                                            Evento confirmado
                                        </a>
                                        @endif
                                        <a href="./event/{{ $evt->id }}" target="_blank" class="card-link btn btn-warning rounded-pill" style="margin: 0px 0 25px 10px;font-size: 12px;">
                                            Ver detalles
                                        </a> 
                                    </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @else 
                            <div class="col-xxl-12 col-md-12">
                                <div class="card info-card sales-card" style="padding:0;">
                                    <div class="card-body" style="padding:0;">
                                        <h3 class="card-title" style="padding:20px 0 15px 15px;">Sin eventos que mostrar</h3>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <!-- Eventos de mi nivel o inferiores -->
                </div>
            </div>
        </div>
        
        <!-- Right side columns -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body pb-0">
                  <h5 class="card-title">Nuevos eventos <span>| hoy</span></h5>
                 
                  <div class="news">
                    @if(count($eventsSups) > 0) 
                        @foreach ($eventsSups as $evt)
                        <div class="post-item clearfix">
                            <img src="{{ asset('assets/img/photos/'.$evt->img) }}" alt="">
                            <h4><a href="#">{{$evt->titulo}}</a></h4>
                            <p>{{$evt->subtitulo}} &nbsp;&nbsp; - &nbsp;
                                <span class="text-success small pt-1 fw-bold">Nivel</span> 
                                <span class="text-muted small pt-2 ps-1">
                                    @switch($evt->level)
                                        @case(0)
                                        Cuenta Gratis
                                        @break
                                        @case(1)
                                        Light
                                        @break
                                        @case(2)
                                        Thermal
                                        @break
                                        @case(3)
                                        Chemical
                                        @break
                                        @case(4)
                                        Motion
                                        @break
                                        @case(5) 
                                        Nuclear
                                        @break
                                        @default
                                    @endswitch
                                </span>
                                <br /><hr />
                                <section style="text-align: right;">
                                    @if($evt->events_confirms_count == 0)
                                        <button type="button" class="btn btn-primary rounded-pill" style="margin: 0px 0 25px 0;font-size: 12px;" 
                                                data-bs-toggle="modal" data-bs-target="#input_code-{{$evt->id}}">
                                            Ingresar código
                                        </button>
                                                            
                                        <div class="modal fade" id="input_code-{{$evt->id}}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Ingresa el código de liberación</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        
                                                    </div> 
                                                        {!! Form::model($evt, ['url' => [env('user').'/input_code/'.$evt->id],'files' => true,'method' => 'PATCH']) !!}
                                                        <div class="modal-body">
                                                            <p>
                                                                Con este código podras marcar tu asistencia al evento. #{{ $evt->id }}
                                                            </p>
                                                            <div class="row mb-3">
                                                                <label for="inputCode" class="col-sm-2 col-form-label">Código</label>
                                                                <div class="col-sm-10">
                                                                <input type="text"  id="inputCode" name="code"  maxlength="8" minlength="8" required class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @else  
                                    <button type="button" class="btn btn-success rounded-pill" style="margin: 0px 0 25px 0;font-size: 12px;">
                                        Evento confirmado
                                    </button>
                                    @endif
                                    <a href="./event/{{ $evt->id }}" target="_blank" class="btn btn-warning rounded-pill" style="margin: 0px 0 25px 10px;font-size: 12px;">
                                        Ver detalles
                                    </a> 
                                </section>
                            </p>
                        </div>
                        @endforeach
                    @else 
                        <div class="col-xxl-12 col-md-12">
                            <div class="card info-card sales-card" style="padding:0;">
                                <div class="card-body" style="padding:0;">
                                    <h3 class="card-title" style="padding:20px 0 15px 15px;">Sin eventos que mostrar</h3>
                                </div>
                            </div>
                        </div>
                    @endif

                  </div>
                </div>
              </div>
            <!-- News & Updates Traffic
            <div class="card">
                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                </div>

                <div class="card-body pb-0">
                    <h5 class="card-title">News &amp; Updates <span>| Today</span></h5>
                    <div class="news"> 
                        <iframe src="https://snapwidget.com/embed/1025972" class="snapwidget-widget" allowtransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden; border-radius:5px; width:100%; height:600px"></iframe>
                    </div>
                </div>
            </div> -->
        </div>
        </div>
    </section>
@endsection