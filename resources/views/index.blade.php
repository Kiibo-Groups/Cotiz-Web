@extends('layouts.app')

@section('content')

<!-- home -->
<section id="home" class="wrapper bg-dark angled lower-start">
  <div id="particles-js"></div>
  <div class="container pt-7 pt-md-11 pb-8">
    <div class="row gx-0 gy-10 align-items-center">
      <div class="col-lg-6" data-cues="slideInDown" data-group="page-title" data-delay="600">
        <h1 class="display-1 text-white mb-4">
          {{$section_init->titulo}}
          <br />
          <span class="typer text-primary text-nowrap" data-delay="100"
          data-words="{{$section_init->subtitulo}}"></span>
          <span class="cursor text-primary" data-owner="typer"></span>
        </h1>
        <p class="lead fs-24 lh-sm text-white mb-7 pe-md-18 pe-lg-0 pe-xxl-15">
          {{ $section_init->descript }}
        </p>
        <div>
          <a href="#about" class="btn btn-lg btn-primary rounded">Sobre nosotros</a>
        </div>
      </div>
      <!-- /column -->
      <div class="col-lg-5 offset-lg-1 mb-n18" data-cues="slideInDown">
        <div class="col-lg-7 position-relative">
          <div class="shape bg-dot primary rellax w-18 h-18" data-rellax-speed="1" style="top: 0; left: -1.4rem; z-index: 0;"></div>
          <div class="row gx-md-5 gy-5">
              <div class="col-md-6">
                <figure class="rounded mt-md-10 position-relative"><img src="{{ asset('assets/img/photos/'.$section_init->pic_1) }}" srcset="{{ asset('assets/img/photos/'.$section_init->pic_1) }}" alt=""></figure>
              </div>
              <div class="col-md-6">
                <figure class="rounded mt-md-10 position-relative"><img src="{{ asset('assets/img/photos/'.$section_init->pic_2) }}" srcset="{{ asset('assets/img/photos/'.$section_init->pic_2) }}" alt=""></figure>
              </div>
              <div class="col-md-12">
                <div class="row gx-md-5 gy-5">
                  <div class="col-md-12 order-md-2">
                      <figure class="rounded"><img src="{{ asset('assets/img/photos/'.$section_init->pic_3) }}" srcset="{{ asset('assets/img/photos/'.$section_init->pic_3) }}" alt=""></figure>
                  </div>
                </div>
            </div>
            <!--/column -->
          </div>
          <!--/.row -->
      </div>
        <!-- /div -->
      </div>
      <!-- /column -->
    </div>
    <!-- /.row -->
  </div>
</section>
<!-- /home -->

<!-- about -->
<section id="about" class="wrapper bg-light">
  <div class="container py-21 py-md-21 pb-md-18">
    <div class="row gx-lg-8 gx-xl-12 gy-10 align-items-center">
      <div class="col-md-8 col-lg-6 col-xl-5 order-lg-2 position-relative">
        <div class="shape bg-soft-primary rounded-circle rellax w-20 h-20" data-rellax-speed="1" style="top: -2rem; right: -1.9rem;"></div>
        <figure class="rounded">
          <video src="{{ asset('assets/videos/'.$section_about->video) }}" id="play_interview" style="width: 100%;" autoplay loop muted></video>
        </figure>
      </div>

      <div class="col-lg-6">
        <h2 class="display-4 mb-3">{{ $section_about->titulo }}</h2>
        <p class="lead fs-lg">{{ $section_about->subtitulo }} </p>
        <p class="mb-6">{{ $section_about->descript }}</p>
      </div>
    </div>
  </div>
  <div class=" ">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 100">
      <path style="stroke: none; fill: #000;" d="M1260,1.65c-60-5.07-119.82,2.47-179.83,10.13s-120,11.48-180,9.57-120-7.66-180-6.42c-60,1.63-120,11.21-180,16a1129.52,1129.52,0,0,1-180,0c-60-4.78-120-14.36-180-19.14S60,7,30,7H0v93H1440V30.89C1380.07,23.2,1319.93,6.15,1260,1.65Z"/>
    </svg>
  </div>
</section>
<!-- /about -->

<!-- Our Providers -->
<section id="our_clients" class="wrapper bg-dark">
  <div class="container py-18 pb-md-18">
    <div class="row gx-lg-8 gx-xl-12 gy-10 gy-lg-0">
      <div class="col-lg-4">
        <p class="lead fs-lg mb-0 pe-xxl-5 text-white">Proveedor name</p>
        <h3 class="display-4 mb-3 pe-xxl-5 text-white">Proveedro email</h3>
      </div>
      <!-- /column -->
      <div class="col-lg-8 mt-lg-12">
        <div class="row">
          <div class="swiper-container clients mb-0" data-margin="10" data-dots="true" data-autoplay="true" data-autoplay-timeout="3000" data-items-xxl="3" data-items-xl="3" data-items-lg="3" data-items-md="3" data-items-xs="2">
            <div class="swiper">
              <div class="swiper-wrapper">
                @foreach($providers as $provider)
                  <div class="swiper-slide px-5"><img src="{{ asset('assets/img/brands/'.$provider->logo) }}" alt="" /></div>
                @endforeach
              </div>
              <!--/.swiper-wrapper -->
            </div>
            <!-- /.swiper -->
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="overflow-hidden">
    <div class="divider text-white mx-n2">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 100">
        <path fill="currentColor" d="M1260,1.65c-60-5.07-119.82,2.47-179.83,10.13s-120,11.48-180,9.57-120-7.66-180-6.42c-60,1.63-120,11.21-180,16a1129.52,1129.52,0,0,1-180,0c-60-4.78-120-14.36-180-19.14S60,7,30,7H0v93H1440V30.89C1380.07,23.2,1319.93,6.15,1260,1.65Z"/>
      </svg>
    </div>
  </div>
</section>
<!-- /Our Clients -->

<!-- Nuestros asesores -->
<section class="wrapper bg-light">
  <div class="container py-14 py-md-16">
    <div class="row gy-10 gy-sm-13 gx-md-8 gx-xl-12 align-items-center">
      <div class="col-lg-6">
        <div class="row gx-md-5 gy-5">
          <div class="col-12">
            <figure class="rounded mx-5"><img src="{{ asset('assets/img/photos/'.$section_adviser->pic_1) }}" srcset="{{ asset('assets/img/photos/'.$section_adviser->pic_1) }}" alt=""></figure>
          </div>
          <div class="col-md-6">
            <figure class="rounded"><img src="{{ asset('assets/img/photos/'.$section_adviser->pic_2) }}" srcset="{{ asset('assets/img/photos/'.$section_adviser->pic_2) }}" alt=""></figure>
          </div>
          <div class="col-md-6">
            <figure class="rounded"><img src="{{ asset('assets/img/photos/'.$section_adviser->pic_3) }}" srcset="{{ asset('assets/img/photos/'.$section_adviser->pic_3) }}" alt=""></figure>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <h2 class="fs-16 text-uppercase text-muted mb-3">{{ $section_adviser->titulo }}</h2>
        <h3 class="display-3 mb-10">{{ $section_adviser->descript }}</h3>
        <div class="row gy-8">
          <div class="col-md-12">
            <div class="d-flex flex-row">
              <div>
                <a href="./call_advice" class="btn btn-primary rounded-pill mt-2">Agendar una llamada</a>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Nuestros asesores -->

<!-- /Interview -->
<section class="wrapper image-wrapper bg-image bg-overlay" data-image-src="{{ asset('assets/img/photos/bg1.jpg') }}">
  <div class="container py-18 pt-md-16 pb-md-18">
    <div class="row">
      <div class="col-lg-8">
        <h1 class="text-uppercase text-white mb-3">{{ $seccion_schedule_meeting->titulo }}</h1>
        <h4 class="display-5 mb-6 text-white pe-xxl-18">{{$seccion_schedule_meeting->subtitulo}}</h4>
        <p class="lead fs-lg"><span class="text-white">{{$seccion_schedule_meeting->descript}}</span></p>
        <a href="{{$seccion_schedule_meeting->btn_action}}" class="btn btn-primary rounded mb-0 text-nowrap">{{$seccion_schedule_meeting->btn_text}}</a>
      </div>
      <!-- /column -->
    </div>
    <!-- /.row -->
  </div>
</section>
<!-- /Interview -->

<!-- event -->
<section id="events" class="wrapper bg-light">
  <div class="container py-14 py-md-16">
    <div class="row align-items-center mb-10">
      <div class="col-md-8 col-lg-9 col-xl-8 col-xxl-7 pe-xl-20">
        <h2 class="display-4 mb-0">Conoce nuestros eventos mas proximos.</h2>
      </div>
      <!--/column -->
      <div class="col-md-4 col-lg-3 ms-md-auto text-md-end mt-5 mt-md-0">
        <a href="{{ url('event') }}" class="btn btn-soft-primary rounded-pill mb-0">Ver todos los eventos.</a>
      </div>
      <!--/column -->
    </div>

    <!--/.row -->
    <div class="row gx-lg-8 gx-xl-11 gy-10 blog grid-view">
      <div class="col-lg-8">
        <article class="post">
          <figure class="overlay overlay-1 hover-scale rounded mb-5">
            <a href="{{ url('event/'.$last_event->id) }}">
              <img src="{{ asset('assets/img/photos/'.$last_event->img) }}" style="height:100px;" alt="" /></a>
            <figcaption>
              <h5 class="from-top mb-0">Ver evento</h5>
            </figcaption>
          </figure>
          <!-- /.post-slider -->
          <div class="post-header mb-5">
            <!-- /.post-category -->
            <h2 class="post-title mt-1 mb-4"><a class="link-dark" href="{{ url('event/'.$last_event->id) }}">{{$last_event->titulo}}</a></h2>
            <ul class="post-meta mb-0">
              <li class="post-date"><i class="uil uil-calendar-alt"></i><span>{{$last_event->fecha}} | {{ $last_event->hora }}</span></li>
              <li class="post-author"><a><i class="uil uil-user"></i><span>By Cotiz</span></a></li>
              <li class="post-comments"><a><i class="uil uil-comment"></i>{{ $last_event->comments_count }}<span> Comments</span></a></li>
            </ul>
            <!-- /.post-meta -->
          </div>
          <!-- /.post-header -->
          <div class="post-content">

          </div>
          <!-- /.post-content -->
        </article>
        <!-- /.post -->
      </div>
      <!-- /column -->
      @if(count($events) > 0)
      <div class="col-lg-4">
        <div class="row gy-10">
          @foreach($events as $evt)
          <div class="col-md-6 col-lg-12">
            <article class="post">
              <figure class="overlay overlay-1 hover-scale rounded mb-5"><a href="{{ url('event/'.$evt->id) }}"> <img src="{{ asset('assets/img/photos/'.$evt->img) }}" alt="" /></a>
                <figcaption>
                  <h5 class="from-top mb-0">Ver evento</h5>
                </figcaption>
              </figure>
              <div class="post-header">
                <!-- /.post-category -->
                <h2 class="post-title h3 mt-1 mb-3"><a class="link-dark" href="{{ url('event/'.$evt->id) }}">{{$evt->titulo}}</a></h2>
              </div>
              <!-- /.post-header -->
              <div class="post-footer">
                <ul class="post-meta">
                  <li class="post-date"><i class="uil uil-calendar-alt"></i><span>{{$evt->fecha}} | {{$evt->hora}}</span></li>
                  <li class="post-comments"><a href="{{ url('event/'.$evt->id) }}"><i class="uil uil-comment"></i>{{$evt->comments_count}}</a></li>
                </ul>
                <!-- /.post-meta -->
              </div>
              <!-- /.post-footer -->
            </article>
            <!-- /.post -->
          </div>
          <!-- /column -->
          @endforeach
        </div>
        <!-- /.row -->
      </div>
      <!-- /column -->
      @endif
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
</section>
<!-- /event -->

<!-- beneficts -->
<section id="beneficts" class="wrapper bg-light">
  <div class="container py-14 py-md-16">
    <div class="row gx-md-8 gy-10 align-items-center">
      <div class="col-lg-6 offset-lg-1 order-lg-2 position-relative">
        <figure class="rounded"><img class="img-fluid" src="{{ asset('assets/img/photos/'.$benficts->pic_1) }}" srcset="{{ asset('assets/img/photos/about27@2x.jpg 2x') }}" alt="" /></figure>
      </div>
      <!--/column -->
      <div class="col-lg-5">
        <h2 class="fs-16 text-uppercase text-gradient gradient-1 mb-3">{{$benficts->titulo}}</h2>
        <h3 class="display-4 mb-4 me-lg-n5">{{$benficts->subtitulo}}</h3>
        <div class="row gx-xl-12 gy-6">
          <?php
            $dat_benef = json_decode($benficts->descript, true);
            $count_sect = count($dat_benef);
            if ($count_sect > 6) {
             $wrap_num = round($count_sect / 6);
            }else {
              $wrap_num = 1;
            }
            $page = 0;
            $count = 0;
          ?>
          @for ($i = 0; $i < $wrap_num; $i++)
          <div class="col-md-6">
            <ul class="icon-list bullet-bg bullet-soft-primary">
              @for ($x = $page; $x < $count_sect; $x++)
              <?php $page = $x;$count++; ?>
              <li><i class="uil uil-check"></i>{{$dat_benef[$x]['value']}}</li>
              @if($count == 6)
              <?php $page++; $count = 0; break; ?>
              @endif
              @endfor
            </ul>
          </div>
          @endfor
        </div>
      </div>
      <!--/column -->
    </div>
    <!--/.row -->
  </div>
  <!-- /.container -->
</section>
<!-- /beneficts -->

@if(Auth::user())
<!-- Divisiones -->
<section class="wrapper bg-light">
  <div class="container py-14 py-md-16">
    <h2 class="display-4 mb-3">Divisiones</h2>
    <p class="lead fs-lg">Descubre nuestros <span class="underline-2 orange">Diferentes Niveles</span> y Requerimientos.</p>

    <div class="table-responsive" style="border: 1px solid #e1e1e1;border-radius: 25px;">
      <table class="table table-borderless table-striped text-center table-hover">
        <thead>
          <tr>
            <th class="w-25"></th>
            <th>
              <div class="h4 mb-1">Requerimientos</div>
              <div class="fs-15 fw-normal text-secondary"></div>
            </th>
            <th>
              <div class="h4 mb-1">Actividades</div>
              <div class="fs-15 fw-normal text-secondary"></div>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td scope="col" class="option text-start">Nuclear</td>
            <td>200 mil pesos</td>
            <td>-</td>
          </tr>
          <tr>
            <td scope="col" class="option text-start">Light</td>
            <td>Más de 120 mil pesos</td>
            <td>Pitch al comité y estrategias a tomar.</td>
          </tr>
          <tr>
            <td scope="col" class="option text-start">Thermal</td>
            <td>50 mil pesos, Proyecto ya con empleados.</td>
            <td>Temas legeles, fiscales, 1 empleado y un proyecto replicable o de expansión.</td>
          </tr>
          <tr>
            <td scope="col" class="option text-start">Chemical</td>
            <td>10 mil pesos, Idea ya generando.</td>
            <td>Ventas, redes sociales, página web o lugar fisico.</td>
          </tr>
          <tr>
            <td scope="col" class="option text-start">Motion</td>
            <td>1 mensualidad completa con nosotros</td>
            <td>Business canva, Pitch al comité, empathy map, funnel de ventas, modelo financiero, roadmap, MVP y estudio de mercado.</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>
<!-- /Divisiones -->
@endif

@section('js')
<script>
  $(document).ready(function() {
    $('#play_interview')[0].play();
  });
</script>
@endsection
@endsection
