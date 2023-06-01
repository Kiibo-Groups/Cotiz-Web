
<section class="container providers flexs justify-center items-center">
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
                                        @error('logo')
                                        <div class="alert alert-danger" role="alert">
                                            Debes subir una imagen
                                          </div>
                                        @enderror
                                        <input type='file' style="display:none;" id="img" name="logo" class="ec-image-upload" accept=".png, .jpg, .jpeg" />
                                        <label for="img">
                                            <img src="<?php echo asset('profile/img/icons/edit.svg') ?>" class="svg_img header_svg" alt="edit" />
                                        </label>
                                    </div>
                                    <div class="avatar-preview ec-preview">
                                        <div class="imagePreview ec-div-preview">
                                            @if($data->id)
                                                @if($data->logo)
                                                    <img class="ec-image-preview" src="<?php echo asset('assets/img/logos/'.$data->logo) ?>" style="height: 301px;" alt="cliente" />
                                                @else
                                                    <img class="card-img" src="{{ asset('profile/img/user_profile.jpg') }}" alt="logo" />
                                                @endif
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
                                    @error('name')
                                        <div class="alert alert-danger" role="alert">
                                            Debes Agregar un nombre
                                        </div>
                                    @enderror
                                    <label for="name" class="form-label">Nombre</label>
                                    <input type="text" class="form-control slug-title"  id="name" name="name" @if($data->id) value="{{ $data->name }}"@endif>
                                </div>
                                <div class="col-md-8">
                                    @error('address')
                                        <div class="alert alert-danger" role="alert">
                                            Debes Agregar una direccion
                                        </div>
                                    @enderror
                                    <label for="address" class="form-label">Direccion</label>
                                    <textarea name="address" rows="4" cols="50" class="form-control">@if($data->id){{ $data->address }}@endif</textarea>
                                </div>
                                <div class="col-md-8">
                                    @error('email')
                                        <div class="alert alert-danger" role="alert">
                                            Debes Agregar un correo electronico
                                        </div>
                                    @enderror
                                    <label for="email" class="form-label">Correo</label>
                                    <input type="text" class="form-control slug-title"  id="email" name="email" @if($data->id) value="{{ $data->email }}"@endif>
                                </div>
                                <div class="col-md-8">+
                                    @error('phone')
                                        <div class="alert alert-danger" role="alert">
                                            Debes Agregar un telefono
                                        </div>
                                    @enderror
                                    <label for="phone" class="form-label">Telefono</label>
                                    <input type="text" class="form-control slug-title"  id="phone" name="phone" @if($data->id) value="{{ $data->phone }}"@endif>
                                </div>

                                <div class="col-md-8" style="margin-top:25px;">
                                    @error('country')
                                        <div class="alert alert-danger" role="alert">
                                            Debes Agregar un País
                                        </div>
                                    @enderror
                                    <label class="form-label">Pais</label>
                                    <select name="country" id="country" class="form-select js-example-basic-single">
                                        <option value="Mexico">Mexico</option>
                                    </select>
                                </div>
                                <div class="col-md-8" style="margin-top:25px;">
                                    @error('password')
                                        <div class="alert alert-danger" role="alert">
                                            Debes Agregar una contraseña
                                        </div>
                                    @enderror
                                    <label class="form-label">Contraseña</label>
                                    <input type="password" name="password" id="password" @if($data->id) value="{{ $data->user->shw_password }}"@endif class="form-control">
                                </div>
                                <div class="col-md-8" style="margin-top:25px;">
                                    <label class="form-label">Estado</label>
                                    <select name="status" id="status" class="form-select js-example-basic-single">
                                        <option value="1" @if($data->user->status === 1) selected @endif>Activo</option>
                                        <option value="0" @if($data->user->status === 0) selected @endif>Inactivo</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mt-5" style="justify-items: end;display: grid;padding:20px;">
                                <button type="submit" class="btn btn-primary text-white rounded">
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
