@extends('layouts.master')

@push('head')
    <link href='/css/register.css' rel='stylesheet'>
@endpush

@section('title')
    Registration
@endsection

@section('content')

    <h1>You can register by filling out the form below and start to enjoy our services!</h1>

    <form method='POST' action='/reservations'>

        {{ csrf_field() }}

        <p>* are required fields</p>

        <label for='name'>* Your Name</label>
        <input type='text' name='name' id='name' placeholder="Please enter your name">
     

        <label for='subject'>* Email</label>
        <input type='email' name='email' id='email' placeholder="Please enter your email address">
      

        <label for='location'>* Password</label>
        <input type='password' max='50' name='password' id='password' placeholder="Please enter your password">
      

        <label for='date'>* Confirm Password </label>
        <input type='confirm_password' name='confirm_password' id='confirm_password' placeholder="Please reenter your password">
    
        
        </br>
        <input type='submit' value='Register' class='btn btn-primary btn-small'>
    </form>

@endsection