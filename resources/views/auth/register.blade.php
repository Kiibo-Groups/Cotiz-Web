@extends('layouts.app')
@section('content')
<section class=" bg-image bg-no-repeat bg-center bg-overlay bg-overlay-black-600 text-white py-md-16 "
    data-image-src="{{ asset('assets2/images/bg-login.jpg') }}"
    style="height:100vh; background-repeat: no-repeat;background-size: cover;">
    <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black"></div>
    <div class="container">
        <div class="row">
            <div class=" col-lg-7 col-xl-6 col-xxl-5 mx-auto">
                <div class="card">
                    <div class="card-body p-11 text-center">
                    <h2>Regístrese en Cotiz</h2> 
                    <p class="lead mb-6" style="color:black;">El registro toma menos de un minuto.</p>
                    <form class="text-start mb-3" method="POST" action="{{ route('register_post') }}">
                        @csrf

                        <div class="form-floating mb-4">
                            <input id="signupName" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            <label for="signupName">Nombre</label>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-floating mb-4">
                            <input id="signupEmail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            <label for="signupEmail">Email</label>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-floating mb-4">
                            <select name="role" id="signupRole" class="form-select" required>
                                <option value="" selected></option>
                                <option value="1">Usuario</option>
                                <option value="2">Proveedor</option>
                            </select>
                            <label for="signupRole">Tipo de Cuenta</label>
                            @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-floating mb-4">
                            <input id="signupPass" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            <label for="signupPass">Contraseña</label>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-floating mb-4">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            <label for="signupPass">Confirmar Contraseña</label>
                        </div>

                        <button type="submit" class="btn btn-info rounded-pill btn-login w-100 mb-2">
                            Registrarme
                        </button>
                    </form>
                    <p class="mb-0" style="color:black;">Ya tienes una cuenta? <a href="{{route('login')}}" class="hover">Ingresar</a></p>
                    </div>
                    <!--/.card-body -->
                </div>
                <!--/.card -->
            </div>
            <!-- /column -->
        </div>
    </div>
</section>
<!-- /section -->

<section class="wrapper bg-light">

</section>
<!-- /section -->
@endsection
