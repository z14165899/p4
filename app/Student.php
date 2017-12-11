<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	public static function getForDropdown()
	{
		$students = Student::orderBy('last_name')->get();

    	foreach ($students as $student) {
        $studentsForDropdown[$student->id] = $student->first_name.' '.$student->last_name;
    	}
    	return $studentsForDropdown;
	}

    public function reservations()
    {
        # Students has many reservations
        # Define a one-to-many relationship.
        return $this->hasMany('App\Reservation');
    }
}
