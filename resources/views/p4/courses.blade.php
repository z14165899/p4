@extends('layouts.master')

@push('head')
    <link href='/css/courses.css' rel='stylesheet'>
@endpush

@section('title')
    {{ $course->name }} {{$course['level']}}
@endsection

@section('content')

    <h2>{{ $course['name'] }} {{ $course->level }}</h2>
    <p><img src='{{ $course['image'] }}' class='cover' alt='Cover image for {{ $course['name'] }} {{ $course['level'] }}'></p>
    <p>by Instructor: {{ $course['instructor'] }}</p>
    <p>{{ $course['description'] }}</p>
    <p>Price: {{ $course['price'] }}</p>
    <p><a href='{{ $course['link']}}'> Link of Course Notes</a></p>

    <div><a href='/course/{{ $course['id'] }}/edit'>Edit</a> |
    <a href='/manage'>Manage</a></div>

@endsection
