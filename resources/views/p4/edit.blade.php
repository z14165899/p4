@extends('layouts.master')

@push('head')
    <link href='/css/appointment.css' rel='stylesheet'>
@endpush

@section('title')
    Edit {{ $reservation->name }}'s reservation'
@endsection

@section('content')

    <h1>Edit {{ $reservation->name }}'s reservation</h1>

    <form method='POST' action='/reservation/{{ $reservation->id }}'>

        {{ method_field('put') }}
        {{ csrf_field() }}

        <label for='name'>* Your Name</label>
        <input type='text' name='name' id='name' value='{{ $reservation->name }}'>
     
        <label for='subject'>* Subject for Help</label>
        <input type='text' name='subject' id='subject' value='{{ $reservation->subject }}'> 

        <label for='location'>* Location</label>
        <input type='text' max='50' name='location' id='location' value='{{ $reservation->location }}'>
      
        <label for='date'>* Date </label>
        <input type='date' name='date' id='date' value='{{ $reservation->date }}'>
    
        <label for='start_time'>* Start Time </label>
        <input type='time' name='start_time' id='start_time' value='{{ $reservation->start_time }}'>

        <label for='end_time'>* End Time </label>
        <input type='time' name='end_time' id='end_time' value='{{ $reservation->end_time }}'>

        <label for='phone'>* Phone Number </label>
        <input type='tel' name='phone' id='phone' value='{{ $reservation->phone }}'>

        <label for='topic'>* Topic </label>
        <input type='text' name='topic' id='topic' value='{{ $reservation->topic }}'>
        
        </br>
        <input type='submit' value='Edit this Appointment' class='btn btn-primary btn-small'>
    </form>

@endsection
