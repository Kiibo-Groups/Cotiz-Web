@extends('layouts.app_profile')
@section('title') Proveedores @endsection
@section('page_active') Editar Proveedores @endsection 


@section('content')
    {!! Form::model($data, ['url' => $form_url,'files' => true,'method' => 'PATCH']) !!}
        <input type="hidden" value="{{$data->id}}" name="id">
        @include('admin.providers.form')
    </form>
@endsection