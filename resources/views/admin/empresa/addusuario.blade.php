@extends('layouts.app_profile')
@section('title') Usuario Empresa @endsection
@section('page_active') Usuario Empresa @endsection



@section('content')
{!! Form::model($data, ['url' => ['register'],'files' => true]) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @include('admin.empresa.formusuario')
    </form>
@endsection
