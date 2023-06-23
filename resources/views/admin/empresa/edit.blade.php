@extends('layouts.app_profile')
@section('title') Empresa @endsection
@section('page_active') Ver Empresa @endsection


@section('content')
    {!! Form::model($data, ['url' => $form_url,'files' => true,'method' => 'PATCH']) !!}
        <input type="hidden" value="{{$data->id}}" name="id">
        @include('admin.empresa.form')
    </form>
@endsection
