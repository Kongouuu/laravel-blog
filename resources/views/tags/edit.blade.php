@extends('main')

@section('title', '| Edit Tag')

@section('content')
    {!! Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => 'PUT']) !!}
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2>Edit Your Tag</h2>
            <hr>
            <div class="card" style="margin-top:10px">
                <div class="card-body">
                    <div class="form-group">
                        {{ Form::label('name','Tag Name:')}}
                        {{ Form::text('name', null, ['class' => 'form-control', 'maxlength' => '25', 'required' => 'required']) }}
                    </div> 
                    {!! Html::linkRoute('tags.show','Cancel',[$tag->id], ['class'=> 'btn btn-outline-secondary']) !!}
                    {{ Form::submit('Save Changes', ['class' => 'btn btn-success']) }}
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
