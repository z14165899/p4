<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
     function subject()
   {
        return $this->name.' '.$this->level;
    }

    public static function getForDropdown()
    {
        $courses = Course::orderBy('name')->get();

       foreach ($courses as $course) {
            $coursesForDropdown[$course->id] = $course->subject();
        }

        return $coursesForDropdown;
    }
}
