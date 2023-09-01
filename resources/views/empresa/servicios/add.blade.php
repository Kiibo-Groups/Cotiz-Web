@extends('layouts.app_empresa')
@section('title') Solicitudes @endsection
@section('page_active') Nuevo Documento @endsection



@section('content')
    {!! Form::model($data, ['url' => [$form_url],'files' => true]) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @include('empresa.servicios.form')
    </form>
@endsection
