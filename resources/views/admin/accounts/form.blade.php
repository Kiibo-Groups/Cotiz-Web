
<section class="section banners">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="card info-card">
                    <div class="card-header card-header-border-bottom">
                        @if(!$data->id)
                        <h2>Agregar Nuevo Administrador</h2>
                        @else
                        <h2>Editando Administrador #{{$data->id}}</h2>
                        @endif
                    </div>

                    <div class="row ec-vendor-uploads">
                        <div class="col-lg-12">
                            <div class="ec-vendor-upload-detail">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="name" class="form-label">Nombre</label>
                                        <input type="text" class="form-control slug-title"  id="name" name="name" value="{{$data->name}}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="name" class="form-label">Nombre de usuario</label>
                                        <input type="text" class="form-control slug-title"  id="username" name="username" value="{{$data->username}}" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control slug-title" id="email" name="email" value="{{$data->email}}" required>
                                    </div>


                                    <div class="col-md-6">
                                        <label for="password" class="form-label">Contraseña</label>
                                        <input type="password" class="form-control slug-title" id="password" name="password" >
                                    </div>

                                </div>

                                <div class="row mb-3">
                                  {{--  <div class="col-md-6" style="margin-top:25px;">
                                        <label class="form-label">Status</label>
                                        <select name="status" id="status" class="form-select" required="required">
                                            <option value="1" @if($data->status == 1) selected @endif>Activo</option>
                                            <option value="0" @if($data->status == 0) selected @endif>Inactivo</option>
                                        </select>
                                    </div>--}}

                                    <div class="col-md-6" style="margin-top:25px;">
                                        <label class="form-label">Permisos </label>
                                        <select name="perm[]" class="form-control js-select2" multiple="true" required>
                                        @foreach(DB::table('perm')->get() as $p)
                                            <option value="{{ $p->name }}" @if(in_array($p->name,$array)) selected @endif>{{ $p->name }}</option>
                                        @endforeach
                                        </select>
                                        <span class="d-block mt-1" style="font-size:12px;color:red;">
                                            Para seleccionar varios permisos, selecciona uno a uno con la tecla Ctrl sostenido.
                                        </span>
                                    </div>
                                </div>

                                <div class="row mb-12">
                                    <div class="col-md-10" style="margin-top:25px; text-align: right">
                                        <a href="javascript:history.back()" class="btn btn-primary mb-2 btn-pill">
                                            Volver Atrás
                                        </a>

                                    </div>

                                    <div class="col-md-2" style="margin-top:25px;">
                                        <button type="submit" class="btn btn-primary mb-2 btn-pill">
                                            @if(!$data->id)
                                            Agregar
                                            @else
                                            Actualizar
                                            @endif
                                        </button>
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
    </div>
</section>
