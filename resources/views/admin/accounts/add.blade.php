@extends('layouts.app_profile')
@section('title') Administradores @endsection
@section('page_active') Nuevo Admin @endsection 



@section('content')
    {!! Form::model($data, ['url' => [$form_url],'files' => true]) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @include('admin.accounts.form')
    </form>
@endsection