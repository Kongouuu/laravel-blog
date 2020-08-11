@extends('main')

@section('title', '| View Post')

@section('content')
    <div class="row">
        <div class="col-md-8" style="word-wrap: break-word">
            {{-- Post Information--}}
            <h1 style="margin-top:30px">{{ $post->title }}</h1>
            <h4>
                @foreach($post->tags as $tag)
                    <span class="badge badge-pill badge-secondary">{{ $tag->name }}</span>
                @endforeach
            </h4>
            <hr>
            <p>{!! $post->body !!}</p>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body" style="padding: 30px">
                    <dl class="row">
                        <dt class="col-md-6">Category:</dt>
                        <dd class="col-md-6">{{ $post->category->name }}</dd>
                    </dl>
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
                            {!! Html::linkRoute('posts.edit','Edit',[$post->id], ['class'=> 'btn btn-success btn-block']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::open(['route' => ['posts.destroy', $post->id],'method' => 'DELETE']) !!}                       
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
                            {!! Form::close() !!}
                        </div>
                        <div class="col-md-12" style="margin-top:20px">
                            {!! Html::linkRoute('posts.index','<< See All Posts',[], ['class'=> 'btn btn-outline-secondary btn-block']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            {{-- Comments information--}}
            <h2>Comments ({{ $post->comments()->count() }})</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Created At</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($post->comments as $comment)
                        <tr>
                            <td>{{ $comment->name }}</td>
                            <td>{{ $comment->email }}</td>
                            <td style="word-wrap: break-word">{{ substr($comment->comment,0,200) }} {{ strlen($comment->comment)>200?"...":"" }}</td>
                            <td>{{ date('M j, Y h:i',strtotime($comment->created_at)) }}</td>
                            <td>
                                {!! Form::open(['route' => ['comments.destroy', $comment->id],'method' => 'DELETE']) !!}                       
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    

@endsection