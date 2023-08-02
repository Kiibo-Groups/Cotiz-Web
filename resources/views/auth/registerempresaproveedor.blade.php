<form class="text-start mb-3" method="POST" enctype="multipart/form-data" action="{{ route('register_proveedor') }}">
    @csrf


    <div class="row">
        <div class="col-6 form-floating mb-4">
            <input id="signupName" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre"
                value="{{ old('nombre') }}" required autocomplete="nombre">
            <label for="signupName">Nombre</label>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-6 form-floating mb-4">
            <input id="constanciaPositiva" type="file" class="form-control" name="constanciaPositiva"
            value="{{ old('constanciaPositiva') }}" accept=".pdf" required>
            <label for="constanciaPositiva">Constancia de situación fiscal</label>
        </div>

    </div>
    <input id="signuprfc" name="rfc" type="hidden">

    <div class="row">
        <div class="col-6 form-floating mb-4">
            <input id="opinionPositiva" type="file" class="form-control" name="opinionPositiva" title="Opinión positiva"
            accept=" .pdf" required>
            <label for="opinionPositiva">Opinion Positiva actualizada</label>


        </div>
        <div class="col-6 form-floating mb-4">
            <input id="infoBancaria" type="file" class="form-control" name="infoBancaria"
                value="{{ old('infoBancaria') }}" accept=".pdf" required>
            <label for="infoBancaria">Información bancaria</label>
        </div>
    </div>
    <div class="row">
        <div class="col-6 form-floating mb-4">
            <input id="cartaAceptacion" type="file" class="form-control" name="cartaAceptacion" value="{{ old('cartaAceptacion') }}"
            accept=".png, .jpg, .jpeg, .doc, .docx, .pdf" required>
            <label for="cartaAceptacion">Carta de aceptación de crédito firmada </label>
        </div>
        <div class="col-6 form-floating mb-4">
            <input id="listadoProductos" type="file" class="form-control" name="listadoProductos"
                value="{{ old('listadoProductos') }}" accept=".pdf" required>
            <label for="listadoProductos">Listado de productos o servicios </label>
        </div>
    </div>
    <div class="row">
        <div class="col-6 form-floating mb-4">
            <input id="telefono" type="text" class="form-control" name="telefono"
            value="{{ old('telefono') }}"  required>
            <label for="telefono">Teléfono empresarial / extensión</label>
        </div>
        <div class="col-6 form-floating mb-4">
            <input id="signupEmail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            <label for="signupEmail">Email</label>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>



    <div class="row ">
        <div class="col-6 form-floating input-group mb-4">

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


        <div class="col-6 form-floating input-group  mb-4" style="float: right">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                autocomplete="new-password">
            <label for="signupPass">Confirmar Contraseña</label>

            <button type="button" class="btn btn-outline-primary" onmousedown="$('#password-confirm').attr('type','text');"
            onmouseup="$('#password-confirm').attr('type','password');"> <i
                class="bi bi-eye-slash"></i></button>
        </div>

    </div>v>
    <div class="row">
        <div class="col-6 form-floating mb-4">
            <input id="calle" type="text" class="form-control" name="calle" required>
            <label for="calle">Calle </label>
        </div>
        <div class="col-6 form-floating mb-4">
            <input id="numeroCalle" type="text" class="form-control" name="numeroCalle" required>
            <label for="numeroCalle">Número </label>
        </div>
    </div>
    <div class="row">
        <div class="col-6 form-floating mb-4">
            <input id="colonia" type="text" class="form-control" name="colonia" required>
            <label for="colonia">Colonia </label>
        </div>
        <div class="col-6 form-floating mb-4">
            <input id="cp" type="text" class="form-control" name="cp" required>
            <label for="cp">C.P </label>
        </div>
    </div>
    <div class="row">
        <div class="col-6 form-floating mb-4">
            <input id="municipio" type="text" class="form-control" name="municipio" required>
            <label for="municipio">Municipio </label>
        </div>
        <div class="col-6 form-floating mb-4">
            <input id="delegación" type="text" class="form-control" name="delegación" required>
            <label for="delegación">Delegación </label>
        </div>
    </div>
    <div class="row">
        <div class="col-6 form-floating mb-4">
            <input id="estado" type="text" class="form-control" name="estado" required>
            <label for="estado">Estado </label>
        </div>
        <div class="col-6 form-floating mb-4">
            <input id="pais" type="text" class="form-control" name="pais" required>
            <label for="pais">País </label>
        </div>
    </div>

    <div class="form-floating mb-4">
        <textarea name="actividadPPal" id="actividadPPal" rows="3" class="form-control"></textarea>
        <label for="actividadPPal">Descripción de actividad principal de la empresa</label>
    </div>


    <button type="submit" class="btn btn-info rounded-pill btn-login w-100 mb-2">
        Registrar Empresa
    </button>

<form>
