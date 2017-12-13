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
        $reservation = Reservation::with('demands')->find($id);
        
        if (!$reservation) {
            return redirect('/reservations')->with('alert', 'Reservation not found');
        }

        $demandsForCheckboxes = Demand::getForCheckboxes();
        $studentsForDropdown = Student::getForDropdown();
        $coursesForDropdown = Course::getForDropdown();

        $demandsForThisReservation = [];
        	foreach ($reservation->demands as $demand) {
            	$demandsForThisReservation[] = $demand->name;
        }
        
        return view('p4.edit')->with([
        	'reservation' => $reservation, 
        	'demandsForCheckboxes' => $demandsForCheckboxes, 
        	'studentsForDropdown' => $studentsForDropdown, 
        	'demandsForThisReservation' => $demandsForThisReservation,
        	'coursesForDropdown' => $coursesForDropdown]);
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
    	 	'name' => 'required|min:4',
            'level' => 'required',
            'instructor' => 'required|min:5',
            'image' => 'required',
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
        	'student_id' => 'required',
            'course_id' => 'required',
            'location' => 'required',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'phone' => 'required|regex:/\d{10,}/',
            'topic' => 'required|min:5',
        ]);

        $reservation = Reservation::find($id);

        $reservation->demands()->sync($request->input('demands'));

        $reservation->student_id = $request->input('student_id');
        $reservation->course_id = $request->input('course_id');
        $reservation->location = $request->input('location');
        $reservation->date = $request->input('date');
        $reservation->start_time = $request->input('start_time');
        $reservation->end_time = $request->input('end_time');
        $reservation->phone = $request->input('phone');
        $reservation->topic = $request->input('topic');
        $reservation->save();

        $student = Student::where('id', $request->input('student_id'))->first();
        $student_name = $student->first_name.' '.$student->last_name;

        return redirect('/reservations')->with('alert', 'Your changes of '.$student_name.'\'s appiontment were saved.');
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

		$student = Student::where('id', $reservation->student_id)->first();
        $student_name = $student->first_name.' '.$student->last_name;

        $reservation->delete();

        return redirect('/reservations')->with('alert', 'The appiontment of '.$student_name.' was deleted.');
    }


    //Show all Appointment
    public function appointment()
    {
    	$studentsForDropdown = Student::getForDropdown();
    	$demandsForCheckboxes = Demand::getForCheckboxes();
    	$coursesForDropdown = Course::getForDropdown();

        return view('p4.appointment')->with([
        	'studentsForDropdown' => $studentsForDropdown,
        	'demandsForCheckboxes' => $demandsForCheckboxes,
        	'coursesForDropdown' => $coursesForDropdown,
        ]);
    }


    //Show all Reservations
    public function reservations()
    {
     	$reservations = Reservation::select('reservations.*', 'students.first_name', 'students.last_name')
            ->leftJoin('students', 'reservations.student_id', '=', 'students.id')
            ->orderBy('students.first_name')
            ->get();

        return view('p4.reservations')->with([
            'reservations' => $reservations,
        ]);
    }

    //Make an Appointment
    public function reserve(Request $request){
    	 $this->validate($request, [
    	  	'student_id' => 'required',
            'course_id' => 'required',
            'location' => 'required|min:5',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'phone' => 'required|regex:/\d{10,}/',
            'topic' => 'required|min:5',
        ]);

        # Add a new reservation to the database
        $reservation = new Reservation();
        $reservation->course_id = $request->input('course_id');
        $reservation->location = $request->input('location');
        $reservation->date = $request->input('date');
        $reservation->start_time = $request->input('start_time');
        $reservation->end_time = $request->input('end_time');
        $reservation->phone = $request->input('phone');
        $reservation->topic = $request->input('topic');
        $reservation->student_id = $request->input('student_id');
        $reservation->save();
        $reservation->demands()->sync($request->input('demands'));

        $student = Student::where('id', $request->input('student_id'))->first();
        $student_name = $student->first_name.' '.$student->last_name;

        return redirect('/reservations')->with('alert', 'This reservation of '.$student_name.' was added.');
    }
}

