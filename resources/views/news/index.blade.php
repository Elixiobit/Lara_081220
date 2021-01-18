@extends('layouts.main')

@section('title')
    Категории
@endsection

@section('content')
@foreach($categories as $id => $name)
    @php
        $url = route('news::list', ['categoryId' => $id])
    @endphp

    <div>
        <a href='{{$url}}'>{{$name}}</a>
    </div>
@endforeach
@endsection
