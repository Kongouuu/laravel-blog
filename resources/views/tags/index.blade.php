@extends('main')

@section('title', '| Tags')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>Tags</h1>
            <table class="table" style="margin-top: 30px">
                <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th></th>
                        </tr>
                </thead>
                <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <th>{{ $tag->id }}</th>
                            <td>{!! Html::linkRoute('tags.show',$tag->name,[$tag->id], ['style' => "color:green"]) !!}</td>
                            <td style="text-align:right">
                                {!! Form::open(['route' => ['tags.destroy', $tag->id],'method' => 'DELETE']) !!}                       
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body" style="padding: 35px">
                        {!! Form::open(['route' => 'tags.store']) !!}
                            <h2>New Tag</h2>
                            <div class="form-group">    
                                {{ Form::label('name','Name:')}}
                                {{ Form::text('name', null, ['class' => 'form-control', 'maxlength' => '25', 'required' => 'required']) }}
                            </div>
                            {{ Form::submit('Create Tag', ['class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px']) }}
                        {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="text-center">
            {!! $tags->links() !!}
        </div>
    </div>
@endsection