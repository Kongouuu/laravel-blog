@extends('main')

@section('title', '| Create Post')

@section('stylesheets')
    {!! Html::style('css/select2.min.css') !!}
@endsection

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
                    {{ Form::label('category_id','Category:')}}
                    {{-- Sometimes it looks better to not use "blade" syntax --}}
                    <select class="form-control" name="category_id">
                        <option disabled="disabled" selected="selected">Please select a category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    {{ Form::label('tags','Tags:') }}
                    {{-- name has to be an array so value stored is array --}}
                    <select class="form-control js-example-basic-multiple" name="tags[]" multiple="multiple">
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Actually WYSIWYG might not be very safe, but it is just a practice blog and I want more features :D --}}
                <div class="form-group">
                    {{ Form::label('body','Post body:')}}
                    {{ Form::textarea('body', null, ['class' => 'form-control', 'maxlength' => '15000', 'required' => 'required']) }}
                </div>

                {{ Form::submit('Create Post', ['class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px']) }}
        </div>
        {!! Form::close() !!}
    </div>
@endsection

@section('scripts')
    {!! Html::script('js/select2.min.js') !!}
    
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
        new FroalaEditor('textarea', {
            // Set custom buttons.
            toolbarButtons: [['bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript'], ['fontFamily', 'fontSize', 'textColor', 'backgroundColor'], ['inlineClass', 'inlineStyle', 'clearFormatting']]
        })
    </script>
@endsection