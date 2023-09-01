@extends('layouts.app_empresa')
@section('title') Permisos Usuario @endsection
@section('page_active') Permisos Usuario @endsection



@section('content')
    {!! Form::model($data, ['url' => [$form_url],'files' => true]) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @include('empresa.accounts.form')
    </form>
@endsection
