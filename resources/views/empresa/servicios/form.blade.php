<section class="section banners">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="card info-card">
                    <div class="card-header card-header-border-bottom">

                        <h3>Agregar Nuevo Documento</h3>

                    </div>

                    <div class="row ec-vendor-uploads">
                        <div class="col-lg-12">
                            <div class="ec-vendor-upload-detail">
                                <input type="hidden" id="user_id" name="user_id" value="{{ $user }}">
                                <input type="hidden" id="servicio_id" name="servicio_id" value="{{ $id }}">
                                <input type="hidden" id="origen" name="origen" value="{{ $origen }}">
                                <div class="row mb-3">
                                    @error('documento')
                                        <hr />
                                        <br />
                                        <div class="alert alert-success alert-dismissible fade show" role="alert"
                                            style="background-color: red; color: white;  text-align: center;">
                                            <h1 class="mb-0 text-success" style="font-size: 25px"> Debes subir un archivo
                                                menor o igual a 3M.
                                            </h1>
                                        </div>
                                        <br />
                                        <hr />
                                    @enderror
                                    <div class="col-md-12">
                                        <label for="name" class="form-label">Documento  (Debes subir un archivo menor o igual a 3M.)</label>
                                        <input type="file" class="form-control slug-title" id="documento"
                                            name="documento" required>
                                    </div>


                                    <div class="col-md-12">
                                        <label for="email" class="form-label">Descripción</label>
                                        <textarea class="form-control" placeholder="Escribe una breve descripcion" id="descripcion" name="descripcion" maxlength="255"  required></textarea>
                                    </div>

                                </div>


                                <div class="mt-5" style="justify-items: end;display: grid;padding:20px;">
                                    <button type="submit" class="btn btn-primary mb-2 btn-pill">

                                        Agregar

                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
