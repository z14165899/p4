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
        ['Math', '11', 'Magni Lindsey', '/img/Math11.jpg', 'Welcome to Math 11', '40$/hour', 'http://www.bcmath.ca/PC11/PC11main.htm'],
        ['Physics', '11', 'Virgee Harris', '/img/Physics11.jpg', 'Welcome to Physics 11', '40$/hour', 'https://yungmingliu.wikispaces.com/BC+Physics+11'],
        ['Chemistry', '11', 'Virgil	Barrett', '/img/Chemistry11.jpg','Welcome to Chemsitry 11', '45$/hour', 'https://noteshelp.wordpress.com/chemistry-11/'],
        ['Math', '12', 'Eloise Page', '/img/Math12.jpg', 'Welcome to Math 12', '45$/hour', 'https://noteshelp.wordpress.com/math-12/'],
        ['Physics', '12', 'Adrienne	Barber', '/img/Physics12.jpg', 'Welcome to Physics 12', '50$/hour', 'https://noteshelp.wordpress.com/physics-12/'],
        ['Chemistry', '12', 'Peggy Olson', '/img/Chemistry12.jpg', 'Welcome to Chemsitry 12', '45$/hour', 'https://noteshelp.wordpress.com/chemistry-12/'],
        ['Biology', '11', 'Ellary Anderson', '/img/Biology11.jpg', 'Welcome to Biology 11', '45$/hour', 'https://noteshelp.wordpress.com/biology-11/'],
        ['Biology', '12', 'Katey Sampertin', '/img/Biology12.jpg', 'Welcome to Biology 12', '50$/hour', 'https://noteshelp.wordpress.com/biology-12/']

    ];

    
    foreach ($courses as $key => $course) {
        Course::insert([
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
            'name' => $course[0],
            'level' => $course[1],
            'instructor' => $course[2],
            'image' => $course[3],
            'description' => $course[4],
            'price' => $course[5],
            'link'=>$course[6]
        ]);
    }
    }
}

