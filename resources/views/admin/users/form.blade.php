
<section class="section banners">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="card info-card">
                    <div class="card-header card-header-border-bottom">
                        @if(!$data->id)
                        <h2>Agregar Nuevo Usuario</h2>
                        @else
                        <h2>Editando Usuario #{{$data->id}}</h2>
                        @endif
                    </div>

                    <div class="row ec-vendor-uploads">
                        <div class="col-lg-8">
                            <div class="ec-vendor-upload-detail">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="name" class="form-label">Nombre</label>
                                        <input type="text" class="form-control slug-title"  id="name" name="name" value="{{$data->name}}">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="last_name" class="form-label">Apellidos</label>
                                        <input type="text" class="form-control slug-title" id="last_name" name="last_name" value="{{$data->last_name}}">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control slug-title" id="email" name="email" value="{{$data->email}}">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="company" class="form-label">Compañía</label>
                                        <input type="text" class="form-control slug-title" id="company" name="company" value="{{$data->company}}">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="job" class="form-label">Trabajo</label>
                                        <input type="text" class="form-control slug-title" id="job" name="job" value="{{$data->job}}">
                                    </div>

                                    @if(!$data->id)
                                    <div class="col-md-6">
                                        <label for="password" class="form-label">Asignar Contraseña</label>
                                        <input type="password" class="form-control slug-title" id="password" name="password" placeholder="Asignale una contraseña de acceso">
                                    </div>
                                    @endif

                                    <div class="col-md-12" style="margin-top:25px;">
                                        <label class="form-label">Descripción</label>
                                        <textarea class="form-control" rows="2" name="about">{{$data->about}}</textarea>
                                    </div>

                                    <div class="col-md-6" style="margin-top:25px;">
                                        <label class="form-label">Nivel</label>
                                        <select name="level" id="level" class="form-select" required="required">
                                            <option value="0" @if($data->level == 0) selected @endif>Cuenta gratis</option>
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

                        <div class="col-lg-4">
                            <div class="ec-vendor-img-upload">
                                <div class="ec-vendor-main-img">
                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type='file' id="img"  @if(!$data->id) required="required" @endif name="img" class="ec-image-upload" accept=".png, .jpg, .jpeg" />
                                            <label for="img">
                                                <img src="<?php echo asset('profile/img/icons/edit.svg') ?>" class="svg_img header_svg" alt="edit" />
                                            </label>
                                        </div>
                                        <div class="avatar-preview ec-preview">
                                            <div class="imagePreview ec-div-preview">
                                                @if($data->id)
                                                <img class="ec-image-preview" src="<?php echo asset('profile/img/'.$data->pic_profile) ?>" alt="usuario" />
                                                @else
                                                <img class="ec-image-preview" src="{{ asset('profile/img/user_profile.jpg') }}" alt="edit" />
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
