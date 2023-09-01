
<section class="section banners">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header card-header-border-bottom">
                    @if(!$data->id)
                    <h2>Agregar Nuevo Banner</h2>
                    @else 
                    <h2>Editando Banner #{{$data->id}}</h2>
                    @endif
                </div> 
                
                <div class="row ec-vendor-uploads">
                    <div class="col-lg-4">
                        <div class="ec-vendor-img-upload">
                            <div class="ec-vendor-main-img">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">                                                           
                                        <input type='file' id="img"  @if(!$data->id) required="required" @endif name="img" class="ec-image-upload" accept=".png, .jpg, .jpeg" />
                                        <label for="img">
                                            <img src="<?php echo asset('public/profile/img/icons/edit.svg') ?>" class="svg_img header_svg" alt="edit" />
                                        </label>
                                    </div>
                                    <div class="avatar-preview ec-preview">
                                        <div class="imagePreview ec-div-preview">
                                            @if($data->id)
                                            <img class="ec-image-preview" src="<?php echo asset('public/profile/img/banner/'.$data->img) ?>" alt="banner" />
                                            @else 
                                            <img class="ec-image-preview" src="<?php echo asset('public/profile/img/banner/1.jpg') ?>" alt="edit" />
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
                                <div class="col-md-6">
                                    <label for="title" class="form-label">Titulo</label>
                                    <input type="text" class="form-control slug-title"  id="title" name="title" value="{{$data->title}}">
                                </div>

                                <div class="col-md-6">
                                    <label for="subtitle" class="form-label">SubTitulo</label>
                                    <input type="text" class="form-control slug-title" id="subtitle" name="subtitle" value="{{$data->subtitle}}">
                                </div>

                                <div class="col-md-12" style="margin-top:25px;">
                                    <label class="form-label">Descripción</label>
                                    <textarea class="form-control" rows="2" name="descript">{{$data->descript}}</textarea>
                                </div>

                                <div class="col-md-6" style="margin-top:25px;">
                                    <label class="form-label">Sección</label>
                                    <select name="position" id="position" class="form-select" required="required">
                                        <option value="0" @if($data->position == 0) selected @endif>Inicio (1920px * 800px)</option>
                                        <option value="1" @if($data->position == 1) selected @endif>Servicios (1920px * 800px)</option> 
                                    </select>
                                </div>

                                <div class="col-md-6" style="margin-top:25px;">
                                    <label class="form-label">Status</label>
                                    <select name="status" id="status" class="form-select" required="required">
                                        <option value="0" @if($data->status == 0) selected @endif>Inactivo</option>
                                        <option value="1" @if($data->status == 1) selected @endif>Activo</option>
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