<section class="section banners">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="card info-card">
                    <div class="card-header card-header-border-bottom">
                        @if (!$data->id)
                            <h5>Agregar Nuevo Usuario</h5>
                        @else
                            <h2>Ver Empresa #{{ $data->id }}</h2>
                        @endif
                    </div>

                    <div class="row ec-vendor-uploads">
                        <div class="col-lg-12">
                            @include('alerts')
                            <div class="ec-vendor-upload-detail">

                                <form class="text-start mb-3" method="POST" enctype="multipart/form-data"
                                    action="{{ route('register_post') }}">
                                    @csrf
                                    <input id="empresaid" type="hidden"  name="empresaid">
                                    <input id="signuprfc" name="rfc" type="hidden">
                                    <input id="empresa" type="hidden" name="empresa">

                                    <div class="form-floating mb-4">

                                    </div>

                                    <div class="row">

                                        <div class="col-md-6  mb-2">
                                            <label for="buscarfc" >Empresa</label>
                                            <select name="rfc" id="buscarfc" class="form-control" required>
                                                <option value="">Seleccione</option>
                                                @foreach($empresas as $emp)
                                                    <option value="{{ $emp->rfc }}">{{ $emp->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>




                                          <div class="col-md-6  mb-2">
                                            <label for="signupName">Nombres</label>
                                            <input id="signupName" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ old('name') }}" required autocomplete="name" autofocus>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="row">
                                          <div class="col-md-6  mb-2">
                                            <label for="apellidoPaterno">Apellido paterno </label>
                                            <input id="apellidoPaterno" type="text" class="form-control"
                                                name="apellidoPaterno" value="{{ old('apellidoPaterno') }}" required>

                                        </div>
                                          <div class="col-md-6  mb-2">
                                            <label for="apellidoMaterno">Apellido materno </label>
                                            <input id="apellidoMaterno" type="text" class="form-control"
                                                name="apellidoMaterno" value="{{ old('apellidoMaterno') }}" required>

                                        </div>
                                    </div>

                                    <span class="d-block mt-2" style="font-size:12px;color:red;">
                                        Los archivos PDF no deben sobrepasar los 3 MB de tamaño..
                                    </span>
                                    <div class="row">
                                          <div class="col-md-6  mb-2">
                                            <label for="fotoGafete">Foto de gafete lado #1 </label>
                                            <input id="fotoGafete" type="file" class="form-control" name="fotoGafete"
                                                value="{{ old('fotoGafete') }}" accept=".png, .jpg, .jpeg" required>

                                        </div>
                                          <div class="col-md-6  mb-2">
                                            <label for="fotoGafete2">Foto de gafete lado #2 </label>
                                            <input id="fotoGafete2" type="file" class="form-control"
                                                name="fotoGafete2" value="{{ old('fotoGafete2') }}"
                                                accept=".png, .jpg, .jpeg" required>

                                        </div>
                                    </div>
                                    <div class="row">
                                          <div class="col-md-6  mb-2">
                                            <label for="fotoCredencial">Foto credencial de elector (INE) lado #1
                                            </label>
                                            <input id="fotoCredencial" type="file" class="form-control"
                                                name="fotoCredencial" value="{{ old('fotoCredencial') }}"
                                                accept=".png, .jpg, .jpeg" required>

                                        </div>
                                          <div class="col-md-6  mb-2">
                                            <label for="fotoCredencial2">Foto credencial de elector (INE) lado #2
                                            </label>
                                            <input id="fotoCredencial2" type="file" class="form-control"
                                                name="fotoCredencial2" value="{{ old('fotoCredencial2') }}"
                                                accept=".png, .jpg, .jpeg" required>

                                        </div>
                                    </div>

                                    <div class="row">
                                          <div class="col-md-6  mb-2">
                                            <label for="puestoEmpresa">Puesto que desempeña en la empresa </label>
                                            <input id="puestoEmpresa" type="text" class="form-control"
                                                name="puestoEmpresa" required>

                                        </div>
                                          <div class="col-md-6  mb-2">
                                            <label for="areaEmpresa">Área en la que se encuentra </label>
                                            <input id="areaEmpresa" type="text" class="form-control"
                                                name="areaEmpresa" required>

                                        </div>
                                    </div>
                                    <div class="row">
                                          <div class="col-md-6  mb-2">
                                            <label for="telefonoEmpresa">Teléfono de la empresa / extensión </label>
                                            <input id="telefonoEmpresa" type="text" class="form-control"
                                                name="telefonoEmpresa" value="{{ old('telefonoEmpresa') }}" required>

                                        </div>
                                          <div class="col-md-6  mb-2">
                                            <label for="phone">Celular personal</label>
                                            <input id="phone" type="text" class="form-control" name="phone"
                                                value="{{ old('phone') }}" required>

                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-6  mb-2">
                                        <label for="signupEmail">Email</label>
                                        <input id="signupEmail" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6  mb-2">
                                        <label for="direccionEmpresa">Dirección de empresa</label>
                                        <input id="direccionEmpresa" type="text" class="form-control"
                                            name="direccionEmpresa" value="{{ old('direccionEmpresa') }}" required>

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




                                    <div class="mt-2" style="justify-items: center;display: grid;padding:20px;">
                                        <button type="submit" class="btn btn-primary mb-2 btn-pill">
                                            Registrar Usuario
                                        </button>
                                    </div>

                                </form>






                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {

        $("#buscarfc").change(function() {
            var rfc = $("#buscarfc").val();
            console.log(rfc)
            $.ajax({
                url: '{{ route('register.rfc.usuario') }}',
                type: "GET",
                data: {
                    rfc: rfc,
                    rol: 1,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    var id = response.data.id;
                    var rfc = response.data.rfc;
                    var nombre = response.data.nombre;


                    $("#empresaid").val(id);
                    $("#signuprfc").val(rfc);
                    $("#empresa").val(nombre);
                }
            });

        });
    });
</script>
