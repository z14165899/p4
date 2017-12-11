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
        @include('modules.error', ['fieldName' => 'name'])
     
        <label for='subject'>* Subject for Help</label>
        <input type='text' name='subject' id='subject' value='{{ $reservation->subject }}'> 
        @include('modules.error', ['fieldName' => 'subject'])

        <label for='location'>* Location</label>
        <input type='text' max='50' name='location' id='location' value='{{ $reservation->location }}'>
        @include('modules.error', ['fieldName' => 'location'])
      
        <label for='date'>* Date </label>
        <input type='date' name='date' id='date' value='{{ $reservation->date }}'>
        @include('modules.error', ['fieldName' => 'date'])
    
        <label for='start_time'>* Start Time </label>
        <input type='time' name='start_time' id='start_time' value='{{ $reservation->start_time }}'>
        @include('modules.error', ['fieldName' => 'start_time'])

        <label for='end_time'>* End Time </label>
        <input type='time' name='end_time' id='end_time' value='{{ $reservation->end_time }}'>
        @include('modules.error', ['fieldName' => 'end_time'])

        <label for='phone'>* Phone Number </label>
        <input type='tel' name='phone' id='phone' value='{{ $reservation->phone }}'>
        @include('modules.error', ['fieldName' => 'phone'])

        <label for='topic'>* Topic </label>
        <input type='text' name='topic' id='topic' value='{{ $reservation->topic }}'>
        @include('modules.error', ['fieldName' => 'topic'])

         <label for='demands'>Your Requests</label>
        <div>
        @foreach ($demandsForCheckboxes as $id => $name)
        <input type='checkbox' value='{{ $id }}' name='demands[]'
            {{ (isset($demandsForThisReservation) and in_array($name, $demandsForThisReservation)) ? 'CHECKED' : '' }}>
            {{ $name }} <br>
        @endforeach
        </div>
        
        </br>
        <input type='submit' value='Edit this Appointment' class='btn btn-primary btn-small'>
    </form>

@endsection
