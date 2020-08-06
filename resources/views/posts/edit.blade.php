@extends('main')

@section('title', '| Edit Post')

@section('stylesheets')
    {!! Html::style('css/select2.min.css') !!}
@endsection

@section('content')
    {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!}
    <div class="row">
        {{-- Model is form binding existing entry
             Route here takes in array of destination and parameter--}}
        <div class="col-md-8">
                <div class="form-group">
                    {{ Form::label('title','Title:')}}
                    {{ Form::text('title', null, ['class' => 'form-control', 'maxlength' => '100', 'required' => 'required']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('category_id','Category:')}}
                    <select class="form-control" name="category_id">
                        <option disabled="disabled">Please select a category</option>
                        @foreach($categories as $category)
                            @if($category->id == $post->category_id)
                                <option value="{{ $category->id }}" selected="selected">{{ $category->name }}</option>
                            @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    {{ Form::label('tags','Tags:') }}
                    {{-- name has to be an array so value stored is array --}}
                    <select class="form-control js-example-basic-multiple" name="tags[]" multiple="multiple">
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}"> {{$tag->name}} </option>
                        @endforeach
                    </select>
                </div>
    
                <div class="form-group">
                    {{ Form::label('body','Body:')}}
                    {{ Form::textarea('body', null, ['class' => 'form-control', 'maxlength' => '15000', 'required' => 'required']) }}
                </div>    
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body" style="padding: 35px">
                    <dl class="row">
                        <dt class="col-md-6">Created At:</dt>
                        {{-- Date stored is in the format of yyyy-mm-dd hh-mm-ss
                             strtotime convers the date into a unix timestamp integer
                             date('format',unix timestamp) will convert it into desired format --}}
                        <dd class="col-md-6">{{ date('M j, Y h:i',strtotime($post->created_at)) }}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-md-6">Last Updated:</dt>
                        <dd class="col-md-6">{{ date('M j, Y h:i',strtotime($post->updated_at)) }}</dd>
                    </dl>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            {{-- <a href="#" class="btn btn-success btn-block">Edit</a> --}}
                            {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
                        </div>
                        <div class="col-md-6">
                            
                            {!! Html::linkRoute('posts.show','Cancel',[$post->id], ['class'=> 'btn btn-danger btn-block']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection

@section('scripts')
    {!! Html::script('js/select2.min.js') !!}
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
            // Javascript does not accept raw php language, so need json_encode
            // allRelatedIds is to create array of ids in many->many relationship
            $('.js-example-basic-multiple').select2().val({!! json_encode($post->tags()->allRelatedIds()) !!}).trigger('change');
        });
    </script>
@endsection