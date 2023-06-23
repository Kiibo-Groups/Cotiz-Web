@extends('layouts.app_profile')
@section('title') Sección Inicial @endsection
@section('page_active') Sección Inicial @endsection 


@section('content')
{!! Form::model($data, ['url' => ['admin/section/updateInit'],'files' => true]) !!}
<section class="section sections">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="section" value="1">
    
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2>Editando Sección inicial</h2>
                    </div> 
                    
                    <div class="row ec-vendor-uploads">
                        <div class="col-lg-6">
                            <div class="ec-vendor-upload-detail">   
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="titulo" class="form-label">Titulo</label>
                                        <input type="text" class="form-control slug-titulo"  id="titulo" name="titulo" value="{{$data->titulo}}">
                                    </div>

                                    <div class="col-md-8">
                                        <label for="subtitulo" class="form-label">SubTitulo <small>(Texto en movimiento maximo 3 separarlos por ,)</small> </label>
                                        <input type="text" class="form-control slug-title" id="subtitulo" name="subtitulo" value="{{$data->subtitulo}}">
                                    </div>

                                    <div class="col-md-12" style="margin-top:25px;">
                                        <label class="form-label">Descripción</label>
                                        <textarea class="form-control" rows="2" name="descript">{{$data->descript}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-6">
                            <fieldset class="row mb-3">
                                <div class="col-lg-6">
                                    <div class="ec-vendor-img-upload">
                                        <div class="ec-vendor-main-img">
                                            <div class="avatar-upload">
                                                <div class="avatar-edit">    
                                                    <label class="form-label">350px * 350px</label>                                                       
                                                    <input type='file' id="pic_1"  @if(!$data->id) required="required" @endif name="pic_1" class="ec-image-upload" accept=".png, .jpg, .jpeg, .gif" />
                                                    <label for="pic_1">
                                                        <img src="<?php echo asset('public/profile/img/icons/edit.svg') ?>" class="svg_img header_svg" alt="edit" />
                                                    </label>
                                                </div>
                                                <div class="avatar-preview ec-preview">
                                                    <div class="imagePreview ec-div-preview">
                                                        @if($data->id)
                                                        <img class="ec-image-preview" src="<?php echo asset('public/assets/img/photos/'.$data->pic_1) ?>"  style="height: 201px;" alt="pic_1" />
                                                        @else 
                                                        <img class="ec-image-preview" src="<?php echo asset('public/profile/img/banner/1.jpg') ?>"  style="height: 201px;" alt="edit" />
                                                        @endif
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="ec-vendor-img-upload">
                                        <div class="ec-vendor-main-img">
                                            <div class="avatar-upload">
                                                <div class="avatar-edit">       
                                                    <label class="form-label">293px * 235px</label>                                                       
                                                    <input type='file' id="pic_2"  @if(!$data->id) required="required" @endif name="pic_2" class="ec-image-upload" accept=".png, .jpg, .jpeg, .gif" />
                                                    <label for="pic_2">
                                                        <img src="<?php echo asset('public/profile/img/icons/edit.svg') ?>" class="svg_img header_svg" alt="edit" />
                                                    </label>
                                                </div>
                                                <div class="avatar-preview ec-preview">
                                                    <div class="imagePreview ec-div-preview">
                                                        @if($data->id)
                                                        <img class="ec-image-preview" src="<?php echo asset('public/assets/img/photos/'.$data->pic_2) ?>"  style="height: 201px;" alt="banner" />
                                                        @else 
                                                        <img class="ec-image-preview" src="<?php echo asset('public/profile/img/banner/1.jpg') ?>"  style="height: 201px;" alt="edit" />
                                                        @endif
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="ec-vendor-img-upload">
                                        <div class="ec-vendor-main-img">
                                            <div class="avatar-upload">
                                                <div class="avatar-edit">    
                                                    <label class="form-label">750px * 500px</label>                                                        
                                                    <input type='file' id="pic_3"  @if(!$data->id) required="required" @endif name="pic_3" class="ec-image-upload" accept=".png, .jpg, .jpeg, .gif" />
                                                    <label for="pic_3">
                                                        <img src="<?php echo asset('public/profile/img/icons/edit.svg') ?>" class="svg_img header_svg" alt="edit" />
                                                    </label>
                                                </div>
                                                <div class="avatar-preview ec-preview">
                                                    <div class="imagePreview ec-div-preview">
                                                        @if($data->id)
                                                        <img class="ec-image-preview" src="<?php echo asset('public/assets/img/photos/'.$data->pic_3) ?>" style="height: 301px;" alt="banner" />
                                                        @else 
                                                        <img class="ec-image-preview" src="<?php echo asset('public/profile/img/banner/1.jpg') ?>" style="height: 301px;" alt="edit" />
                                                        @endif
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div> 

                        <div class="mt-5" style="justify-items: end;display: grid;padding:20px;">
                            <button type="submit" class="btn btn-primary mb-2 btn-pill">
                                Actualizar
                            </button>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</section>
</form>
@endsection