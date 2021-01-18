@extends('layouts.main')

@section('title')
    Новости
@endsection

@section('content')
@forelse ($news as $item)
    @php
        $url = route('news::card', ['id' => $item->id]);
    @endphp

    <div>
        <a href='{{$url}}'>{{$item->title}}</a>
    </div>
    @empty
        Новостей нет
    @endforelse
@endsection
