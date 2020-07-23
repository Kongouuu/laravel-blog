@extends('main')

@section('title', '| View Post')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1 style="margin-top:30px">{{ $post->title }}</h1>
            <hr>
            <p>{{ $post->body }}</p>
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
                            {!! Html::linkRoute('posts.edit','Edit',[$post->id], ['class'=> 'btn btn-success btn-block']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Html::linkRoute('posts.destroy','Delete',[$post->id], ['class'=> 'btn btn-success btn-block']) !!}
                        </div>
                    </div>
                </div>
              </div>
        </div>
    </div>
    

@endsection