@extends('layouts.master')

@push('head')
    <link href='/css/delete.css' rel='stylesheet'>
@endpush

@section('title')
    Confirm deletion: {{ $course->name }}
@endsection

@section('content')
    <h1>Confirm Deletion</h1>

    <p>Are you sure you want to delete the course of <strong>{{ $course->name }} {{ $course->level }}</strong>?</p>

    <h2>{{ $course['name'] }} {{ $course->level }}</h2>
    <p><img src='{{ $course['image'] }}' class='cover' alt='Cover image for {{ $course['name'] }} {{ $course['level'] }}'></p>
    <p>by Instructor: {{ $course['instructor'] }}</p>
    <p>{{ $course['description'] }}</p>
    <p>Price: {{ $course['price'] }}</p>
    <p><a href='{{ $course['link']}}'> Link of Course Notes</a></p>

    <div>
    <form method='POST' action='/course/{{ $course->id }}'>
        {{ method_field('delete') }}
        {{ csrf_field() }}
        <input type='submit' value='Yes, delete it!' class='btn btn-danger btn-small'>
    </form>

    <p class='btn btn-info btn-small'>
        <a href='{{ $previousUrl }}'>No, I changed my mind.</a>
    </p>
    </div>
@endsection