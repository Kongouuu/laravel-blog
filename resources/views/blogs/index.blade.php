@extends('main')

@section('title', '| Blogs')

@section('content')

    <div class="row">
        <div class="col-md-10 offset-md-1">
            <h1>Blogs</h1>
        </div>
    </div>

    <div class="row" style="margin-top: 30px; word-wrap: break-word">
    @foreach ($posts as $post)
        <div class="col-md-10 offset-md-1">
            <h2>{{ $post->title }}</h2>
            <strong>Published: {{ date('M j, Y h:i',strtotime($post->created_at)) }}</strong>
            <p>{{ substr(strip_tags($post->body),0,250) }}{{ strlen(strip_tags($post->body))>250?"...":"" }}</p>
            {!! Html::linkRoute('blogs.show','Read More ->',[$post->id], ['class' => 'btn btn-success', 'style' => 'float: right; margin-bottom:20px']) !!}
            <hr style="clear:both">
        </div>
    @endforeach
    </div>

@endsection