@extends('main')

@section('title', '| Contact')

@section('content')
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<h1>About Me</h1>
			<hr>
			<form>
				<div class="form-group">
					<label name="email">Email:</label>
					<input id="email" name="email" class="form-control" tyle="email">
				</div>

				<div class="form-group">
					<label name="subject">Subject:</label>
					<input id="subject" name="subject" class="form-control">
				</div>

				<div class="form-group">
					<label name="message">Message:</label>
					<textarea id="message" name="message" class="form-control" placeholder="Speak to me here!"></textarea>
				</div>

				<input type="submit" class="btn btn-info" value="Send Message">
			</form>
		</div>
	</div>
@endsection