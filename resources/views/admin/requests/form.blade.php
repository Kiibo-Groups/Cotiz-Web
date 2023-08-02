
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
                                <input type="hidden"  id="user_id" name="user_id" value="{{ $user }}">
                                <input type="hidden"  id="servicio_id" name="servicio_id" value="{{ $id }}">
                                <input type="hidden"  id="origen" name="origen" value="{{ $origen }}">
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="name" class="form-label">Documento </label>
                                        <input type="file" accept=".png, .jpg, .jpeg, .pdf" class="form-control slug-title"  id="documento" name="documento" required>
                                    </div>


                                    <div class="col-md-12">
                                        <label for="email" class="form-label">Descripción</label>
                                        <textarea class="form-control" placeholder="Escribe una breve descripcion" id="descripcion" name="descripcion" required></textarea>
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
