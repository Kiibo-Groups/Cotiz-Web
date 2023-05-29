@extends('layouts.app_profile')
@section('title') Servicios @endsection
@section('page_active') Editar Servicios @endsection 


@section('content')
    @if (!Auth::guard('admin')->check())
    <form action="{{ route('services_update_post') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @else
    {!! Form::model($data, ['url' => $form_url,'files' => true,'method' => 'PATCH']) !!}
    @endif
        <input type="hidden" value="{{$data->id}}" name="id">
        @include('admin.services.form')
    </form>
@endsection