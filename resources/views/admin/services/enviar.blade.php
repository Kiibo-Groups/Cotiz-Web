@extends('layouts.app_profile')
@section('title') Servicios @endsection
@section('page_active') Enviar solicitud de  Servicio @endsection


@section('content')

    {!! Form::model($data, ['url' => $form_url,'files' => true,'method' => 'POST']) !!}

        <input type="hidden" value="{{$data->id}}" name="id">
        @include('admin.services.formenviar')
    </form>


@endsection
