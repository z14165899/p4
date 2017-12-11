<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Reservation;
use App\Student;
use App\Demand;

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
        $demandsForCheckboxes = Demand::getForCheckboxes();

        if (!$reservation) {
            return redirect('/reservations')->with('alert', 'Reservation not found');
        }

        return view('p4.edit')->with(['reservation' => $reservation, 'demandsForCheckboxes' => $demandsForCheckboxes]);
    }

    //Edit a Course
     public function change($id)
    {
        $course = Course::find($id);

        if (!$course) {
            return redirect('/')->with('alert', 'Course not found');
        }

        return view('p4.change')->with(['course' => $course]);
    }

    //Save the changed course to database
	public function modify(Request $request, $id)
    {
        $this->validate($request, [
    	 	'name' => 'required|min:5',
            'level' => 'required',
            'instructor' => 'required|min:5',
            'image' => 'required|url',
            'description' => 'required|min:10',
            'price' => 'required',
            'link' => 'required|url',
        ]);

        $course = Course::find($id);

        $course->name = $request->input('name');
        $course->level = $request->input('level');
        $course->instructor = $request->input('instructor');
        $course->image = $request->input('image');
        $course->description = $request->input('description');
        $course->price = $request->input('price');
        $course->link = $request->input('link');
        $course->save();

        return redirect('/')->with('alert', 'Your changes of '.$course->name.' '.$course->level.' were saved.');
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

        $reservation->demands()->sync($request->input('demands'));

        $reservation->name = $request->input('name');
        $reservation->subject = $request->input('subject');
        $reservation->location = $request->input('location');
        $reservation->date = $request->input('date');
        $reservation->start_time = $request->input('start_time');
        $reservation->end_time = $request->input('end_time');
        $reservation->phone = $request->input('phone');
        $reservation->topic = $request->input('topic');
        $reservation->save();

        return redirect('/reservations')->with('alert', 'Your changes of '.$reservation->name.'\'s appiontment were saved.');
    }

    //Delete an course
     public function confirm($id)
    {
        $course = Course::find($id);

        if (!$course) {
            return redirect('/')->with('alert', 'Course not found');
        }

        return view('p4.destroy')->with(['course' => $course, 'previousUrl' => url()->previous() == url()->current() ? '/reservations' : url()->previous()]);
    }

     
     public function destroy($id)
    {
        $course = Course::find($id);

        if (!$course) {
            return redirect('/course')->with('alert', 'Course not found');
        }

        $course->delete();

        return redirect('/')->with('alert', $course->name.' '.$course->level.' was deleted.');
    }


    //Delete an appiontment
     public function delete($id)
    {
        $reservation = Reservation::find($id);

        if (!$reservation) {
            return redirect('/reservations')->with('alert', 'Appointment not found');
        }

        return view('p4.delete')->with(['reservation' => $reservation, 'previousUrl' => url()->previous() == url()->current() ? '/reservations' : url()->previous()]);
    }

     
     public function remove(Request $request, $id)
    {
        $reservation = Reservation::find($id);

		$reservation->demands()->detach();

        $reservation->delete();

        return redirect('/reservations')->with('alert', 'The appiontment of '.$reservation->name.' was deleted.');
    }


    //Show all Appointment
    public function appointment()
    {
    	$studentsForDropdown = Student::getForDropdown();
    	$demandsForCheckboxes = Demand::getForCheckboxes();

        return view('p4.appointment')->with([
        	'studentsForDropdown' => $studentsForDropdown,
        	'demandsForCheckboxes' => $demandsForCheckboxes,
        ]);
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
    	  	'name' => 'required',
            'subject' => 'required|min:3',
            'location' => 'required|min:5',
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
        $reservation->student_id = $request->input('student');
        $reservation->save();
        $reservation->demands()->sync($request->input('demands'));

        return redirect('/reservations')->with('alert', 'This reservation of '.$request->input('name').' was added.');
    }
}

