@extends('layouts.app_profile')
@section('title') Empresa @endsection
@section('page_active') Empresa @endsection



@section('content')
{!! Form::model($data, ['url' => ['register/empresa'],'files' => true]) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @include('admin.empresa.formempresa')
    </form>
@endsection
