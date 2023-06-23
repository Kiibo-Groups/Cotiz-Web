@extends('layouts.app_profile')
@section('title') Eventos @endsection
@section('page_active') Editar Evento @endsection 


@section('content')
    {!! Form::model($data, ['url' => $form_url,'files' => true,'method' => 'PATCH']) !!}
    <input type="hidden" value="{{$data->id}}" name="id">
        @include('admin.events.form')
    </form>
@endsection