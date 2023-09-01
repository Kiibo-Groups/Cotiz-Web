@extends('layouts.app_profile')
@section('title') Administradores @endsection
@section('page_active') Editar Admin @endsection 


@section('content')
    {!! Form::model($data, ['url' => $form_url,'files' => true,'method' => 'PATCH']) !!}
        <input type="hidden" value="{{$data->id}}" name="id">
        @include('admin.accounts.form')
    </form>
@endsection