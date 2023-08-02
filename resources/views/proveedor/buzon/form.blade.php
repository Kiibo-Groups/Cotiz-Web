<section class="section container services">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header card-header-border-bottom">

                    <h4>Agregar Nuevo Buzón</h4>

                </div>
                <div class="row ec-vendor-uploads">
                    <div class="col-lg-1">

                    </div>

                    <div class="col-lg-10">
                        @include('alerts')
                        <div class="ec-vendor-upload-detail">
                            <div class="row g-3">
                                <input type="hidden" class="form-control slug-title"   name="admin_id" value="{{ $user }}">
                                <input type="hidden" class="form-control slug-title"   name="origen" value="{{ $origen }}">
                                <div class="col-md-12">

                                    <label for="provider" class="form-label">Proveedor</label>
                                    <select name="prove_id" id="prove_id" class="form-select js-example-basic-single" required>

                                            @foreach ($providers as $provider)
                                                <option value="{{ $provider->id }}">{{ $provider->nombre }}</option>
                                            @endforeach
                                    </select>
                                </div>

                                <div class="col-md-12" style="margin-top:25px;">
                                    <label for="descripcion">Descripcion</label>
                                    <textarea class="form-control" placeholder="Escribe una breve descripcion" id="descripcion" name="descripcion" required>{{ $data->description }}</textarea>
                                </div>

                                <div class="col-md-12">
                                    <label for="documento" class="form-label">Documento</label>
                                    <input type="file" accept=".png, .jpg, .jpeg, .pdf"  class="form-control slug-title"  id="documento" name="documento" required>
                                </div>

                            </div>

                            <div class="mt-5" style="justify-items: end;display: grid;padding:20px;">
                                <button type="submit" class="btn btn-primary text-white rounded">

                                    Agregar

                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
