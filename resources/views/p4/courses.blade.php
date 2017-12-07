@extends('layouts.master')

@push('head')
    <link href='/css/courses.css' rel='stylesheet'>
@endpush

@section('title')
    {{ $course->name }} {{$course['level']}}
@endsection

@section('content')
    <h2>{{ $course['name'] }} {{$course['level']}}</h2>
    <img src='{{ $course['image'] }}' class='cover' alt='Cover image for {{ $course['title'] }}'>

    <p>By {{ $course['instructor'] }}</p>
    <p>{{ $course['description'] }}</p>

    <p><a href='{{ $course['link'] }}'>Please refer to course notes here</a></p>
    <p>Price: {{ $course['price'] }}</p>
    <div><a href='/{{ $course['id'] }}/edit'>Edit</a> |
    <a href='/{{ $course['id'] }}/delete'>Delete</a></div>

@endsection
