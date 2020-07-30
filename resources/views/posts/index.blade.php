@extends('main')

@section('title', '| Posts Index')

@section('content')

    <div class="row">
        <div class="col-md-10">
            <h1>All Posts</h1>
        </div>

        <div class="col-md-2">
                {!! Html::linkRoute('posts.create','Create New Post',[], ['class' => 'btn btn-success btn-block', 'style' => 'margin-top:10px']) !!}
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table" style="margin-top: 30px">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Body</th>
                        <th>Created At:</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <th>{{ $post->id }}</th>
                            <td>{{ substr($post->title,0,30) }} {{ strlen($post->title)>30?"...":"" }}</td>
                            <td>{{ substr($post->body,0,50) }} {{ strlen($post->body)>50?"...":"" }}</td>
                            <td>{{ date('M j, Y h:i',strtotime($post->created_at)) }}</td>
                            <td>
                                {!! Html::linkRoute('posts.show','View',[$post->id], ['class' => 'btn btn-outline-secondary']) !!}
                                {!! Html::linkRoute('posts.edit','Edit',[$post->id], ['class'=> 'btn btn-success']) !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-center">
                {!! $posts->links() !!}
            </div>
        </div>
    </div>

@endsection