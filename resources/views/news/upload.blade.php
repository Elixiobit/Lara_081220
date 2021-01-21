
@extends('layouts.main')

@section('title')
    Админка новости
@endsection

@section('content')
{!! Form::open(['route' => 'upload', 'enctype' => 'multipart/form-data']) !!}
{!! Form::file('file') !!}
{!! Form::submit('send') !!}
{!! Form::close() !!}
@endsection
