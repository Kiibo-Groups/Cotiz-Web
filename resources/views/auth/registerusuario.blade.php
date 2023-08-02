<form class="text-start mb-3" method="POST" enctype="multipart/form-data" action="{{ route('register_post') }}">
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
            <input id="apellidoPaterno" type="text" class="form-control" name="apellidoPaterno" value="{{ old('apellidoPaterno') }}" required>
            <label for="apellidoPaterno">Apellido paterno </label>
        </div>
        <div class="col-6 form-floating mb-4">
            <input id="apellidoMaterno" type="text" class="form-control" name="apellidoMaterno" value="{{ old('apellidoMaterno') }}" required>
            <label for="apellidoMaterno">Apellido materno </label>
        </div>
    </div>


    <div class="row">
        <div class="col-6 form-floating mb-4">
            <input id="fotoGafete" type="file" class="form-control" name="fotoGafete"
            value="{{ old('fotoGafete') }}" accept=".png, .jpg, .jpeg" required>
           <label for="fotoGafete">Foto de gafete lado #1 </label>
        </div>
        <div class="col-6 form-floating mb-4">
            <input id="fotoGafete2" type="file" class="form-control" name="fotoGafete2"
            value="{{ old('fotoGafete2') }}" accept=".png, .jpg, .jpeg" required>
            <label for="fotoGafete2">Foto de gafete lado #2 </label>
        </div>
    </div>
    <div class="row">
        <div class="col-6 form-floating mb-4">
            <input id="fotoCredencial" type="file" class="form-control" name="fotoCredencial"
            value="{{ old('fotoCredencial') }}" accept=".png, .jpg, .jpeg" required>
           <label for="fotoCredencial">Foto credencial de elector (INE)  lado #1 </label>
        </div>
        <div class="col-6 form-floating mb-4">
            <input id="fotoCredencial2" type="file" class="form-control" name="fotoCredencial2"
            value="{{ old('fotoCredencial2') }}" accept=".png, .jpg, .jpeg" required>
            <label for="fotoCredencial2">Foto credencial de elector (INE) lado #2 </label>
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
            <input id="telefonoEmpresa" type="text" class="form-control" name="telefonoEmpresa" value="{{ old('telefonoEmpresa') }}" required>
            <label for="telefonoEmpresa">Teléfono de la empresa / extensión </label>
        </div>
        <div class="col-6 form-floating mb-4">
            <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required>
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

    <div class="form-floating mb-4">
        <input id="direccionEmpresa" type="text" class="form-control" name="direccionEmpresa" value="{{ old('direccionEmpresa') }}" required >
        <label for="direccionEmpresa">Dirección de empresa</label>
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

    </div>



    <button type="submit" class="btn btn-info rounded-pill btn-login w-100 mb-2">
        Registrarme
    </button>
</form>

