@extends('layouts.master')

@push('head')
    <link href='/css/reservations.css' rel='stylesheet'>
@endpush

@section('title')
    My Reservations
@endsection

@section('content')

    <h1>All My Tutoring Sessions are listed below</h1>

    @foreach($reservations as $reservation)
        <div>
            <h2>{{ $reservation['name'] }}</h2>
            <p>Subject: {{ $reservation['subject'] }}</p>
            <p>Location: {{ $reservation['location'] }}</p>
            <p>Date: {{ $reservation['date'] }}</p>
            <p>Start Time: {{ $reservation['start_time'] }}</p>
            <p>End Time: {{ $reservation['end_time'] }}</p>
            <p>Phone Number: {{ $reservation['phone'] }}</p>
            <p>Topic: {{ $reservation['topic'] }}</p>
            <a href='/course/{{ $reservation['id'] }}'>View</a> |
            <a href='/course/{{ $reservation['id'] }}/edit'>Edit</a> |
            <a href='/course/{{ $reservation['id'] }}/delete'>Delete</a>
        </div>
    @endforeach

@endsection