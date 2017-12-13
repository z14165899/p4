@php
    # Define a PHP array of links and their labels
    # This amount of PHP code in a view is okay because it's
    # display specific. By putting it in the view, I'm not making it
    # necessary to look in a logic file in order to edit link labels
if(Auth::check()) {
    $nav = [
        '' => 'Courses',
        'appointment' => 'Make an Appointment',
        'reservations' => 'My Appointments',
        'manage' => 'Management',
    ];
}else {
    $nav = [
        'register' => 'Register',
        'login' => 'Login',
    ];
}
@endphp

<nav>
    <ul>
        @foreach($nav as $link => $label)
            <li><a href='/{{ $link }}' class='{{ Request::is($link) ? 'active' : '' }}'>{{ $label }}</a>
        @endforeach

        @if(Auth::check())
            <li>
                <form method='POST' id='logout' action='/logout'>
                    {{csrf_field()}}
                    <a href='#' onClick='document.getElementById("logout").submit();'>Logout</a>
                </form>
            </li>
        @endif
    </ul>
</nav>
