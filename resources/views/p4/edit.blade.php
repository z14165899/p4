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

        <label for='student_id'>* Student</label>
        <select name='student_id' id='student_id'>
        <option value='{{ $reservation->student_id }}' selected='selected' disabled='disabled'>Choose one...</option>
        @foreach($studentsForDropdown as $id => $name)
            <option value='{{ $id }}' {{ $reservation->student_id == $id ? 'selected' : '' }}>{{ $name }}</option>
        @endforeach
        </select>
        @include('modules.error', ['fieldName' => 'course_id'])
     
        <label for='course_id'>* Subject for Help</label>
        <select name='course_id' id='course_id'>
        <option value='' selected='selected' disabled='disabled'>Choose one...</option>
        @foreach($coursesForDropdown as $id => $name)
            <option value='{{ $id }}' {{ $reservation->course_id == $id ? 'selected' : '' }}>{{ $name }}</option>
        @endforeach
        </select>
        @include('modules.error', ['fieldName' => 'course_id'])

        <label for='location'>* Location</label>
        <input type='text' name='location' id='location' value='{{ $reservation->location }}'>
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

        <label>Your Requests</label>
        <div>
        @foreach ($demandsForCheckboxes as $id => $name)
        <input type='checkbox' value='{{ $id }}' name='demands[]'
            {{ (isset($demandsForThisReservation) and in_array($name, $demandsForThisReservation)) ? 'CHECKED' : '' }}>
            {{ $name }} <br/>
        @endforeach
        </div>
        
        <br/>
        <input type='submit' value='Edit this Appointment' class='btn btn-primary btn-small'>
    </form>

@endsection
