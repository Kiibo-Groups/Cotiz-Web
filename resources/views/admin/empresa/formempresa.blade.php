
<section class="section banners">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="card info-card">
                    <div class="card-header card-header-border-bottom">
                        @if(!$data->id)
                        <h5>Agregar Nueva Empresa</h5>
                        @else
                        <h2>Ver Empresa #{{$data->id}}</h2>
                        @endif
                    </div>

                    <div class="row ec-vendor-uploads">
                        <div class="col-lg-12">
                            @include('alerts')
                            <div class="ec-vendor-upload-detail">
                                <form class="text-start mb-3" method="POST" enctype="multipart/form-data" action="{{ route('register_empresa') }}">
                                    @csrf


                                    <div class="row">
                                    <div class="col-md-6  mb-2">
                                        <label for="signupName">Nombre</label>
                                        <input id="signupName" type="text" class="form-control slug-title" name="nombre"
                                            value="{{ old('nombre') }}" required autocomplete="nombre">

                                    </div>
                                    <div class="col-md-6  mb-2">
                                        <label for="rfc">RFC</label>
                                        <input id="rfc" type="text" class="form-control slug-title" name="rfc"
                                            value="{{ old('rfc') }}" required autocomplete="rfc">

                                    </div>
                                    </div>


                                    <span class="d-block mt-2" style="font-size:12px;color:red;">
                                        Los archivos PDF no deben sobrepasar los 3 MB de tamaño..
                                    </span>

                                    <div class="row">
                                        <div class="col-md-6  mb-2">
                                            <label for="opinionPositiva">Opinión positiva</label>
                                            <input id="opinionPositiva" type="file" class="form-control" name="opinionPositiva"
                                                title="Opinión positiva" accept=".pdf" required>



                                        </div>
                                       <div class="col-md-6  mb-2">
                                        <label for="infoBancaria">Información bancaria</label>
                                            <input id="infoBancaria" type="file" class="form-control" name="infoBancaria"
                                                value="{{ old('infoBancaria') }}" accept=".pdf" required>

                                        </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6  mb-2">
                                        <label for="constFiscal">Constancia de situación fiscal</label>
                                            <input id="constFiscal" type="file" class="form-control" name="constFiscal"
                                                value="{{ old('constFiscal') }}" accept=".pdf" required>

                                        </div>
                                       <div class="col-md-6  mb-2">
                                        <label for="domicilioFiscal">Registro de Domiclio fiscal </label>
                                            <input id="domicilioFiscal" type="file" class="form-control" name="domicilioFiscal"
                                                value="{{ old('domicilioFiscal') }}" accept=".pdf" required>

                                        </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6  mb-2">
                                        <label for="numeroPlanta">Número de planta industrial </label>
                                            <input id="numeroPlanta" type="text" class="form-control" name="numeroPlanta"
                                                value="{{ old('numeroPlanta') }}" required>

                                        </div>
                                       <div class="col-md-6  mb-2">
                                        <label for="signupEmail">Email</label>
                                            <input id="signupEmail" type="email" class="form-control @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>




                                    <div class="row ">
                                        <div class="col-md-6  input-group mb-2" style="float: left">


                                            <input id="password"  type="password" class="form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="new-password" placeholder="Contraseña">



                                            <button type="button" class="btn btn-outline-primary" onmousedown="$('#password').attr('type','text');"
                                                onmouseup="$('#password').attr('type','password');"> <i class="bi bi-eye-slash"></i></button>


                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>


                                        <div class="col-6  input-group  mb-2" style="float: right">

                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                                                autocomplete="new-password" placeholder="Confirmar Contraseña">


                                            <button type="button" class="btn  btn-outline-primary" onmousedown="$('#password-confirm').attr('type','text');"
                                            onmouseup="$('#password-confirm').attr('type','password');"> <i
                                                class="bi bi-eye-slash"></i></button>
                                        </div>

                                    </div>



                                    <div class="row">
                                       <div class="col-md-6  mb-2">
                                        <label for="calle">Calle </label>
                                            <input id="calle" type="text" class="form-control" name="calle" value="{{ old('calle') }}"
                                                required>

                                        </div>
                                       <div class="col-md-6  mb-2">
                                        <label for="numeroCalle">Número </label>
                                            <input id="numeroCalle" type="text" class="form-control" name="numeroCalle"
                                                value="{{ old('numeroCalle') }}" required>

                                        </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6  mb-2">
                                        <label for="colonia">Colonia </label>
                                            <input id="colonia" type="text" class="form-control" name="colonia"
                                                value="{{ old('colonia') }}"required>

                                        </div>
                                       <div class="col-md-6  mb-2">
                                        <label for="cp">C.P </label>
                                            <input id="cp" type="text" class="form-control" name="cp" value="{{ old('cp') }}"
                                                required>

                                        </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6  mb-2">
                                        <label for="municipio">Municipio </label>
                                            <input id="municipio" type="text" class="form-control" name="municipio"
                                                value="{{ old('municipio') }}" required>

                                        </div>
                                       <div class="col-md-6  mb-2">
                                        <label for="delegación">Delegación </label>
                                            <input id="delegación" type="text" class="form-control" name="delegación"
                                                value="{{ old('delegación') }}" required>

                                        </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6  mb-2">
                                        <label for="estado">Estado </label>
                                            <input id="estado" type="text" class="form-control" name="estado" value="{{ old('estado') }}"
                                                required>

                                        </div>
                                       <div class="col-md-6  mb-2">
                                        <label for="pais">País </label>
                                            <input id="pais" type="text" class="form-control" name="pais" value="{{ old('pais') }}"
                                                required>

                                        </div>
                                    </div>

                                    <div class="form-control mb-2">
                                        <label for="actividadPPal">Descripción de actividad principal de la empresa</label>
                                        <textarea name="actividadPPal" id="actividadPPal" rows="3" class="form-control" maxlength="500"
                                            value="{{ old('actividadPPal') }}" required></textarea>

                                    </div>




                                    <div class="mt-2" style="justify-items: center;display: grid;padding:20px;">
                                        <button type="submit" class="btn btn-primary mb-2 btn-pill">
                                            Registrar Empresa
                                        </button>
                                    </div>

                                    <form>






                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
