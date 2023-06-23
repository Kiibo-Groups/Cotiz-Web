
<section class="section events">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        @if(!$data->id)
                        <h2>Agregar Nuevo Evento</h2>
                        @else 
                        <h2>Editando Evento #{{$data->id}}</h2>
                        @endif
                    </div> 
                    
                    <div class="row ec-vendor-uploads">
                        <div class="col-lg-12">
                            <div class="ec-vendor-upload-detail">   
                                <div class="row g-3">
                                    <div class="col-lg-4">
                                        <div class="ec-vendor-img-upload">
                                            <div class="ec-vendor-main-img">
                                                <div class="avatar-upload">
                                                    <div class="avatar-edit">                                                           
                                                        <input type='file' id="img"  @if(!$data->id) required="required" @endif name="img" class="ec-image-upload" multiple accept=".png, .jpg, .jpeg" />
                                                        <label for="img">
                                                            <img src="<?php echo asset('public/profile/img/icons/edit.svg') ?>" class="svg_img header_svg" alt="edit" />
                                                        </label>
                                                    </div>
                                                    <div class="avatar-preview ec-preview">
                                                        <div class="imagePreview ec-div-preview">
                                                            @if($data->id)
                                                            <img class="ec-image-preview" src="<?php echo asset('public/assets/img/photos/'.$data->img) ?>" style="height: 301px;"alt="banner" />
                                                            @else 
                                                            <img class="ec-image-preview" src="<?php echo asset('public/profile/img/banner/1.jpg') ?>" style="height: 301px;"alt="edit" />
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>
                                    </div> 

                                    <div class="col-lg-6">
                                        <div class="row g-3">
                                            <div class="col-lg-6 col-md-6">
                                                <label for="titulo" class="form-label">Titulo</label>
                                                <input type="text" class="form-control slug-titulo"  id="titulo" required name="titulo" value="{{$data->titulo}}">
                                            </div>
        
                                            <div class="col-lg-6 col-md-6">
                                                <label for="subtitulo" class="form-label">SubTitulo</label>
                                                <input type="text" class="form-control slug-title" id="subtitulo" required name="subtitulo" value="{{$data->subtitulo}}">
                                            </div>

                                            <div class="col-lg-6 col-md-6">
                                                <label for="lugar" class="form-label">Lugar</label>
                                                <input type="text" class="form-control slug-title" id="lugar" required name="lugar" value="{{$data->lugar}}">
                                            </div>
        
                                            <div class="col-lg-6 col-md-6">
                                                <label for="fecha" class="form-label">Fecha</label>
                                                <input type="date" class="form-control slug-title" id="fecha" required name="fecha" value="{{$data->fecha}}">
                                            </div>
        
                                            <div class="col-lg-6 col-md-6">
                                                <label for="hora" class="form-label">Hora</label>
                                                <input type="time" class="form-control slug-title" id="hora" required name="hora" value="{{$data->hora}}">
                                            </div>
        
                                            <div class="col-lg-6 col-md-6">
                                                <label class="form-label">Status</label>
                                                <select name="status" id="status" class="form-select" required="required">
                                                    <option value="1" @if($data->status == 1) selected @endif>Activo</option>
                                                    <option value="0" @if($data->status == 0) selected @endif>Inactivo</option>
                                                </select>
                                            </div> 

                                            <div class="col-lg-6 col-md-6">
                                                <label class="form-label">Nivel</label>
                                                <select name="level" id="level" class="form-select" required="required">
                                                    <option value="0" @if($data->level == 0) selected @endif>Cuenta gratis</option>
                                                    <option value="1" @if($data->level == 1) selected @endif>Light</option>
                                                    <option value="2" @if($data->level == 2) selected @endif>Thermal</option>
                                                    <option value="3" @if($data->level == 3) selected @endif>Chemical</option>
                                                    <option value="4" @if($data->level == 4) selected @endif>Motion</option>
                                                    <option value="5" @if($data->level == 5) selected @endif>Nuclear</option>
                                                </select>
                                            </div> 

                                            <div class="col-lg-6 col-md-6">
                                                <label for="code" class="form-label">Código de liberación</label>
                                                <input type="text" class="form-control slug-title" maxlength="8" id="code" name="code" required value="{{$data->code}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3" style="magin-top:25px;">
                                    <div class="col-md-12"> 
                                        <textarea class="tinymce-editor"  name="descript" id="descript">{{$data->descript}}</textarea>
                                    </div>  
                                </div> 
                            </div>
                        </div> 

                        <div class="col-lg-12 mt-5" style="justify-items: end;display: grid;">
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
</section>