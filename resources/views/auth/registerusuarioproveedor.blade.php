<form class="text-start mb-3" method="POST" enctype="multipart/form-data" action="{{ route('register_post_proveedor_usuario') }}">
    @csrf
    <input id="empresaid" type="hidden" class="form-control" name="empresaid" >
    <input id="signuprfc" name="rfc" type="hidden">
    <input id="empresa" type="hidden"  name="empresa" >

    <div class="form-floating mb-4">

    </div>



    <div class="row">
        <div class="col-6 form-floating mb-4">
            <input id="empresanombre" type="text" class="form-control" name="empresanombre"
            disabled readonly>

            <label for="numeroPlanta">Nombre Empresa </label>
        </div>
        <div class="col-6 form-floating mb-4">
            <input id="signupName" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            <label for="signupName">Nombres</label>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

    </div>

    <div class="row">
        <div class="col-6 form-floating mb-4">
            <input id="apellidoPaterno" type="text" class="form-control" name="apellidoPaterno" required>
            <label for="apellidoPaterno">Apellido paterno </label>
        </div>
        <div class="col-6 form-floating mb-4">
            <input id="apellidoMaterno" type="text" class="form-control" name="apellidoMaterno" required>
            <label for="apellidoMaterno">Apellido materno </label>
        </div>
    </div>


    <div class="row">
        <div class="col-6 form-floating mb-4">
            <input id="fotoGafete" type="file" class="form-control" name="fotoGafete"
            value="{{ old('fotoGafete') }}" accept=".png, .jpg, .jpeg, .doc, .docx, .pdf" required>
           <label for="fotoGafete">Foto de gafete ambos lados </label>
        </div>
        <div class="col-6 form-floating mb-4">
            <input id="fotoCredencial" type="file" class="form-control" name="fotoCredencial"
            value="{{ old('fotoCredencial') }}" accept=".png, .jpg, .jpeg, .doc, .docx, .pdf" required>
            <label for="fotoCredencial">Foto credencial de elector (INE) ambos lados </label>
        </div>
    </div>

    <div class="row">
        <div class="col-6 form-floating mb-4">
            <input id="puestoEmpresa" type="text" class="form-control" name="puestoEmpresa" required>
            <label for="puestoEmpresa">Puesto que desempeña en la empresa </label>
        </div>
        <div class="col-6 form-floating mb-4">
            <input id="areaEmpresa" type="text" class="form-control" name="areaEmpresa" required>
            <label for="areaEmpresa">Área en la que se encuentra </label>
        </div>
    </div>
    <div class="row">
        <div class="col-6 form-floating mb-4">
            <input id="telefonoEmpresa" type="text" class="form-control" name="telefonoEmpresa" required>
            <label for="telefonoEmpresa">Teléfono de la empresa / extensión </label>
        </div>
        <div class="col-6 form-floating mb-4">
            <input id="phone" type="text" class="form-control" name="phone" required>
            <label for="phone">Celular personal</label>
        </div>
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
    <div class="row">
        <div class="col-6 form-floating mb-4">
            <input id="signupPass" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            <label for="signupPass">Contraseña</label>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-6 form-floating mb-4">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            <label for="signupPass">Confirmar Contraseña</label>
        </div>
    </div>

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
            <input id="country" type="text" class="form-control" name="country" required>
            <label for="country">País </label>
        </div>
    </div>

    <button type="submit" class="btn btn-info rounded-pill btn-login w-100 mb-2">
        Registrarme
    </button>
</form>

