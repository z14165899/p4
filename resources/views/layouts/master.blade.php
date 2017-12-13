<!DOCTYPE html>
<html lang="en-US">
<head>
	<title>
        @yield('title', 'Project 4')
    </title>

	<meta charset='utf-8'>
    <link href="/css/p4.css" type='text/css' rel='stylesheet'>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
    
    @stack('head')
</head>
    
<body>
	<header>
		<a href='/'><img
            src='/img/tutoring.jpg'
            style='width:300px'
            alt='Tutoring Logo'></a>
		 @include('modules.nav')
	</header>

	<section>
		@if(session('alert'))
			<div class='alert'>
			{{ session('alert') }}
			</div>
		@endif

		@yield('content')
	</section>

    @stack('body')
</body>
</html>