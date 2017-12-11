<?php

use Illuminate\Database\Seeder;
use App\Student;

class StudentsTableSeeder extends Seeder
{
    public function run()
    {
        //Array of student data to add
        $students = [
        ['Brooke', 'Williams', '19990924', 'male', '12'],
        ['Lynn', 'Shaw', '19990216', 'female', '12'],
        ['Juana', 'Hubbard', '19990621', 'female', '12'],
        ['Tanya', 'Day', '20000518', 'female', '11'],
        ['Carl', 'Casey', '19990413', 'male', '12'],
        ['Warren', 'Snyder', '20000616', 'male', '11'],
    ];
    $count = count($students);

    # Loop through each author, adding them to the database
    foreach ($students as $student) {
        Student::insert([
            'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
            'first_name' => $student[0],
            'last_name' => $student[1],
            'birth_date' => $student[2],
            'gender' => $student[3],
            'school_year' => $student[4]
        ]);
        $count--;
    }
    }
}
