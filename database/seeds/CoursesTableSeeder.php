<?php

use Illuminate\Database\Seeder;
Use App\Course;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = [
        ['Math', '11', 'Magni Lindsey', 'http://www.nelson.com/math/0176157573/images/0176157573.jpg', 'Welcome to Math 11', 'http://www.chenzhao88.me/math11'],
        ['Physics', '11', 'Virgee Harris', 'https://images-na.ssl-images-amazon.com/images/I/41fThdqU87L._BO1,204,203,200_.jpg', 'Welcome to Physics 11', 'http://www.chenzhao88.me/physics11'],
        ['Chemsitry', '11', 'Virgil	Barrett', 'https://images-na.ssl-images-amazon.com/images/I/51SwOyJLqkL._SX258_BO1,204,203,200_.jpg','Welcome to Chemsitry 11', 'http://www.chenzhao88.me/chemsitry11'],
        ['Math', '12', 'Eloise Page', 'https://www.spsd.sk.ca/program/online/ProgramsServices/courses/PublishingImages/mpc30.jpg', 'Welcome to Math 12','http://www.chenzhao88.me/math12'],
        ['Physics', '12', 'Adrienne	Barber', 'https://sites.google.com/a/hdsb.ca/mr-quenneville/_/rsrc/1439236139797/home/grade-12-college-physics/NelsonCollegePhysics12.jpg?height=400&width=309', 'Welcome to Physics 12', 'http://www.chenzhao88.me/physics12'],
        ['Chemsitry', '12', 'Peggy Olson', 'http://www.bcscta.ca/resources/Hebden%2012%20cover.jpg', 'Welcome to Chemsitry 12',  'http://www.chenzhao88.me/chemsitry12'],
    ];

    
    foreach ($courses as $key => $course) {
        Course::insert([
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
            'name' => $course[0],
            'level' => $course[1],
            'instructors' => $course[2],
            'image' => $course[3],
            'description' => $course[4],
            'link'=>$course[5]
        ]);
    }
    }
}

