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
}

