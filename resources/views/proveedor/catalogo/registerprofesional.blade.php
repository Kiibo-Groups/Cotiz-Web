


    <div class="row" style="margin-right:1px;margin-top:3px;">
        <div  class="col-md-6" >
            <label for="nombre">Nombre </label>
            <input id="nombre" type="text" class="form-control" name="nombre" required>

        </div>
        <div  class="col-md-6" >
            <label for="apellidoPaterno">Apellido paterno </label>
            <input id="apellidoPaterno" type="text" class="form-control" name="apellidoPaterno" required>

        </div>
    </div>

    <div class="row" style="margin-right:1px;margin-top:3px;">
        <div  class="col-md-6" >
            <label for="apellidoPaterno">Apellido paterno </label>
            <input id="apellidoPaterno" type="text" class="form-control" name="apellidoPaterno" required>

        </div>
        <div  class="col-md-6" >
            <label for="carrera">Carrera profesional </label>
            <input id="carrera" type="text" class="form-control" name="carrera" required>

        </div>
    </div>

    <div class="row" style="margin-right:1px;margin-top:3px;">
        <div  class="col-md-6" >
            <label for="especialidad">Especialidad </label>
            <input id="especialidad" type="text" class="form-control" name="especialidad" required>

        </div>
        <div  class="col-md-6" >
            <label for="carrera">Titulo o Carta pasante a color lado #1 </label>
            <input id="titulo1" type="file" class="form-control" name="titulo1"
            value="{{ old('titulo1') }}" accept=".png, .jpg, .jpeg" required>

        </div>
    </div>
    <div class="row" style="margin-right:1px;margin-top:3px;">

        <div  class="col-md-6" >
            <label for="titulo2">Titulo o Carta pasante a color lado #2 </label>
            <input id="titulo2" type="file" class="form-control" name="titulo2"
            value="{{ old('titulo2') }}" accept=".png, .jpg, .jpeg" required>

        </div>
        <div  class="col-md-6" >
            <label for="cedula1">Cedula profesional a color lado #1</label>
            <input id="cedula1" type="file" class="form-control" name="cdula1"
            value="{{ old('cdula1') }}" accept=".png, .jpg, .jpeg" required>

        </div>
    </div>

    <div class="row" style="margin-right:1px;margin-top:3px;">

        <div  class="col-md-6" >
            <label for="cedula2">Cedula profesional a color lado #2</label>
            <input id="cedula2" type="file" class="form-control" name="cdula2"
            value="{{ old('cdula2') }}" accept=".png, .jpg, .jpeg" required>

        </div>
        <div  class="col-md-6" >
            <label for="especialidad">Cedula profesional a color lado #1</label>
            <input id="titulo2" type="file" class="form-control" name="titulo2"
            value="{{ old('titulo2') }}" accept=".png, .jpg, .jpeg" required>

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

    <div class="form-floating mb-4">
        <input id="direccionEmpresa" type="text" class="form-control" name="direccionEmpresa" required >
        <label for="direccionEmpresa">Dirección de empresa</label>
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




