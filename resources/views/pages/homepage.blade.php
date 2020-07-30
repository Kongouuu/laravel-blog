@extends('main')

@section('title', '| Home')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="jumbotron">
				<h1 class="display-4">Welcome to my blog!</h1>
				<p class="lead">Thank you for visiting</p>
				<hr class="my-4">
				<p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
				<a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8">
			@foreach($posts as $post)
			<div class="post" style="word-wrap: break-word">
				<h3> {{ substr($post->title,0,100) }} {{ strlen($post->title)>100?"...":"" }} </h3>
				<p>	 {{ substr($post->body,0,700) }} {{ strlen($post->body)>700?"...":"" }} </p>
				{!! Html::linkRoute('posts.show','Read More ->',[$post->id], ['class' => 'btn btn-success', 'style' => 'float: right; margin-bottom:20px']) !!}
				<hr style="clear:both">
			</div>
			@endforeach
		</div>

		<div class="col-md-3 offset-md-1">
			<h3>Sidebar</h3>
		</div>
	</div>
@endsection
