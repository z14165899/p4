@extends('layouts.master')

@push('head')
    <link href='/css/appointment.css' rel='stylesheet'>
@endpush

@section('title')
    New Appointment
@endsection

@section('content')

    <h1>Make a New Appointment</h1>

    <form method='POST' action='/Appointment'>

        {{ csrf_field() }}

        <p>Please fill out the form below so that we can arrange an instructor to help you, * are required fields.</p>

        <label for='name'>* Your Name</label>
        <input type='text' name='name' id='name' placeholder="Please enter your name">
     

        <label for='subject'>* Subject for Help</label>
        <input type='text' name='subject' id='subject' placeholder="Please enter your subject">
      

        <label for='location'>* Location</label>
        <input type='text' max='50' name='location' id='location' placeholder="Please enter your address">
      

        <label for='date'>* Date </label>
        <input type='date' name='date' id='date' placeholder="Please enter the date of your session">
    

        <label for='start_time'>* Start Time </label>
        <input type='time' name='start_time' id='start_time' placeholder="Pick the start time of your session">

        <label for='end_time'>* End Time </label>
        <input type='time' name='end_time' id='end_time' placeholder="Pick the end time of your session">

        <label for='phone'>* Phone Number </label>
        <input type='tel' name='phone' id='phone' placeholder="Enter your phone number">

        <label for='topic'>* Topic </label>
        <input type='text' name='topic' id='topic' placeholder="Enter your topic that you need help">
        
        </br>
        <input type='submit' value='Make this Appointment' class='btn btn-primary btn-small'>
    </form>

@endsection
