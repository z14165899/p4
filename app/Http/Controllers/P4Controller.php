<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Reservation;

class P4Controller extends Controller
{
	//Show Home Page
    public function index()
    {
        $courses = Course::orderBy('name')->get();

        return view('p4.index')->with([
            'courses' => $courses,
        ]);
    }

    //Manage all Courses
    public function manage()
    {
        $courses = Course::orderBy('name')->get();

        return view('p4.manage')->with([
            'courses' => $courses,
        ]);
    }

    //Show a Course
	public function show($id)
    {
        $course = Course::find($id);

        if (!$course) {
            return redirect('/')->with('alert', 'Course not found');
        }

        return view('p4.courses')->with([
            'course' => $course
        ]);
    }

    //Edit an Appiontment
     public function edit($id)
    {
        $reservation = Reservation::find($id);

        if (!$reservation) {
            return redirect('/reservations')->with('alert', 'Reservation not found');
        }

        return view('p4.edit')->with(['reservation' => $reservation]);
    }

    //Save the changed appointment to database
     public function update(Request $request, $id)
    {
        $this->validate($request, [
    	 	'name' => 'required|min:5',
            'subject' => 'required|min:3',
            'location' => 'required',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'phone' => 'required|min:10|numeric',
            'topic' => 'required|min:5',
        ]);

        $reservation = Reservation::find($id);

        $reservation->name = $request->input('name');
        $reservation->subject = $request->input('subject');
        $reservation->location = $request->input('location');
        $reservation->date = $request->input('date');
        $reservation->start_time = $request->input('start_time');
        $reservation->end_time = $request->input('end_time');
        $reservation->phone = $request->input('phone');
        $reservation->topic = $request->input('topic');
        $reservation->save();

        return redirect('/reservations')->with('alert', 'Your changes were saved.');
    }

    //Show all Appointment
    public function appointment()
    {
        return view('p4.appointment');
    }

    //Register an User
 	public function register()
    {
        return view('p4.register');
    }

    //Show all Reservations
    public function reservations()
    {
    	$reservations = Reservation::orderBy('name')->get();

        return view('p4.reservations')->with([
            'reservations' => $reservations,
        ]);;
    }

    //Make an Appointment
    public function reserve(Request $request){
    	 $this->validate($request, [
    	 	'name' => 'required|min:5',
            'subject' => 'required|min:3',
            'location' => 'required',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'phone' => 'required|min:10|numeric',
            'topic' => 'required|min:5',
        ]);

        # Add a new reservation to the database
        $reservation = new Reservation();
        $reservation->name = $request->input('name');
        $reservation->subject = $request->input('subject');
        $reservation->location = $request->input('location');
        $reservation->date = $request->input('date');
        $reservation->start_time = $request->input('start_time');
        $reservation->end_time = $request->input('end_time');
        $reservation->phone = $request->input('phone');
        $reservation->topic = $request->input('topic');
        $reservation->save();

        return redirect('/reservations')->with('alert', 'This reservation of '.$request->input('name').' was added.');
    }
}

