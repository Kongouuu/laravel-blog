@extends('main')

@section('title', '| Categories Index')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>Categories</h1>
            <table class="table" style="margin-top: 30px">
                <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th></th>
                        </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <th>{{ $category->id }}</th>
                            <td>{{ $category->name}}</td>
                            <td style="text-align:right">
                                {!! Form::open(['route' => ['categories.destroy', $category->id],'method' => 'DELETE']) !!}                       
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
                        {!! Form::open(['route' => 'categories.store']) !!}
                            <h2>New Category</h2>
                            <div class="form-group">    
                                {{ Form::label('name','Name:')}}
                                {{ Form::text('name', null, ['class' => 'form-control', 'maxlength' => '50', 'required' => 'required']) }}
                            </div>
                            {{ Form::submit('Create Category', ['class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px']) }}
                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection