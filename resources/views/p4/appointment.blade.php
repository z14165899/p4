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
        

        <label for='student_id'>* Student Name</label>
        <select name='student_id' id='student_id'>
        <option value='' selected='selected' disabled='disabled'>Choose one...</option>
        @foreach($studentsForDropdown as $id => $name)
            <option value='{{ $id }}' {{ old('student_id') == $id ? 'selected' : '' }}>{{ $name }}</option>
        @endforeach
        </select>
        @include('modules.error', ['fieldName' => 'name'])

        <label for='course_id'>* Subject for Help</label>
        <select name='course_id' id='course_id'>
+        <option value='' selected='selected' disabled='disabled'>Choose one...</option>
+        @foreach($coursesForDropdown as $id => $name)
+            <option value='{{ $id }}' {{ old('course_id') == $id ? 'selected' : '' }}>{{ $name }}</option>
+        @endforeach
+        </select>
        @include('modules.error', ['fieldName' => 'course_id'])

        <label for='location'>* Location</label>
        <input type='text' name='location' id='location' placeholder="Please enter your address" value="{{ old('location') }}">
        @include('modules.error', ['fieldName' => 'location'])

        <label for='date'>* Date </label>
        <input type='date' name='date' id='date' value="{{ old('date')}}">
        @include('modules.error', ['fieldName' => 'date'])

        <label for='start_time'>* Start Time </label>
        <input type='time' name='start_time' id='start_time' value="{{ old('start_time') }}">
        @include('modules.error', ['fieldName' => 'start_time'])

        <label for='end_time'>* End Time </label>
        <input type='time' name='end_time' id='end_time' value="{{ old('end_time') }}">
        @include('modules.error', ['fieldName' => 'end_time'])

        <label for='phone'>* Phone Number </label>
        <input type='tel' name='phone' id='phone' placeholder="Enter your phone number" value="{{ old('phone') }}">
        @include('modules.error', ['fieldName' => 'phone'])

        <label for='topic'>* Topic </label>
        <input type='text' name='topic' id='topic' placeholder="Enter your topic that you need help" value="{{ old('topic') }}">
        @include('modules.error', ['fieldName' => 'topic'])  
        
        <label>Your Requests</label>
        <div>
        @foreach ($demandsForCheckboxes as $id => $name)
        <input type='checkbox' value='{{ $id }}' name='demands[]'
            {{ (old('demands') !== null && in_array($id, old('demands'))) ? 'checked' : '' }}>
            {{ $name }} <br/>
        @endforeach
        </div>

        <br/>
        <input type='submit' value='Make this Appointment' class='btn btn-primary btn-small'>
    </form>

@endsection
