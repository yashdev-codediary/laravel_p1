<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel 11 Task App</title>
	@yield('styles')
</head>
<body>

	<h1>@yield('title')</h1>
	<div>
		@if(session()->has('success'))
			<div>{{ session('success') }}</div>
		@endif
		@yield('content')
	</div>

</body>
</html>