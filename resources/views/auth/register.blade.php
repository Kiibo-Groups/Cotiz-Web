@extends('layouts.app')


@section('content')
    <section class=" bg-image bg-no-repeat bg-center bg-overlay bg-overlay-black-600 text-white py-md-16 "
        data-image-src="{{ asset('assets2/images/bg-login.jpg') }}"
        style="height:100vh; background-repeat: no-repeat;background-size: cover;">
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black"></div>
        <div class="container">
            <div class="row">
                <div class=" col-lg-8 col-xl-8 col-xxl-8 mx-auto">
                    <div class="card">
                        <div class="card-body p-11 text-center">
                            <h2>Regístrese en Cotiz</h2>
                            <h4>Empresa</h4>
                            <p class="lead mb-6" style="color:black;">El registro toma menos de un minuto.</p>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <div class="form-floating mb-4">
                                <input id="buscarfc" type="text" class="form-control" name="rfc" required>
                                <input id="idempresa" type="hidden" class="form-control" name="idempresa" required>
                                <input id="nombreempresa" type="hidden" class="form-control" name="nombreempresa" required>

                                <label for="rfc">Buscar RFC de Empresa </label>

                            </div>
                            <div id="divempresa" style="display: none" class="row form-floating mb-4">

                                <div id="divempresaboton" class="col-6" style="float: left; display: none">
                                    <button id="botonempresa" class="btn btn-info rounded-pill btn-login w-100 mb-2">
                                        empresa
                                    </button>
                                </div>
                                <div id="divbotonregistro" class="col-6" style="float: right">
                                    <button type="submit" class="btn btn-info rounded-pill btn-login w-100 mb-2">
                                        Registrar Empresa
                                    </button>
                                </div>
                                <div id="divbotonregistroPrueba" class="col-6"style="float: right">
                                    <button type="submit" class="btn btn-info rounded-pill btn-login w-100 mb-2">
                                        Prueba
                                    </button>
                                </div>

                            </div>
                           @include('alerts')
                            <div id="registroData" style="display: none" class="registroData">

                                <div id="formulario"></div>
                            </div>


                            <p id="continuar" class="mb-0" style="color:black;"><a type="button"
                                    class="hover">Continuar</a></p>

<br>


                            <p class="mb-0" style="color:black;">Ya tienes una cuenta? <a href="{{ route('login') }}"
                                        class="hover">login</a></p>
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
                    rol: 1,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(response) {

                    var id = response.data.id;
                    var rfc = response.data.rfc;
                    var nombre = response.data.nombre;
                    var id = response.data.id;
                    //$("#signupName").val(nombre);
                    if (response.code == 200) {
                        if (nombre != 0) {
                            $("#divempresaboton").show();
                            $("#divbotonregistro").hide();
                        } else {
                            $("#divempresaboton").hide();
                            $("#divbotonregistro").show();
                        }
                        $("#divempresa").show();
                        $("#botonempresa").html(nombre);
                        $("#idempresa").val(id);
                        $("#nombreempresa").val(nombre);
                    }
                }
            });

        });


        $("#divbotonregistro").click(function() {

            $('#formulario').append(` @include('auth.registerempresa')`);

            $("#divempresa").hide();
            $("#continuar").hide();
            $("#registroData").show();
            //$('#signupName').prop('readonly', true);
            $('#buscarfc').prop('readonly', true);
            $('#buscarfc').prop('disabled', true);
            var rfc = $("#buscarfc").val();
            $("#signuprfc").val(rfc);

        });
        $("#divbotonregistroPrueba").click(function() {

            $('#formulario').append(` @include('auth.registerempresaprueba')`);

            $("#buscarfc").hide();
            $("#continuar").hide();
            $("#divempresa").hide();
            $("#registroData").show();
            //$('#signupName').prop('readonly', true);
            $('#buscarfc').prop('readonly', true);
            $('#buscarfc').prop('disabled', true);
            var rfc = $("#buscarfc").val();
            $("#signuprfc").val(rfc);

        });


        $("#botonempresa").click(function() {

            $('#formulario').append(` @include('auth.registerusuario')`);
            $("#divempresa").hide();
            $("#registroData").show();
            $("#continuar").hide();
            $("#registroUsuario").show();
            $('#buscarfc').prop('readonly', true);
            $('#buscarfc').prop('disabled', true);
            var nombreempresa = $("#nombreempresa").val();
            $("#empresanombre").val(nombreempresa);
            $("#empresa").val(nombreempresa);
            var idempresa = $("#idempresa").val();
            $("#empresaid").val(idempresa);
            var rfc = $("#buscarfc").val();
            $("#signuprfc").val(rfc);




        });

















    });
</script>
