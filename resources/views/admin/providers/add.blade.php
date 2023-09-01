@extends('layouts.app_profile')
@section('title') Proveedores @endsection
@section('page_active') Nuevos Proveedores @endsection 


@section('content')
    {!! Form::model($data, ['url' => ['admin/providers'],'files' => true]) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @include('admin.providers.form')
    </form>
@endsection