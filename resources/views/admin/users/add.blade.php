@extends('layouts.app_profile')
@section('title') Usuarios @endsection
@section('page_active') Nuevo Usuario @endsection 


@section('content')
    {!! Form::model($data, ['url' => ['admin/users'],'files' => true]) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @include('admin.users.form')
    </form>
@endsection