@extends('layouts.master')

@push('head')
    <link href='/css/appointment.css' rel='stylesheet'>
@endpush

@section('title')
    New Appointment
@endsection

@section('content')

    <h1>Make a New Appointment</h1>

    <form method='POST' action='/reservations'>

        {{ csrf_field() }}

        <p>Please fill out the form below so that we can arrange an instructor to help you, * are required fields.</p>
        

        <label for='name'>* Student Name</label>
        <select name='name' id='name'>
        <option value='' selected='selected' disabled='disabled'>Choose one...</option>
        @foreach($studentsForDropdown as $id => $name)
            <option value='{{ $id }}'>{{ $name }}</option>
        @endforeach
        </select>
        @include('modules.error', ['fieldName' => 'name'])

        <label for='subject'>* Subject for Help</label>
        <input type='text' name='subject' id='subject' placeholder="Please enter your subject">
        @include('modules.error', ['fieldName' => 'subject'])

        <label for='location'>* Location</label>
        <input type='text' max='50' name='location' id='location' placeholder="Please enter your address">
        @include('modules.error', ['fieldName' => 'location'])

        <label for='date'>* Date </label>
        <input type='date' name='date' id='date' placeholder="Please enter the date of your session">
        @include('modules.error', ['fieldName' => 'date'])

        <label for='start_time'>* Start Time </label>
        <input type='time' name='start_time' id='start_time' placeholder="Pick the start time of your session">
        @include('modules.error', ['fieldName' => 'start_time'])

        <label for='end_time'>* End Time </label>
        <input type='time' name='end_time' id='end_time' placeholder="Pick the end time of your session">
        @include('modules.error', ['fieldName' => 'end_time'])

        <label for='phone'>* Phone Number </label>
        <input type='tel' name='phone' id='phone' placeholder="Enter your phone number">
        @include('modules.error', ['fieldName' => 'phone'])

        <label for='topic'>* Topic </label>
        <input type='text' name='topic' id='topic' placeholder="Enter your topic that you need help">
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
        <input type='submit' value='Make this Appointment' class='btn btn-primary btn-small'>
    </form>

@endsection
