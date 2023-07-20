<div class="col-lg-12" style="margin-left: 8px">

    <div class="row" style="margin-right:1px;margin-top:3px;">
        <div class="col-md-6">
            <label for="nombre">Nombre </label>
            <input id="nombre" type="text" class="form-control" name="nombre" required>

        </div>
        <div class="col-md-6">
            <label for="apellidoPaterno">Apellido paterno </label>
            <input id="apellidoPaterno" type="text" class="form-control" name="apellidoPaterno" required>

        </div>
    </div>

    <div class="row" style="margin-right:1px;margin-top:3px;">
        <div class="col-md-6">
            <label for="apellidoMaterno">Apellido materno </label>
            <input id="apellidoMaterno" type="text" class="form-control" name="apellidoMaterno" required>


        </div>
        <div class="col-md-6">
            <label for="carrera">Carrera profesional </label>
            <input id="carrera" type="text" class="form-control" name="carrera" required>

        </div>
    </div>

    <div class="row" style="margin-right:1px;margin-top:18px;">
        <div class="col-md-6">
            <label for="especialidad">Especialidad </label>
            <input id="especialidad" type="text" class="form-control" name="especialidad" required>

        </div>
        <div class="col-md-6  mb-4">
            <label for="carrera">Titulo o Carta pasante a color lado #1 </label>
            <input id="titulo1" type="file" class="form-control" name="titulo1" value="{{ old('titulo1') }}"
                accept=".png, .jpg, .jpeg, .doc, .docx, .pdf" required>

        </div>
    </div>

</div>


<div class="col-lg-12" style="margin-left: 5px">

    <div class="row" style="margin-right:1px;margin-top:18px;">

        <div class="col-md-6">
            <label for="titulo2">Titulo o Carta pasante a color lado #2 </label>
            <input id="titulo2" type="file" class="form-control" name="titulo2" value="{{ old('titulo2') }}"
                accept=".png, .jpg, .jpeg, .doc, .docx, .pdf" required>

        </div>
        <div class="col-md-6">
            <label for="cedula1">Cedula profesional a color lado #1</label>
            <input id="cedula1" type="file" class="form-control" name="cedula1" value="{{ old('cedula1') }}"
                accept=".png, .jpg, .jpeg, .doc, .docx, .pdf" required>

        </div>
    </div>

    <div class="row" style="margin-right:1px;margin-top:18px;">

        <div class="col-md-6">
            <label for="cedula2">Cedula profesional a color lado #2</label>
            <input id="cedula2" type="file" class="form-control" name="cedula2" value="{{ old('cedula2') }}"
                accept=".png, .jpg, .jpeg, .doc, .docx, .pdf" required>

        </div>
        <div class="col-md-6">
            <label for="cv">CV actualizado a color</label>
            <input id="cv" type="file" class="form-control" name="cv" value="{{ old('cv') }}"
                accept=".png, .jpg, .jpeg, .doc, .docx, .pdf" required>

        </div>
    </div>

</div>





<div class="col-lg-12" style="margin-left: 8px">
    <div class="row" style="margin-right:1px;margin-top:18px;">
        <div class="col-md-6">
            <label for="fotoCredencial">Foto credencial de elector (INE) lado #1 </label>
            <input id="fotoCredencial" type="file" class="form-control" name="fotoCredencial"
                value="{{ old('fotoCredencial') }}" accept=".png, .jpg, .jpeg, .doc, .docx, .pdf" required>

        </div>
        <div class="col-md-6">
            <label for="fotoCredencial2">Foto credencial de elector (INE) lado #2 </label>
            <input id="fotoCredencial2" type="file" class="form-control" name="fotoCredencial2"
                value="{{ old('fotoCredencial2') }}" accept=".png, .jpg, .jpeg, .doc, .docx, .pdf" required>

        </div>
    </div>
</div>



<div class="col-lg-12" style="margin-left: 8px">
    <div class="row" style="margin-right:1px;margin-top:18px;">
        <div class="col-md-6">
            <label for="calle">Calle </label>
            <input id="calle" type="text" class="form-control" name="calle" required>

        </div>
        <div class="col-md-6">
            <label for="numeroCalle">Número </label>
            <input id="numeroCalle" type="text" class="form-control" name="numeroCalle" required>

        </div>
    </div>
</div>



<div class="col-lg-12" style="margin-left: 8px">
    <div class="row" style="margin-right:1px;margin-top:18px;">
        <div class="col-md-6">
            <label for="colonia">Colonia </label>
            <input id="colonia" type="text" class="form-control" name="colonia" required>

        </div>
        <div class="col-md-6">
            <label for="cp">C.P </label>
            <input id="cp" type="text" class="form-control" name="cp" required>

        </div>
    </div>
</div>
<div class="col-lg-12" style="margin-left: 8px">
    <div class="row" style="margin-right:1px;margin-top:18px;">
        <div class="col-md-6">
            <label for="municipio">Municipio </label>
            <input id="municipio" type="text" class="form-control" name="municipio" required>

        </div>
        <div class="col-md-6">
            <label for="delegación">Delegación </label>
            <input id="delegación" type="text" class="form-control" name="delegación" required>

        </div>
    </div>
</div>
<div class="col-lg-12" style="margin-left: 8px">
    <div class="row" style="margin-right:1px;margin-top:18px;">
        <div class="col-md-6">
            <label for="estado">Estado </label>
            <input id="estado" type="text" class="form-control" name="estado" required>

        </div>
        <div class="col-md-6">
            <label for="country">País </label>
            <input id="country" type="text" class="form-control" name="country" required>

        </div>
    </div>
</div>
<div class="col-lg-12" style="margin-left: 8px">
    <div class="row" style="margin-right:1px;margin-top:18px;">
        <div class="col-md-6">
            <label for="celular">Celular personal </label>
            <input id="celular" type="text" class="form-control" name="celular" required>

        </div>
        <div class="col-md-6">
            <label for="email">Email </label>
            <input id="email" type="text" class="form-control" name="email" required>

        </div>
    </div>
</div>

<div class="col-lg-12" style="margin-left: 8px">
    <div class="row" style="margin-right:1px;margin-top:18px;">
        <div class="col-md-6">
            <label for="fb">FB </label>
            <input id="fb" type="text" class="form-control" name="fb" required>

        </div>
        <div class="col-md-6">
            <label for="linkedin">LinkedIn </label>
            <input id="linkedin" type="text" class="form-control" name="linkedin" required>

        </div>
    </div>
</div>
<div class="col-lg-12" style="margin-left: 8px">
    <div class="row" style="margin-right:1px;margin-top:18px;">
        <div class="col-md-6">
            <label for="instagram">Instagram </label>
            <input id="instagram" type="text" class="form-control" name="instagram" required>

        </div>
        <div class="col-md-6">
            <label for="exitos">Descripción de
                casos de éxitos en su carrera
                profesional </label>
            <input id="exitos" type="file" class="form-control" name="exitos" accept=".png, .jpg, .jpeg, .doc, .docx, .pdf" required>

        </div>
    </div>
</div>
























<div class="col-lg-12" style="margin-left: 8px">





</div>
