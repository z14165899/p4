@extends('layouts.master')

@push('head')
    <link href='/css/appointment.css' rel='stylesheet'>
@endpush

@section('title')
    Edit {{ $course->name }} {{ $course->level }}
@endsection

@section('content')

    <h1>Edit {{ $course->name }} {{ $course->level }}</h1>

    <form method='POST' action='/course/{{ $course->id }}'>

        {{ method_field('put') }}
        {{ csrf_field() }}

        <label for='name'>* Course Name</label>
        <input type='text' name='name' id='name' value='{{ $course->name }}'>
        @include('modules.error', ['fieldName' => 'name'])
     
        <label for='level'>* Course Level</label>
        <input type='text' name='level' id='level' value='{{ $course->level }}'> 
        @include('modules.error', ['fieldName' => 'level'])

        <label for='instructor'>* Instructor</label>
        <input type='text' max='50' name='instructor' id='instructor' value='{{ $course->instructor }}'>
        @include('modules.error', ['fieldName' => 'instructor'])
      
        <label for='image'>* Course Image </label>
        <input type='text' name='image' id='image' value='{{ $course->image }}'>
        @include('modules.error', ['fieldName' => 'image'])
    
        <label for='description'>* Course Description </label>
        <input type='text' name='description' id='description' value='{{ $course->description }}'>
        @include('modules.error', ['fieldName' => 'description'])

        <label for='price'>* Course Price </label>
        <input type='text' name='price' id='price' value='{{ $course->price }}'>
        @include('modules.error', ['fieldName' => 'price'])

        <label for='link'>* Link for Course Notes </label>
        <input type='text' name='link' id='link' value='{{ $course->link }}'>
        @include('modules.error', ['fieldName' => 'link'])
        
        </br>
        <input type='submit' value='Edit this Course' class='btn btn-primary btn-small'>
    </form>

@endsection