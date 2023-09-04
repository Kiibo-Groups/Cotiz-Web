<form class="text-start mb-3" method="POST" enctype="multipart/form-data" action="{{ route('register_empresa') }}">
    @csrf



    <div class="form-floating mb-4">
        <input id="signupName" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre"
            value="{{ old('nombre') }}" required autocomplete="nombre">
        <label for="signupName">Nombre</label>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <input id="signuprfc" name="rfc" type="hidden">

    <span class="d-block mt-1" style="font-size:12px;color:red;">
        Los archivos PDF no deben sobrepasar los 3 MB de tamaño..
    </span>

    <div class="row">

        <div class="col-lg-6 form-floating mb-3">
            <input id="opinionPositiva" type="file" class="form-control" name="opinionPositiva"
                title="Opinión positiva" accept=".pdf" required>
            <label for="opinionPositiva">Opinión positiva</label>


        </div>
        <div class="col-lg-6 form-floating mb-3">
            <input id="infoBancaria" type="file" class="form-control" name="infoBancaria"
                value="{{ old('infoBancaria') }}" accept=".pdf" required>
            <label for="infoBancaria">Información bancaria</label>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 form-floating mb-3">
            <input id="constFiscal" type="file" class="form-control" name="constFiscal"
                value="{{ old('constFiscal') }}" accept=".pdf" required>
            <label for="constFiscal">Constancia de situación fiscal</label>
        </div>
        <div class="col-lg-6 form-floating mb-3">
            <input id="domicilioFiscal" type="file" class="form-control" name="domicilioFiscal"
                value="{{ old('domicilioFiscal') }}" accept=".pdf" required>
            <label for="domicilioFiscal">Registro de Domiclio fiscal </label>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 form-floating mb-3">
            <input id="numeroPlanta" type="text" class="form-control" name="numeroPlanta"
                value="{{ old('numeroPlanta') }}" required>
            <label for="numeroPlanta">Número de planta industrial </label>
        </div>
        <div class="col-lg-6 form-floating mb-3">
            <input id="signupEmail" type="email" class="form-control @error('email') is-invalid @enderror"
                name="email" value="{{ old('email') }}" required autocomplete="email">
            <label for="signupEmail">Email</label>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

    </div>




    <div class="row ">
        <div class="col-lg-6 form-floating input-group mb-3">

            <input id="password"  type="password" class="form-control @error('password') is-invalid @enderror"
                name="password" required autocomplete="new-password">

            <label for="signupPass">Contraseña </label>

            <button type="button" class="btn btn-outline-primary" onmousedown="$('#password').attr('type','text');"
                onmouseup="$('#password').attr('type','password');"> <i class="bi bi-eye-slash"></i></button>


            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        <div class="col-lg-6  form-floating input-group  mb-3" style="float: right">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                autocomplete="new-password">
            <label for="signupPass">Confirmar Contraseña</label>

            <button type="button" class="btn btn-outline-primary" onmousedown="$('#password-confirm').attr('type','text');"
            onmouseup="$('#password-confirm').attr('type','password');"> <i
                class="bi bi-eye-slash"></i></button>
        </div>

    </div>







    <div class="row">
       <div class="col-lg-6 form-floating mb-3">
            <input id="calle" type="text" class="form-control" name="calle" value="{{ old('calle') }}"
                required>
            <label for="calle">Calle </label>
        </div>
       <div class="col-lg-6 form-floating mb-3">
            <input id="numeroCalle" type="text" class="form-control" name="numeroCalle"
                value="{{ old('numeroCalle') }}" required>
            <label for="numeroCalle">Número </label>
        </div>
    </div>
    <div class="row">
       <div class="col-lg-6 form-floating mb-3">
            <input id="colonia" type="text" class="form-control" name="colonia"
                value="{{ old('colonia') }}"required>
            <label for="colonia">Colonia </label>
        </div>
       <div class="col-lg-6 form-floating mb-3">
            <input id="cp" type="text" class="form-control" name="cp" value="{{ old('cp') }}"
                required>
            <label for="cp">C.P </label>
        </div>
    </div>
    <div class="row">
       <div class="col-lg-6 form-floating mb-3">
            <input id="municipio" type="text" class="form-control" name="municipio"
                value="{{ old('municipio') }}" required>
            <label for="municipio">Municipio </label>
        </div>
       <div class="col-lg-6 form-floating mb-3">
            <input id="delegación" type="text" class="form-control" name="delegación"
                value="{{ old('delegación') }}" required>
            <label for="delegación">Delegación </label>
        </div>
    </div>
    <div class="row">
       <div class="col-lg-6 form-floating mb-3">
            <input id="estado" type="text" class="form-control" name="estado" value="{{ old('estado') }}"
                required>
            <label for="estado">Estado </label>
        </div>
       <div class="col-lg-6 form-floating mb-3">
            <input id="pais" type="text" class="form-control" name="pais" value="{{ old('pais') }}"
                required>
            <label for="pais">País </label>
        </div>
    </div>

    <div class="col-lg-12 form-floating mb-3">
        <textarea name="actividadPPal" id="actividadPPal" rows="3" class="form-control"
            value="{{ old('actividadPPal') }}" required></textarea>
        <label for="actividadPPal">Descripción de actividad principal de la empresa</label>
    </div>


    <button type="submit" class="btn btn-info rounded-pill btn-login w-100 mb-2">
        Registrar Empresa
    </button>

    <form>



