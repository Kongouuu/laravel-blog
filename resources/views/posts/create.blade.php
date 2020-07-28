@extends('main')

@section('title', '| Create Post')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Create New Post</h1>
            <hr>
            {{-- LaravelCollection forms--}}
            {{-- Maybe can do 'url' => 'posts', but this is better--}}
            {!! Form::open(['route' => 'posts.store']) !!}
                {{-- 
                    *label(name, value)
                     <label name="title">Title:</label> 
                    *text(name, default value, array of attribute)
                     <input type="text" name="title" value=""> 
                --}}
                <div class="form-group">
                    {{ Form::label('title','Title:')}}
                    {{ Form::text('title', null, ['class' => 'form-control', 'maxlength' => '100', 'required' => 'required']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('body','Post body:')}}
                    {{ Form::textarea('body', null, ['class' => 'form-control', 'maxlength' => '15000', 'required' => 'required']) }}
                </div>

                {{ Form::submit('Create Post', ['class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px']) }}
        </div>
        {!! Form::close() !!}
    </div>
@endsection