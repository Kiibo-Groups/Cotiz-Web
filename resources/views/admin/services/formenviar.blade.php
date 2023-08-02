
<section class="section banners">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="card info-card">
                    <div class="card-header card-header-border-bottom">

                        <h4>Agregar Nueva Solicitud</h4>

                    </div>

                    <div class="row ec-vendor-uploads">
                        <div class="col-lg-12">
                            @include('alerts')
                            <div class="ec-vendor-upload-detail">

                                <input type="hidden" name="solicitud" value="3">
                                <input type="hidden"  id="proveedor" name="proveedor" value="{{ $prove }}">
                                <input type="hidden"  id="user_id" name="user_id" value="{{ $user }}">
                                <input type="hidden" name="services_id" value="{{ $id }}">
                                <input type="hidden" name="status" value="0">

                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="document" class="form-label">Documento </label>
                                        <input type="file" accept=".png, .jpg, .jpeg, .pdf" class="form-control slug-title"  id="document" name="document" required>
                                    </div>


                                    <div class="col-md-12">
                                        <label for="description" class="form-label">Descripción</label>
                                        <textarea class="form-control" placeholder="Escribe una breve descripcion" id="description" name="description" required></textarea>
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
