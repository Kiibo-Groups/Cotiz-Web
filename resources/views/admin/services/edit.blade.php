@extends('layouts.app_profile2')
@section('title') Servicios @endsection
@section('page_active') Editar Servicios @endsection 


@section('content')
    {!! Form::model($data, ['url' => $form_url,'files' => true,'method' => 'PATCH']) !!}
        <input type="hidden" value="{{$data->id}}" name="id">
        @include('admin.services.form')
    </form>
@endsection