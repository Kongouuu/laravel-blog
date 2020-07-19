@extends('main')

@section('title', '| View Post')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 style="margin-top:30px">{{ $post->title }}</h1>
            <hr>
            <p>{{ $post->body }}</p>
        </div>
    </div>
    

@endsection