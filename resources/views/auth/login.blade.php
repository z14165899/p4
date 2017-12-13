@extends('layouts.master')

@push('head')
    <link href='/css/register.css' rel='stylesheet'>
@endpush

@section('content')

    <h1>Login</h1>

    <p>Don't have an account? <a href='/register'>Register here...</a></p>

    <form method="POST" action="{{ route('login') }}">

        {{ csrf_field() }}

        <label for="email">E-Mail Address</label>
        <input id="email" type="email" name="email" value="{{ old('email', 'chen@harvard.edu') }}" required autofocus>
        @include('modules.error', ['fieldName' => 'email'])

        <label for="password">Password</label>
        <input id="password" type="password" name="password" value='helloworld' required>
        @include('modules.error', ['fieldName' => 'password'])

        <label>
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> <p>Remember Me</p>
        </label>

        <button type="submit" class="btn btn-primary">Login</button>
        
        <br/>
        <a class="btn btn-link" href="{{ route('password.request') }}">Forgot Your Password?</a>
        
    </form>

@endsection