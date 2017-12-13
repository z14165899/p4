@extends('layouts.master')

@push('head')
    <link href='/css/index.css' rel='stylesheet'>
@endpush

@section('title')
    Welcome to Tutoring Session
@endsection

@section('content')

	<h1>Register an Account and Let us Help You Handle All the Troubles in Your Studies </h1>
	<p>We have served thousands of student on their courses from high school to university so that they can earn the ideal grade they deserve!<p>
	<h2>Our Most Popular Courses Below</h2>
	<div id='courses'>
	  @foreach($courses as $course)
	        <div>
	            <img src='{{ $course['image'] }}' alt='Course image for {{ $course['name'] }}'>
	            <h2>{{ $course['name'] }} {{ $course['level'] }}</h2>
	            <p>By {{ $course['instructor'] }}</p>
	        </div>
	    @endforeach
	</div>
@endsection
