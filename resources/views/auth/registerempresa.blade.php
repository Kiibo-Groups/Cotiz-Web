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
    <div class="form-floating mb-4">
        <input id="opinionPositiva" type="file" class="form-control" name="opinionPositiva" title="Opinión positiva"
        accept=".png, .jpg, .jpeg, .doc, .docx, .pdf" required>
        <label for="opinionPositiva">Opinión positiva</label>


    </div>
    <div class="form-floating mb-4">
        <input id="infoBancaria" type="file" class="form-control" name="infoBancaria"
            value="{{ old('infoBancaria') }}" accept=".png, .jpg, .jpeg, .doc, .docx, .pdf" required>
        <label for="infoBancaria">Información bancaria</label>
    </div>
    <div class="form-floating mb-4">
        <input id="constFiscal" type="file" class="form-control" name="constFiscal" value="{{ old('constFiscal') }}"
        accept=".png, .jpg, .jpeg, .doc, .docx, .pdf" required>
        <label for="constFiscal">Constancia de situación fiscal</label>
    </div>
    <div class="form-floating mb-4">
        <input id="domicilioFiscal" type="file" class="form-control" name="domicilioFiscal"
            value="{{ old('domicilioFiscal') }}" accept=".png, .jpg, .jpeg, .doc, .docx, .pdf" required>
        <label for="domicilioFiscal">Registro de Domiclio fiscal </label>
    </div>
    <div class="form-floating mb-4">
        <input id="numeroPlanta" type="file" class="form-control" name="numeroPlanta"
            value="{{ old('numeroPlanta') }}" accept=".png, .jpg, .jpeg, .doc, .docx, .pdf" required>
        <label for="numeroPlanta">Número de planta industrial </label>
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
