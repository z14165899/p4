@extends('layouts.master')

@push('head')
    <link href='/css/delete.css' rel='stylesheet'>
@endpush

@section('title')
    Confirm deletion: {{ $reservation->name }}
@endsection

@section('content')
    <h1>Confirm Deletion</h1>
    
    <p>Are you sure you want to delete the appiontment of <strong>{{ $reservation->name }}</strong>?</p>

    <h2>{{ $reservation['name'] }}</h2>
        <p>Subject: {{ $reservation['subject'] }}</p>
        <p>Location: {{ $reservation['location'] }}</p>
        <p>Date: {{ $reservation['date'] }}</p>
        <p>Start Time: {{ $reservation['start_time'] }}</p>
        <p>End Time: {{ $reservation['end_time'] }}</p>
        <p>Phone Number: {{ $reservation['phone'] }}</p>
        <p>Topic: {{ $reservation['topic'] }}</p>

    <div>
    <form method='POST' action='/reservation/{{ $reservation->id }}'>
        {{ method_field('delete') }}
        {{ csrf_field() }}
        <input type='submit' value='Yes, delete it!' class='btn btn-danger btn-small'>
    </form>

    <p class='btn btn-info btn-small'>
        <a href='{{ $previousUrl }}'>No, I changed my mind.</a>
    </p>
    </div>

@endsection