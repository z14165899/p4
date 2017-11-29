@extends('layouts.master')

@push('head')
    <link href='/css/manage.css' rel='stylesheet'>
@endpush

@section('title')
    Manage all Courses and Instructor Information 
@endsection

@section('content')
<h1>All Course Information</h1>
@foreach($courses as $course)
        <div>
            <img src='{{ $course['image'] }}' alt='Course image for {{ $course['name'] }}'>
            <h2>{{ $course['name'] }}</h2>
            <p>By {{ $course['instructors'] }}</p>
            <a href='/course/{{ $course['id'] }}'>View</a> |
            <a href='/course/{{ $course['id'] }}/edit'>Edit</a> |
            <a href='/course/{{ $course['id'] }}/delete'>Delete</a>
        </div>
    @endforeach

@endsection