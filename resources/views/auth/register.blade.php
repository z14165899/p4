@extends('layouts.master')

@push('head')
    <link href='/css/register.css' rel='stylesheet'>
@endpush

@section('content')
    <h1>Register</h1>

    <p>Already have an account? <a href='/login'>Login here...</a></p>

    <form method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}

        <label for="name">Name</label>
        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
        @include('modules.error', ['fieldName' => 'name'])

        <label for="email">E-Mail Address</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required>
        @include('modules.error', ['fieldName' => 'email'])

        <label for="password">Password (min: 6)</label>
        <input id="password" type="password" name="password" required>
        @include('modules.error', ['fieldName' => 'password'])

        <label for="password-confirm">Confirm Password</label>
        <input id="password-confirm" type="password" name="password_confirmation" required>

        <br/>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
@endsection