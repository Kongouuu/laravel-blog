@extends('main')

@section('title', '| Contact')

@section('content')
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<h1>Contact Me</h1>
			<hr>
			{!! Form::open(['route' => 'contact.post']) !!}
				<div class="form-group">
					{{ Form::label('email','Email:')}}
					{{ Form::text('email', null, ['class' => 'form-control', 'maxlength' => '255', 'required' => 'required', 'type' => 'email']) }}
				</div>

				<div class="form-group">
					{{ Form::label('subject','Subject:')}}
					{{ Form::text('subject', null, ['class' => 'form-control', 'maxlength' => '255', 'required' => 'required', 'type' => 'email']) }}
				</div>

				<div class="form-group">
					{{ Form::label('message','Message:')}}
					{{ Form::textarea('message', null, ['class' => 'form-control', 'maxlength' => '10000', 'required' => 'required',
						'placeholder' => 'Speak to me here!']) }}
				</div>

				{{ Form::submit('Send Message', ['class' => 'btn btn-info', 'style' => 'margin-top: 20px']) }}
			{!! Form::close() !!}
		</div>
	</div>
@endsection