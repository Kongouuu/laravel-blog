@extends('main')

@section('title', "| $tag->name Tag ")

@section('content')
    <div class="row">
        <div class="col-md-7">
            <h1>{{ $tag->name }} Tag (<small> {{ $tag->posts()->count() }} Posts</small>)</h1>
            <hr>
        </div>

        <div class="col-md-2 offset-md-1">
                {!! Html::linkRoute('tags.index','Back',[], ['class' => 'btn btn-block btn-outline-secondary', 'style' => 'margin-top:10px']) !!}
        </div>
        <div class="col-md-2"> 
            {!! Html::linkRoute('tags.edit','Edit',[$tag->id], ['class' => 'btn btn-block btn-success', 'style' => 'margin-top:10px']) !!}
        </div>

        <div class="col-md-12">
            <table class="table" style="margin-top: 30px">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Tags</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tag->posts as $post)
                        <tr>
                            <th>{{ $post->id }}</th>
                            <td>{{ substr($post->title,0,30) }} {{ strlen($post->title)>30?"...":"" }}</td>
                            <td>
                                @foreach($post->tags as $tag)
                                    <span class="badge badge-pill badge-secondary">{{ $tag->name }}</span>
                                @endforeach
                            </td>
                            <td style="text-align:right">
                                {!! Html::linkRoute('posts.show','View',[$post->id], ['class' => 'btn btn-outline-secondary']) !!}
                                {!! Html::linkRoute('posts.edit','Edit',[$post->id], ['class'=> 'btn btn-success']) !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection