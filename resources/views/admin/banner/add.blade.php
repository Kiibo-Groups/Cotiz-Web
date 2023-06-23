@extends('layouts.app_profile')
@section('title') Banners @endsection
@section('page_active') Nuevo Banner @endsection 


@section('content')
    {!! Form::model($data, ['url' => ['admin/banners'],'files' => true]) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @include('admin.banner.form')
    </form>
@endsection