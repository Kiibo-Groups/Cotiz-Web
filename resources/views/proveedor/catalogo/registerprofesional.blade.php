<div class="col-lg-12" style="margin-left: 8px">

    <div class="row" style="margin-right:1px;margin-top:3px;">
        <div class="col-md-6">
            <label for="nombre">Nombre </label>
            <input id="nombre" type="text" class="form-control" name="nombre"  @if ($data->id) value="{{ $data->nombre }}" @endif required>

        </div>
        <div class="col-md-6">
            <label for="apellidoPaterno">Apellido paterno </label>
            <input id="apellidoPaterno" type="text" class="form-control" name="apellidoPaterno"  @if ($data->id) value="{{ $data->apellidoPaterno }}"  @endif required>

        </div>
    </div>

    <div class="row" style="margin-right:1px;margin-top:3px;">
        <div class="col-md-6">
            <label for="apellidoMaterno">Apellido materno </label>
            <input id="apellidoMaterno" type="text" class="form-control" name="apellidoMaterno"  @if ($data->id) value="{{ $data->apellidoMaterno }}"  @endif required>


        </div>
        <div class="col-md-6">
            <label for="carrera">Carrera profesional <span style="color: red;font-size:14px">(Campo utilizado para filtrar catálogo)</span> </label>
            <input id="carrera" type="text" class="form-control" name="carrera"  @if ($data->id) value="{{ $data->carrera }}"  @endif required>

        </div>
    </div>

    <div class="row" style="margin-right:1px;margin-top:18px;">
        <div class="col-md-6">
            <label for="especialidad">Especialidad <span  style="color: red;font-size:14px">(Campo utilizado para filtrar catálogo)</span> </label>
            <input id="especialidad" type="text" class="form-control" name="especialidad"  @if ($data->id) value="{{ $data->especialidad }}"  @endif required>

        </div>
        <div class="col-md-6  mb-4">
            <label for="carrera">Titulo o Carta pasante a color lado #1 </label>
            <input id="titulo1" type="file" class="form-control" name="titulo1" value="{{ old('titulo1') }}"
                accept=".png, .jpg, .jpeg" @if (!$data->id) required  @endif>

        </div>
    </div>

</div>


<div class="col-lg-12" style="margin-left: 5px">

    <div class="row" style="margin-right:1px;margin-top:18px;">

        <div class="col-md-6">
            <label for="titulo2">Titulo o Carta pasante a color lado #2 </label>
            <input id="titulo2" type="file" class="form-control" name="titulo2" value="{{ old('titulo2') }}"
                accept=".png, .jpg, .jpeg" @if (!$data->id) required  @endif>

        </div>
        <div class="col-md-6">
            <label for="cedula1">Cedula profesional a color lado #1</label>
            <input id="cedula1" type="file" class="form-control" name="cedula1" value="{{ old('cedula1') }}"
                accept=".png, .jpg, .jpeg" @if (!$data->id) required  @endif>

        </div>
    </div>

    <div class="row" style="margin-right:1px;margin-top:18px;">

        <div class="col-md-6">
            <label for="cedula2">Cedula profesional a color lado #2</label>
            <input id="cedula2" type="file" class="form-control" name="cedula2" value="{{ old('cedula2') }}"
                accept=".png, .jpg, .jpeg" @if (!$data->id) required  @endif>

        </div>
        <div class="col-md-6">
            <label for="cv">CV actualizado a color</label>
            <input id="cv" type="file" class="form-control" name="cv" value="{{ old('cv') }}"
                accept=" .pdf" @if (!$data->id) required  @endif>

        </div>
    </div>

</div>





<div class="col-lg-12" style="margin-left: 8px">
    <div class="row" style="margin-right:1px;margin-top:18px;">
        <div class="col-md-6">
            <label for="fotoCredencial">Foto credencial de elector (INE) lado #1 </label>
            <input id="fotoCredencial" type="file" class="form-control" name="fotoCredencial"
                value="{{ old('fotoCredencial') }}" accept=".png, .jpg, .jpeg" @if (!$data->id) required  @endif>

        </div>
        <div class="col-md-6">
            <label for="fotoCredencial2">Foto credencial de elector (INE) lado #2 </label>
            <input id="fotoCredencial2" type="file" class="form-control" name="fotoCredencial2"
                value="{{ old('fotoCredencial2') }}" accept=".png, .jpg, .jpeg" @if (!$data->id) required  @endif>

        </div>
    </div>
</div>



<div class="col-lg-12" style="margin-left: 8px">
    <div class="row" style="margin-right:1px;margin-top:18px;">
        <div class="col-md-6">
            <label for="calle">Calle </label>
            <input id="calle" type="text" class="form-control" name="calle"  @if ($data->id) value="{{ $data->calle }}"  @endif required>

        </div>
        <div class="col-md-6">
            <label for="numeroCalle">Número </label>
            <input id="numeroCalle" type="text" class="form-control" name="numeroCalle"  @if ($data->id) value="{{ $data->numeroCalle }}"  @endif required>

        </div>
    </div>
</div>



<div class="col-lg-12" style="margin-left: 8px">
    <div class="row" style="margin-right:1px;margin-top:18px;">
        <div class="col-md-6">
            <label for="colonia">Colonia </label>
            <input id="colonia" type="text" class="form-control" name="colonia"  @if ($data->id) value="{{ $data->colonia }}"  @endif required>

        </div>
        <div class="col-md-6">
            <label for="cp">C.P </label>
            <input id="cp" type="text" class="form-control" name="cp"  @if ($data->id) value="{{ $data->cp }}"  @endif required>

        </div>
    </div>
</div>
<div class="col-lg-12" style="margin-left: 8px">
    <div class="row" style="margin-right:1px;margin-top:18px;">
        <div class="col-md-6">
            <label for="municipio">Municipio </label>
            <input id="municipio" type="text" class="form-control" name="municipio"  @if ($data->id) value="{{ $data->municipio }}"  @endif required>

        </div>
        <div class="col-md-6">
            <label for="delegación">Delegación </label>
            <input id="delegación" type="text" class="form-control" name="delegación"  @if ($data->id) value="{{ $data->delegación }}"  @endif required>

        </div>
    </div>
</div>
<div class="col-lg-12" style="margin-left: 8px">
    <div class="row" style="margin-right:1px;margin-top:18px;">
        <div class="col-md-6">
            <label for="estado">Estado </label>
            <input id="estado" type="text" class="form-control" name="estado"  @if ($data->id) value="{{ $data->estado }}"  @endif required>

        </div>
        <div class="col-md-6">
            <label for="country">País </label>
            <input id="country" type="text" class="form-control" name="country"  @if ($data->id) value="{{ $data->country }}"  @endif required>

        </div>
    </div>
</div>
<div class="col-lg-12" style="margin-left: 8px">
    <div class="row" style="margin-right:1px;margin-top:18px;">
        <div class="col-md-6">
            <label for="celular">Celular personal </label>
            <input id="celular" type="text" class="form-control" name="celular"  @if ($data->id) value="{{ $data->celular }}"  @endif required>

        </div>
        <div class="col-md-6">
            <label for="email">Email </label>
            <input id="email" type="text" class="form-control" name="email"  @if ($data->id) value="{{ $data->email }}"  @endif required>

        </div>
    </div>
</div>

<div class="col-lg-12" style="margin-left: 8px">
    <div class="row" style="margin-right:1px;margin-top:18px;">
        <div class="col-md-6">
            <label for="fb">FB </label>
            <input id="fb" type="text" class="form-control" name="fb"  @if ($data->id) value="{{ $data->fb }}"  @endif required>

        </div>
        <div class="col-md-6">
            <label for="linkedin">LinkedIn </label>
            <input id="linkedin" type="text" class="form-control" name="linkedin"  @if ($data->id) value="{{ $data->linkedin }}"  @endif required>

        </div>
    </div>
</div>
<div class="col-lg-12" style="margin-left: 8px">
    <div class="row" style="margin-right:1px;margin-top:18px;">
        <div class="col-md-6">
            <label for="instagram">Instagram </label>
            <input id="instagram" type="text" class="form-control" name="instagram"  @if ($data->id) value="{{ $data->instagram }}"  @endif required>

        </div>
        <div class="col-md-6">
            <label for="exitos">Descripción de
                casos de éxitos en su carrera
                profesional </label>
            <input id="exitos" type="file" class="form-control" name="exitos" accept=".png, .jpg, .jpeg, .doc, .docx, .pdf" >


        </div>
    </div>
</div>
























<div class="col-lg-12" style="margin-left: 8px">





</div>
