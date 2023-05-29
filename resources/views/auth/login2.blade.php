@extends('layouts.app')
@section('content')
<section class=" bg-image bg-no-repeat bg-center bg-overlay bg-overlay-black-600 text-white py-md-16 "
    data-image-src="{{ asset('assets2/images/bg-login.jpg') }}"
    style="height:100vh; background-repeat: no-repeat;background-size: cover;">
    <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-xl-6 col-xxl-5 mx-auto">
                <div class="card">
                    <div class="card-body p-11 text-center">
                        <img src="{{ asset('assets2/images/logo-cotiz.png')}}" width="120px" class="mx-auto" alt="">
                        <h2 class="mb-3">Iniciar sesion</h2>
                        <form class="text-start my-3" method="POST" action="/admin/login">
                            @csrf
                            <div class="form-floating mb-4">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="username" value="{{ old('email') }}" required autocomplete="email" autofocus>
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

                            <button type="submit" class="btn btn-info rounded-pill btn-login w-100 mb-2">
                                Ingresar
                            </button>
                        </form>
                    <!-- /form -->

                    @if (Route::has('password.request'))
                        <p class="mb-1"><a href="{{ route('password.request') }}" class="hover">Has olvidado tu contraseña?</a></p>
                    @endif

                    <p class="mb-0" style="color:black;">No tienes una cuenta? <a href="{{route('register_get')}}" class="hover">Registrate</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /section -->

<section class="wrapper bg-light">

</section>
<!-- /section -->
@endsection
