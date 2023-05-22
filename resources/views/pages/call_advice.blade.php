@extends('layouts.app')

@section('content')

<section class="wrapper bg-soft-primary">
    <div class="container pt-20 pb-19 pt-md-14 pb-md-20 text-center">
      <div class="row">
        <div class="col-sm-10 col-md-8 col-lg-6 col-xl-6 col-xxl-5 mx-auto">
          <h1 class="display-1 mb-3">{{$text_m->titulo}}</h1>
          <nav class="d-inline-block" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('./') }}">Inicio</a></li>
              <li class="breadcrumb-item active" aria-current="page">Mentores</li>
            </ol>
          </nav>
          <!-- /nav -->
        </div>
        <!-- /column -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<!-- /section -->
 
<section class="wrapper bg-light" id="list_mentors">
    <div class="container py-14 py-md-16">
        <div class="row mb-3">
            <div class="col-md-10 col-lg-12 col-xl-10 col-xxl-9 mx-auto text-center">
              <h2 class="fs-15 text-uppercase text-muted mb-3">{{$text_m->subtitulo}}</h2>
              <h3 class="display-4 mb-7 px-lg-19 px-xl-18">{{$text_m->descript}}</h3>
            </div>
            <!--/column -->
        </div>

        @if(Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert"> 
            {{ Session::get('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if(Session::has('message'))
        
        <div class="alert alert-success alert-dismissible fade show" role="alert"> 
            {{ Session::get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if(count($mentors) > 0)
        <div class="position-relative">
            <div class="shape rounded-circle bg-soft-yellow rellax w-16 h-16" data-rellax-speed="1" style="bottom: 0.5rem; right: -1.7rem;"></div>
            <div class="shape rounded-circle bg-line red rellax w-16 h-16" data-rellax-speed="1" style="top: 0.5rem; left: -1.7rem;"></div>
            <div class="swiper-container dots-closer mb-6" data-margin="0" data-dots="true" data-items-xxl="4" data-items-lg="3" data-items-md="2" data-items-xs="1">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        @foreach ($mentors as $ments)
                        <div class="swiper-slide">
                            <div class="item-inner">
                            <div class="card">
                                <div class="card-body">
                                    <img class="rounded-circle w-15 mb-4" src="{{ asset('assets/img/mentors/'.$ments->img) }}" srcset="{{ asset('assets/img/mentors/'.$ments->img) }}" alt="" />
                                    <h4 class="mb-1 text-left">{{$ments->nombre}}</h4> 
                                    <p class="mb-2 text-left">{{substr($ments->descript,0,35)}}...</p>
                                    <nav class="nav social mb-0">
                                        @if($ments->facebook)<a href="{{$ments->facebook}}" target="_blank"><i class="uil uil-facebook-f"></i></a> @endif
                                        @if($ments->twitter)<a href="{{$ments->twitter}}" target="_blank"><i class="uil uil-twitter"></i></a>@endif
                                        @if($ments->instagram)<a href="{{$ments->instagram}}" target="_blank"><i class="uil uil-instagram"></i></a>@endif
                                    </nav>
                                </div>
                                <!--/.card-body -->
                                <a href="#" class="btn btn-sm btn-primary rounded btn_agen_call" data-bs-toggle="modal" data-bs-id-mentor="{{ $ments->id }}" data-bs-target="#modal-contact">Agendar reunion</a>
                            </div>
                            <!-- /.card -->
                            </div>
                            <!-- /.item-inner -->
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</section> 
  
  

<div class="modal fade" id="modal-contact" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content text-center">
      <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <h2 class="mb-3 text-start">Agenda una llamada</h2>
        <p class="lead mb-6 text-start">Ingresa tus datos de contacto.</p>
        
        {!! Form::model(['url' => ['/call_advice'],'method' => 'POST', 'class' => 'text-start mb-3','novalidate']) !!}
            <input type="hidden" name="mentor_id" id="mentor_id">
            <div class="form-floating mb-4">
                <input type="text" class="form-control" placeholder="Name" name="name" id="loginName">
                <label for="loginName">Nombre completo</label>
            </div>
            <div class="form-floating mb-4">
                <input type="email" class="form-control" placeholder="Email" name="email" id="loginEmail">
                <label for="loginEmail">Email</label>
            </div>
            <div class="form-floating mb-4">
                <input type="date" class="form-control" placeholder="Fecha" name="date" id="fecha"> 
                <label for="fecha">Fecha/hora</label>
            </div>

            <div class="form-floating mb-4">
                <textarea name="message" id="message" cols="30" rows="30" class="form-control"></textarea>
                <label for="message">Mensaje adicional</label>
            </div>
             
            <input type="submit" class="btn btn-primary rounded-pill  btn-login w-100 mb-2" value="Agendar">
        </form>
      </div>
      <!--/.modal-content -->
    </div>
    <!--/.modal-body -->
  </div>
</div>
<!--/.modal -->
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            
            $('.btn_agen_call').click(function(evt) {
                console.log($(this).attr('data-bs-id-mentor'));
                $('#mentor_id').val($(this).attr('data-bs-id-mentor'));
            });

        });
    </script>
@endsection