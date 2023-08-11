@extends('layouts.app_empresa')
@section('title') Administradores @endsection
@section('page_active') Editar Admin @endsection


@section('content')
    {!! Form::model($data, ['url' => $form_url,'files' => true,'method' => 'PATCH']) !!}
        <input type="hidden" value="{{$data->id}}" name="id">
        @include('empresa.accounts.form')
    </form>
@endsection
