@extends('layouts.app_profile2')
@section('title') Servicios @endsection
@section('page_active') Nuevo Servicio @endsection 


@section('content')
    {!! Form::model($data, ['url' => ['admin/services'],'files' => true]) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @include('admin.services.form')
    </form>
@endsection