
<section class="section container services">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header card-header-border-bottom">
                    @if(!$data->id)
                    <h2>Agregar Nuevo Servicio</h2>
                    @else
                    <h2>Editando Servicio #{{$data->id}}</h2>
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
                                                Debes Agregar una imagen
                                            </div>
                                        @enderror
                                        <input type='file' id="img" name="logo" class="ec-image-upload" accept=".png, .jpg, .jpeg" />
                                        <label for="img">
                                            <img src="<?php echo asset('profile/img/icons/edit.svg') ?>" class="svg_img header_svg" alt="edit" />
                                        </label>
                                    </div>

                                    <div class="avatar-preview ec-preview">
                                        <div class="imagePreview ec-div-preview">
                                            @if($data->id)
                                            <img class="ec-image-preview" src="<?php echo asset('assets/img/logos/'.$data->logo) ?>" style="height: 301px;" alt="servicio" />
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
                                    @if (!Auth::guard('admin')->check())
                                        @foreach ( $providers as $provider )
                                            <input type="hidden" name="provider_id" value="{{ $provider->id }}">
                                        @endforeach
                                    @else
                                    @error('provider_id')
                                        <div class="alert alert-danger" role="alert">
                                            Debes agregar un Proveedor
                                        </div>
                                    @enderror
                                    <label for="provider" class="form-label">Proveedor</label>
                                    <select name="provider_id" id="provider" class="form-select js-example-basic-single">
                                        @if ($data->id)
                                            @foreach ($providers as $provider)
                                                <option value="{{ $provider->id }}" @if($provider->id == $data->provider_id) selected @endif>{{ $provider->nombre }}</option>
                                            @endforeach
                                        @else
                                            <option value="" selected></option>
                                            @foreach ($providers as $provider)
                                                <option value="{{ $provider->id }}">{{ $provider->nombre }}</option>
                                            @endforeach
                                        @endif

                                    </select>
                                    @endif
                                </div>

                                <div class="col-md-8" style="margin-top:25px;">
                                    @error('type')
                                        <div class="alert alert-danger" role="alert">
                                            Debes Agregar un tipo de servicio
                                        </div>
                                    @enderror
                                    <label class="form-label">Tipo</label>
                                    <select name="type" id="type" class="form-select js-example-basic-single">
                                        <option value="" selected></option>
                                        <option value="service" @if ($data->type === "service") selected @endif>Servicio</option>
                                        <option value="product" @if ($data->type === "product") selected @endif>Producto</option>
                                        <option value="employe" @if ($data->type === "empleye") selected @endif>Personal</option>
                                    </select>
                                </div>

                                <div class="col-md-8" style="margin-top:25px;">
                                    @error('title')
                                        <div class="alert alert-danger" role="alert">
                                            Debes Agregar un titulo
                                        </div>
                                    @enderror
                                    <label class="title">Titulo</label>
                                    <input type="text" name="title" class="form-control" @if ($data->id) value="{{ $data->title }}" @endif>
                                </div>

                                <div class="col-md-8" style="margin-top:25px;">
                                    @error('description')
                                        <div class="alert alert-danger" role="alert">
                                            Debes Agregar una descripcion del servicio
                                        </div>
                                    @enderror
                                    <label for="description">Descripcion</label>
                                    <textarea class="form-control" placeholder="Escribe una breve descripcion" id="description" name="description">{{ $data->description }}</textarea>
                                </div>

                                <div class="col-md-8" style="margin-top:25px;">
                                    @error('price')
                                        <div class="alert alert-danger" role="alert">
                                            Debes Agregar una descripcion del servicio
                                        </div>
                                    @enderror
                                    <label for="price">Costo del servicio</label>
                                    <input type="number" name="price" id="price" class="form-control" @if ($data->id) value="{{ $data->price }}" @endif>
                                </div>

                                <div class="col-md-8" style="margin-top:25px;">
                                    @error('status')
                                        <div class="alert alert-danger" role="alert">
                                            Debes Agregar un estado al servicio
                                        </div>
                                    @enderror
                                    <label for="status">Estado</label>
                                    <select name="status" id="status" class="form-select">
                                        <option value="0" @if ($data->status == '0') selected @endif>Inactivo</option>
                                        <option value="1" @if ($data->status == '1') selected @endif>Activo</option>
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
