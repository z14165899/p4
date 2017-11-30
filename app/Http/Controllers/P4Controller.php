<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Reservation;

class P4Controller extends Controller
{
    public function index()
    {
        $courses = Course::orderBy('name')->get();

        return view('p4.index')->with([
            'courses' => $courses,
        ]);
    }

    public function manage()
    {
        $courses = Course::orderBy('name')->get();

        return view('p4.manage')->with([
            'courses' => $courses,
        ]);
    }

    public function appointment()
    {
        return view('p4.appointment');
    }

 	public function register()
    {
        return view('p4.register');
    }

    public function reservations()
    {
    	$reservations = Reservation::orderBy('name')->get();

        return view('p4.reservations')->with([
            'reservations' => $reservations,
        ]);;
    }

    public function reservation(Request $request){
    	 $this->validate($request, [
    	 	'name' => 'required|min:5',
            'subject' => 'required|min:3',
            'location' => 'required',
            'date' => 'required|min:8|date',
            'start_time' => 'required|numeric',
            'end_time' => 'required|numeric',
            'phone' => 'required|numeric',
            'topic' => 'required|min:5',
        ]);

        # Add new reservation to the database
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

