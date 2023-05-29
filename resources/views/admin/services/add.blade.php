@extends('layouts.app_profile')
@section('title') Servicios @endsection
@section('page_active') Nuevo Servicio @endsection 


@section('content')
    @if (!Auth::guard('admin')->check())
    <form action="{{ route('services_create_post') }}" method="POST" enctype="multipart/form-data">
    @else
    {!! Form::model($data, ['url' => ['admin/services'],'files' => true]) !!}
    @endif
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @include('admin.services.form')
    </form>
@endsection