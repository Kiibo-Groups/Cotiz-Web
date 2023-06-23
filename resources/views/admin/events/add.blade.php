@extends('layouts.app_profile')
@section('title') Eventos @endsection
@section('page_active') Nuevo Evento @endsection 


@section('content')
    {!! Form::model($data, ['url' => ['admin/events'],'files' => true]) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @include('admin.events.form')
    </form>
@endsection