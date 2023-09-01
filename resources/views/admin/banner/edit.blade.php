@extends('layouts.app_profile')
@section('title') Banners @endsection
@section('page_active') Editar Banners @endsection 


@section('content')
    {!! Form::model($data, ['url' => $form_url,'files' => true,'method' => 'PATCH']) !!}
    <input type="hidden" value="{{$data->id}}" name="id">
        @include('admin.banner.form')
    </form>
@endsection