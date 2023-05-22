
<section class="section providers">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header card-header-border-bottom">
                    @if(!$data->id)
                    <h2>Agregar Nuevo Proveedor</h2>
                    @else 
                    <h2>Editando Proveedor #{{$data->id}}</h2>
                    @endif
                </div> 
                
                <div class="row ec-vendor-uploads">
                    <div class="col-lg-4">
                        <div class="ec-vendor-img-upload">
                            <div class="ec-vendor-main-img">
                                <div class="avatar-upload">
                                    <label for="url" class="form-label" style="margin: 0 25px;">Imagen <small>(medidas 450px * 301px)</small></label>

                                    <div class="avatar-edit">                                                           
                                        <input type='file' id="img"  @if(!$data->id) required="required" @endif name="logo" class="ec-image-upload" accept=".png, .jpg, .jpeg" />
                                        <label for="img">
                                            <img src="<?php echo asset('profile/img/icons/edit.svg') ?>" class="svg_img header_svg" alt="edit" />
                                        </label>
                                    </div>
                                    <div class="avatar-preview ec-preview">
                                        <div class="imagePreview ec-div-preview">
                                            @if($data->id)
                                            <img class="ec-image-preview" src="<?php echo asset('assets/img/logos/'.$data->logo) ?>" style="height: 301px;" alt="cliente" />
                                            @else 
                                            <img class="ec-image-preview" src="<?php echo asset('profile/img/banner/1.jpg') ?>" style="height: 301px;" alt="edit" />
                                            @endif
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div> 
                    
                    <div class="col-lg-8">
                        <div class="ec-vendor-upload-detail">   
                            <div class="row g-3">
                                <div class="col-md-8">
                                    <label for="name" class="form-label">Nombre</label>
                                    <input type="text" class="form-control slug-title"  id="name" name="name" @if($data->id) value="{{ $data->name }}"@endif>
                                </div>
                                <div class="col-md-8">
                                    <label for="address" class="form-label">Direccion</label>
                                    <input type="text" class="form-control slug-title"  id="address" name="address" @if($data->id) value="{{ $data->address }}"@endif>
                                </div>
                                <div class="col-md-8">
                                    <label for="email" class="form-label">Correo</label>
                                    <input type="text" class="form-control slug-title"  id="email" name="email" @if($data->id) value="{{ $data->email }}"@endif>
                                </div>
                                <div class="col-md-8">
                                    <label for="phone" class="form-label">Telefono</label>
                                    <input type="text" class="form-control slug-title"  id="phone" name="phone" @if($data->id) value="{{ $data->phone }}"@endif>
                                </div> 

                                <div class="col-md-8" style="margin-top:25px;">
                                    <label class="form-label">Pais</label>
                                    <select name="country" id="country" class="form-select" required="required">
                                        <option value="MX">Mexico</option>
                                    </select>
                                </div> 
                            </div>

                            <div class="mt-5" style="justify-items: end;display: grid;padding:20px;">
                                <button type="submit" class="btn btn-primary mb-2 btn-pill">
                                    @if(!$data->id)
                                    Agregar
                                    @else 
                                    Actualizar
                                    @endif
                                </button>
                            </div>
                        </div>
                    </div> 
                </div>  
            </div>
        </div>
    </div>
</section>