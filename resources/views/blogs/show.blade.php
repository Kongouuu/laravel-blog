@extends('main')

<!-- Escaping chars for safety / prevent xss issues-->
@section('title', '| ' . substr(htmlspecialchars($post->title),0,30))

@section('content')

    {{-- Display blog section --}}
    <div class="row">
        <div class="col-md-10 offset-md-1" style="word-wrap: break-word">
            <h1 style="margin-top:30px">{{ $post->title }}</h1>
            <p>
                @foreach($post->tags as $tag)
                    <span class="badge badge-pill badge-secondary">{{ $tag->name }}</span>
                @endforeach
            </p>
            <p>Category: {{ $post->category->name }}</p>
            <p>{{ date('M j, Y h:i',strtotime($post->created_at)) }}</p>
            <hr>
            <p>{!! $post->body !!}</p>
        </div>
    </div>

    {{-- Display comment section --}}
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <hr>
            {{-- Show how many comments in this blog --}}
            <h2>Comments ({{ $post->comments()->count() }})</h2>
            <div class="row">
                {{-- Loop and display all comments --}}
                @foreach($comments as $comment)
                    {{-- Auto generated avatar for comment--}}
                    <div class="col-md-1">
                        <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->name))) . "?d=wavatar" }}" class="avatar">
                    </div>

                    {{-- Comment body --}}
                    <div class="col-md-10">
                        <div class="card" style="margin-top: 20px; margin-left: 20px;">
                            <h5 class="card-header">
                                {{ $comment->name }} <small>{{ date('M j, Y h:i',strtotime($comment->created_at)) }}</small>
                            </h5>
                            <div class="card-body">
                                <p class="card-text">{{ $comment->comment }}</p>
                            </div>      
                        </div>    
                    </div>
                    <div class="col-md-1"></div>
                @endforeach
            </div>
        </div>
    </div>
    
    {{-- Create comment section --}}
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="comment-form" style="margin-top: 50px">
                {!! Form::open(['route' => ['comments.store', $post->id]]) !!}
                    <div class="row">
                        <div class="form-group col-md-6">
                            {{ Form::label('name','Name:')}}
                            {{ Form::text('name', null, ['class' => 'form-control', 'maxlength' => '100', 'required' => 'required']) }}
                        </div>
                        <div class="form-group col-md-6">
                            {{ Form::label('email','Email:')}}
                            {{ Form::text('email', null, ['class' => 'form-control', 'maxlength' => '150', 'required' => 'required', 'type' => 'email']) }}
                        </div>
                        <div class="form-group col-md-12">
                            {{ Form::label('comment','Comment:')}}
                            {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5', 'maxlength' => '3000', 'required' => 'required']) }}
                        </div>
                    </div>
                    {{ Form::submit('Submit Comment!', ['class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>   

@endsection