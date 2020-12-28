@extends('layouts.main')

@section('title')
    Страница новости
@endsection

@section('content')
<h1>{{$news->title}}</h1>
<p>{{$news->content}}</p>
@endsection
