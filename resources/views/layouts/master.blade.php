<!DOCTYPE html>
<html>
<head>
	<title>
        @yield('title', 'Project 4')
    </title>

	<meta charset='utf-8'>
    <link href="/css/index.css" type='text/css' rel='stylesheet'>
    
    @stack('head')
</head>
    
<body>
	<section>
		@yield('content')
	</section>

    @stack('body')
</body>
</html>