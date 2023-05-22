@extends('layouts.app_profile')
@section('title') Mentores @endsection
@section('page_active') Nuevo Mentor @endsection 


@section('content')
    {!! Form::model($data, ['url' => ['admin/mentors'],'files' => true]) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @include('admin.mentors.form')
    </form>
@endsection