@extends('layouts.app_profile')
@section('title') Buzón @endsection
@section('page_active') Buzón @endsection



@section('content')
{!! Form::model($data, ['url' => ['register'],'files' => true]) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @include('admin.empresa.formusuario')
    </form>
@endsection
