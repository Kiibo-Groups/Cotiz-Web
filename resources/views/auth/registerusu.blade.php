@extends('layouts.app')
@section('content')
    <section class=" bg-image bg-no-repeat bg-center bg-overlay bg-overlay-black-600 text-white py-md-16 "
        data-image-src="{{ asset('assets2/images/bg-login.jpg') }}"
        style="height:100vh; background-repeat: no-repeat;background-size: cover;">
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black"></div>
        <div class="container">
            <div class="row">
                <div class=" col-lg-7 col-xl-6 col-xxl-8 mx-auto">
                    <div class="card">
                        <div class="card-body p-11 text-center">
                            <h2>Regístrese en Cotiz</h2>
                            <p class="lead mb-6" style="color:black;">El registro toma menos de un minuto.</p>

                            <div class="form-floating mb-4">
                                <input id="buscarfc" type="text" class="form-control" name="rfc" required>
                                <input id="idempresa" type="hidden" class="form-control" name="idempresa" required>
                                <input id="nombreempresa" type="hidden" class="form-control" name="nombreempresa" required>

                                <label for="rfc">Buscar RFC</label>

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
                                <div class="col-6"style="float: right">
                                    <button type="submit" class="btn btn-info rounded-pill btn-login w-100 mb-2">
                                        Prueba
                                    </button>
                                </div>

                            </div>
                            @include('alerts')


                            <div id="registroUsuario"  class="registroUsuario">
                                <p></p>

                               @include('auth.registerusuario')
                            </div>


                            <p class="mb-0" style="color:black;">Ya tienes una cuenta? <a href="{{ route('login') }}"
                                    class="hover">Ingresar</a></p>
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

            $("#divempresa").hide();
            $("#registroData").show();
            //$('#signupName').prop('readonly', true);
            $('#buscarfc').prop('readonly', true);
            $('#buscarfc').prop('disabled', true);
            var rfc = $("#buscarfc").val();
            $("#signuprfc").val(rfc);

        });


        $("#botonempresa").click(function() {

           // $('p').html('registerusuario');

           window.location.href = "{{url('/register/usuario')}}"

          //$("#registroData").children().prop('disabled', true);
          $("#registroData").show();
          $("#registroData").remove();


            $("#divempresa").hide();
            $("#registroUsuario").show();
            $('#buscarfc').prop('readonly', true);
            $('#buscarfc').prop('disabled', true);
            var nombreempresa = $("#nombreempresa").val();
            $("#empresanombre").val(nombreempresa);
            var idempresa = $("#idempresa").val();
            $("#empresaid").val(idempresa);




        });


    });
</script>
