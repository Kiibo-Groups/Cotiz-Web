@extends('layouts.app_proveedor')
@section('title') Solicitudes @endsection
@section('page_active') Nuevo Documento @endsection



@section('content')
    {!! Form::model($data, ['url' => [$form_url],'files' => true]) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @include('proveedor.servicios.form')
    </form>
@endsection
