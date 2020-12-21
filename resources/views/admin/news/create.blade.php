@extends('layouts.main')

@section('title')
    Админка новости
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        {!! Form::open(['route' => 'admin::news::create_action']) !!}
        <label  class="form-label">
            Заголовок
        </label>
        <div class="form-group">
        {!! Form::text("news[title]",'', ['class' => "form-control"]) !!}
        </div>
        <div class="form-group">
            {!! Form::textarea("news[content]",'', ['class' => "form-control"]) !!}
        </div>
        <div class="form-group">
            {!! Form::submit("submit", ['class' => "btn btn-success"])!!}
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection



