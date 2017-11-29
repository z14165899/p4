<!DOCTYPE html>
<html>
<head>
	<title>
        @yield('title', 'Project 4')
    </title>

	<meta charset='utf-8'>
    <link href="/css/p4.css" type='text/css' rel='stylesheet'>
    
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
		@yield('content')
	</section>

    @stack('body')
</body>
</html>