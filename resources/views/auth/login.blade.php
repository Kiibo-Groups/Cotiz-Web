@extends('layouts.app')
@section('content')
<section class="wrapper image-wrapper bg-image bg-overlay bg-overlay-light-600 text-white" data-image-src="{{ asset('assets/img/photos/bg14.png') }}">
    <div class="container pt-17 pb-20 pt-md-19 pb-md-21 text-center">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h1 class="display-1 mb-3">Ingresa a tu cuenta</h1>
          <nav class="d-inline-block" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{url('./')}}">Inicio</a></li>
              <li class="breadcrumb-item active" aria-current="page">Ingresar</li>
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

<section class="wrapper bg-light">
    <div class="container pb-14 pb-md-16">
    <div class="row">
        <div class="col-lg-7 col-xl-6 col-xxl-5 mx-auto mt-n20">
            <div class="card">
                <div class="card-body p-11 text-center">
                <h2 class="mb-3 text-start">Bienvenido(a) de nuevo</h2>
                <p class="lead mb-6 text-start">Complete su correo electrónico y contraseña para ingresar.</p>
                <form class="text-start mb-3" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-floating mb-4"> 
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <label for="loginEmail">Email</label>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-floating password-field mb-4">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        <span class="password-toggle"><i class="uil uil-eye"></i></span>
                        <label for="loginPassword">Contraseña</label>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary rounded-pill btn-login w-100 mb-2">
                        Ingresar
                    </button>
                </form>
                <!-- /form -->

                @if (Route::has('password.request'))
                    <p class="mb-1"><a href="{{ route('password.request') }}" class="hover">Has olvidado tu contraseña?</a></p>
                @endif
            
                <p class="mb-0">No tienes una cuenta? <a href="{{route('register')}}" class="hover">Registrate</a></p>
                <div class="divider-icon my-4">or</div>
                <nav class="nav social justify-content-center text-center">
                    <a href="#" class="btn btn-circle btn-sm btn-google"><i class="uil uil-google"></i></a>
                    <a href="#" class="btn btn-circle btn-sm btn-facebook-f"><i class="uil uil-facebook-f"></i></a>
                </nav>
                <!--/.social -->
                </div>
                <!--/.card-body -->
            </div>
            <!--/.card -->
        </div>
        <!-- /column -->
    </div>
    <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<!-- /section -->
@endsection
