@extends('main')

@section('title', '| ' . substr($post->title,0,30))

@section('content')
    <div class="row">
        <div class="col-md-10 offset-md-1" style="word-wrap: break-word">
            <h1 style="margin-top:30px">{{ $post->title }}</h1>
            <p>{{ $post->body }}</p>
            <hr>
            <p>{{ $post->category->id }}</p>
        </div>
    </div>
    

@endsection