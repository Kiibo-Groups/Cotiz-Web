@extends('layouts.app_profile')
@section('title') Sección Agendar Reunión @endsection
@section('page_active') Agendar Reunión @endsection 


@section('content')
{!! Form::model($data, ['url' => ['admin/section/updateInit'],'files' => true]) !!}
<section class="section sections">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="section" value="5">
    
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2>Editando Sección Agendar Reunión</h2>
                    </div> 
                    
                    <div class="row ec-vendor-uploads">
                        <div class="col-lg-6">
                            <div class="ec-vendor-upload-detail">   
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="titulo" class="form-label">Titulo</label>
                                        <input type="text" class="form-control slug-titulo" required id="titulo" name="titulo" value="{{$data->titulo}}">
                                    </div>

                                    <div class="col-md-12" style="margin-top:25px;">
                                        <label class="form-label">Sub Titulo</label>
                                        <textarea class="form-control" rows="2" required name="subtitulo">{{$data->subtitulo}}</textarea>
                                    </div> 

                                    <div class="col-md-12" style="margin-top:25px;">
                                        <label class="form-label">Descripción</label>
                                        <textarea class="form-control" rows="2" required name="descript">{{$data->descript}}</textarea>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="ec-vendor-upload-detail">   
                                <div class="row g-3">
                                    <div class="col-md-8" style="margin-top:25px;">
                                        <label class="form-label">Texto del botón</label>
                                        <input type="text" class="form-control slug-btn_text" required id="btn_text" name="btn_text" value="{{$data->btn_text}}">
                                    </div> 

                                    <div class="col-md-6">
                                        <label for="btn_action" class="form-label">URL del botón <small>(Acción del botón)</small> </label>
                                        <input type="text" class="form-control slug-btn_action"  required id="btn_action" name="btn_action" value="{{$data->btn_action}}">
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