
<section class="section events">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        @if(!$data->id)
                        <h2>Agregar Nuevo Mentor</h2>
                        @else 
                        <h2>Editando mentor #{{$data->id}}</h2>
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
                                                            <img class="ec-image-preview" src="<?php echo asset('public/assets/img/mentors/'.$data->img) ?>" style="height: 301px;"alt="mentor" />
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
                                                <label for="nombre" class="form-label">Nombre</label>
                                                <input type="text" class="form-control slug-nombre"  id="nombre" name="nombre" value="{{$data->nombre}}">
                                            </div>
        
                                            <div class="col-lg-6 col-md-6">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="text" class="form-control slug-email" id="email" name="email" value="{{$data->email}}">
                                            </div>

                                            <div class="col-lg-6 col-md-6">
                                                <label for="facebook" class="form-label">Facebook</label>
                                                <input type="text" class="form-control slug-facebook"  id="facebook" name="facebook" value="{{$data->facebook}}">
                                            </div>
        
                                            <div class="col-lg-6 col-md-6">
                                                <label for="twitter" class="form-label">Twitter</label>
                                                <input type="text" class="form-control slug-twitter" id="twitter" name="twitter" value="{{$data->twitter}}">
                                            </div>
                                            
                                            <div class="col-lg-6 col-md-6">
                                                <label for="instagram" class="form-label">Instagram</label>
                                                <input type="text" class="form-control slug-instagram" id="instagram" name="instagram" value="{{$data->instagram}}">
                                            </div>

                                            <div class="col-lg-6 col-md-6">
                                                <label class="form-label">Status</label>
                                                <select name="status" id="status" class="form-select" required="required">
                                                    <option value="1" @if($data->status == 1) selected @endif>Activo</option>
                                                    <option value="0" @if($data->status == 0) selected @endif>Inactivo</option>
                                                </select>
                                            </div> 
                                        </div>
                                        <br />

                                        <div class="row g-3">
                                            <div class="col-lg-12 col-md-12">
                                                <label class="form-label">Descripción</label>
                                                <textarea class="form-control" name="descript" id="descript">{{$data->descript}}</textarea>
                                            </div> 
                                        </div>
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