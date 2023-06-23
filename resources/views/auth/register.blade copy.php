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
                    <form class="text-start mb-3" method="POST" action="{{ route('register_post') }}" >
                        @csrf


                        <div class="form-floating mb-4">
                            <input id="buscarfc" type="text" class="form-control"  name="rfc"  required  >
                            <label for="rfc">Buscar RFC</label>

                        </div>
                        <div id="divempresa" style="display: none" class="row form-floating mb-4">

                            <div id="divempresaboton" class="col-4" style="float: left; display: none">
                                <button id="botonempresa"  class="btn btn-info rounded-pill btn-login w-100 mb-2">
                                    empresa
                                </button>
                            </div>
                            <div id="divbotonregistro" class="col-4" style="float: right">
                                <button  type="submit" class="btn btn-info rounded-pill btn-login w-100 mb-2">
                                    Registrarme
                                </button>
                            </div>
                            <div class="col-4"style="float: right">
                                <button type="submit" class="btn btn-info rounded-pill btn-login w-100 mb-2">
                                    Prueba
                                </button>
                            </div>

                        </div>

                        <div id="registroData" style="display: none">

                            <div class="form-floating mb-4">
                                <input id="signupName" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" >
                                <label for="signupName">Nombre</label>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-floating mb-4">
                                <input id="opinionPositiva" type="file" class="form-control"  name="opinionPositiva" title="Opinión positiva" required >
                                <label for="opinionPositiva">Opinión positiva</label>

                            </div>
                            <div class="form-floating mb-4">
                                <input id="infoBancaria" type="file" class="form-control"  name="infoBancaria" value="{{ old('infoBancaria') }}" required >
                                <label for="infoBancaria">Información bancaria</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input id="constFiscal" type="file" class="form-control"  name="constFiscal" value="{{ old('constFiscal') }}" required >
                                <label for="constFiscal">Constancia de situación fiscal</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input id="domicilioFiscal" type="file" class="form-control"  name="domicilioFiscal" value="{{ old('domicilioFiscal') }}" required >
                                <label for="domicilioFiscal">Registro de Domiclio fiscal </label>
                            </div>
                            <div class="form-floating mb-4">
                                <input id="numeroPlanta" type="file" class="form-control"  name="numeroPlanta" value="{{ old('numeroPlanta') }}" required >
                                <label for="numeroPlanta">Número de planta industrial </label>
                            </div>

                            <div class="row">
                               <div class="col-6 form-floating mb-4">
                                    <input id="calle" type="text" class="form-control"  name="calle"  required >
                                    <label for="calle">Calle </label>
                               </div>
                               <div class="col-6 form-floating mb-4">
                                    <input id="numeroCalle" type="text" class="form-control"  name="numeroCalle"  required >
                                    <label for="numeroCalle">Número </label>
                               </div>
                            </div>
                            <div class="row">
                                <div class="col-6 form-floating mb-4">
                                     <input id="colonia" type="text" class="form-control"  name="colonia"  required >
                                     <label for="colonia">Colonia </label>
                                </div>
                                <div class="col-6 form-floating mb-4">
                                     <input id="cp" type="text" class="form-control"  name="cp"  required >
                                     <label for="cp">C.P </label>
                                </div>
                             </div>
                             <div class="row">
                                <div class="col-6 form-floating mb-4">
                                     <input id="municipio" type="text" class="form-control"  name="municipio"  required >
                                     <label for="municipio">Municipio </label>
                                </div>
                                <div class="col-6 form-floating mb-4">
                                     <input id="delegación" type="text" class="form-control"  name="delegación"  required >
                                     <label for="delegación">Delegación </label>
                                </div>
                             </div>
                             <div class="row">
                                <div class="col-6 form-floating mb-4">
                                     <input id="estado" type="text" class="form-control"  name="estado"  required >
                                     <label for="estado">Estado </label>
                                </div>
                                <div class="col-6 form-floating mb-4">
                                     <input id="pais" type="text" class="form-control"  name="pais"  required >
                                     <label for="pais">País </label>
                                </div>
                             </div>

                             <div class="form-floating mb-4">
                                <textarea name="actividadPPal" id="actividadPPal" rows="3" class="form-control"></textarea>
                                <label for="actividadPPal">Descripción de actividad principal de la empresa</label>
                            </div>








                        </div>



                        {{--
                        <div class="form-floating mb-4">
                            <input id="signupName" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" >
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

                        --}}
                    <form>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
    $(document).ready(function() {

        $("#buscarfc").blur(function() {
            var rfc = $("#buscarfc").val();
            $.ajax({
                url: '{{ route('register.rfc') }}',
                type: "GET",
                data: {
                    rfc: rfc,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(response) {

                   var id = response.data.id;
                   var rfc = response.data.rfc;
                   var nombre = response.data.nombre;
                   $("#signupName").val(nombre);
                    if (response.code == 200) {
                        if (nombre != 0) {
                            $("#divempresaboton").show();
                            $("#divbotonregistro").hide();
                        }else{
                            $("#divempresaboton").hide();
                            $("#divbotonregistro").show();
                        }
                        $("#divempresa").show();
                        $("#botonempresa").html(nombre);
                    }
                }
            });

        });


        $("#divbotonregistro").click(function(){

            $("#divempresa").hide();
            $("#registroData").show();
            //$('#signupName').prop('readonly', true);
            $('#buscarfc').prop('readonly', true);
            $('#buscarfc').prop('disabled', true);

        });


    });
</script>
