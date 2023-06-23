@extends('layouts.app_profile')
@section('title') Sección Mentores @endsection
@section('page_active') Mentores @endsection 


@section('content')
{!! Form::model($data, ['url' => ['admin/section/updateInit'],'files' => true]) !!}
<section class="section sections">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="section" value="4">
    
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2>Editando Sección Mentores</h2>
                    </div> 
                    
                    <div class="row ec-vendor-uploads">
                        <div class="col-lg-6">
                            <div class="ec-vendor-upload-detail">   
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="titulo" class="form-label">Titulo</label>
                                        <input type="text" class="form-control slug-titulo"  id="titulo" name="titulo" value="{{$data->titulo}}">
                                    </div>

                                    <div class="col-md-12" style="margin-top:25px;">
                                        <label class="form-label">Sub Titulo</label>
                                        <textarea class="form-control" rows="2" name="subtitulo">{{$data->subtitulo}}</textarea>
                                    </div> 

                                    <div class="col-md-12" style="margin-top:25px;">
                                        <label class="form-label">Descripción</label>
                                        <textarea class="form-control" rows="2" name="descript">{{$data->descript}}</textarea>
                                    </div> 
                                </div>
                            </div>
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