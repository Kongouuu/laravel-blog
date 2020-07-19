<!DOCTYPE html>
<html>
	
@include('partials._head')

<body>
	@include('partials._navbar')

	
	<div class="container" style="margin-top:20px">
		@include('partials._messages')
		@yield('content')
	</div>

	@include('partials._foot')
</body>

</html>
