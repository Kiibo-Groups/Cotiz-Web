@extends('layouts.app_profile')
@section('title') Sección Quienes Somos @endsection
@section('page_active') Quienes Somos @endsection 


@section('content')
{!! Form::model($data, ['url' => ['admin/section/updateInit'],'files' => true]) !!}
<section class="section sections">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="section" value="2">
    
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2>Editando Sección Quienes Somos</h2>
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
                                        <label for="subtitulo" class="form-label">SubTitulo </label>
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
                                <div class="col-lg-12">
                                    <div class="ec-vendor-img-upload">
                                        <div class="ec-vendor-main-img">
                                            <div class="avatar-upload">
                                                <div class="avatar-edit">                                                      
                                                    <input type='file' id="video"  @if(!$data->id) required="required" @endif name="video" class="ec-image-upload" accept=".mp4" />
                                                    <label for="video">
                                                        <img src="<?php echo asset('public/profile/img/icons/edit.svg') ?>" class="svg_img header_svg" alt="edit" />
                                                    </label>
                                                </div>
                                                <div class="avatar-preview ec-preview">
                                                    <div class="imagePreview ec-div-preview">
                                                        @if($data->id)
                                                        <figure class="rounded">
                                                            <video src="{{ asset('assets/videos/'.$data->video) }}" class="ec-image-preview" id="play_interview" style="width: 100%; height: 350px;" autoplay loop muted></video>
                                                        </figure>
                                                        @else 
                                                        <img class="ec-image-preview" src="<?php echo asset('public/profile/img/banner/1.jpg') ?>"  style="height: 201px;" alt="edit" />
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