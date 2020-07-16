<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link href="/css/app.css" rel="stylesheet">
    </head>

    <body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="#">Laravel Blog</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav">
					<li class="nav-item active">
						<a class="nav-link" href="/">Home </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/about">About</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/contact">Contact</a>
					</li>
				</ul>

				<ul class="navbar-nav ml-auto">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Dropdown link
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="#">Action</a>
							<a class="dropdown-item" href="#">Another action</a>
							<a class="dropdown-item" href="#">Something else here</a>
						</div>
					</li>
				</ul>
			</div>
		</nav>

		<div class="container" style="margin-top:20px">
			<div class="row">
				<div class="col-md-12">
					<div class="jumbotron">
						<h1 class="display-4">Welcome to my blog!</h1>
						<p class="lead">Thank you for visiting</p>
						<hr class="my-4">
						<p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
						<a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8">
					<div class="post">
						<h3>Post Title</h3>
						<p>Type anything here for fun Type anything here for fun Type anything here for fun Type anything here for fun Type anything here for fun Type anything here for fun 
						Type anything here for fun Type anything here for fun Type anything here for fun Type anything here for fun Type anything here for fun 
						</p>
						<a href="#" class="btn btn-primary">Read More</a>
						<hr>
					</div>
					<div class="post">
						<h3>Post Title</h3>
						<p>Type anything here for fun Type anything here for fun Type anything here for fun Type anything here for fun Type anything here for fun Type anything here for fun 
						Type anything here for fun Type anything here for fun Type anything here for fun Type anything here for fun Type anything here for fun 
						</p>
						<a href="#" class="btn btn-primary">Read More</a>
						<hr>
					</div>
					<div class="post">
						<h3>Post Title</h3>
						<p>Type anything here for fun Type anything here for fun Type anything here for fun Type anything here for fun Type anything here for fun Type anything here for fun 
						Type anything here for fun Type anything here for fun Type anything here for fun Type anything here for fun Type anything here for fun 
						</p>
						<a href="#" class="btn btn-primary">Read More</a>
						<hr>
					</div>
				</div>

				<div class="col-md-3 offset-md-1">
					<h3>Sidebar</h3>
				</div>
			</div>
		</div>


		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>
</html>
