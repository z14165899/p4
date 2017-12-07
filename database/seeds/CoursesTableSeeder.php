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
        ['Math', '11', 'Magni Lindsey', 'http://www.nelson.com/math/0176157573/images/0176157573.jpg', 'Welcome to Math 11', '40$/hour', 'http://www.bcmath.ca/PC11/PC11main.htm'],
        ['Physics', '11', 'Virgee Harris', 'https://images-na.ssl-images-amazon.com/images/I/41fThdqU87L._BO1,204,203,200_.jpg', 'Welcome to Physics 11', '40$/hour', 'https://yungmingliu.wikispaces.com/BC+Physics+11'],
        ['Chemsitry', '11', 'Virgil	Barrett', 'https://images-na.ssl-images-amazon.com/images/I/51SwOyJLqkL._SX258_BO1,204,203,200_.jpg','Welcome to Chemsitry 11', '45$/hour', 'https://noteshelp.wordpress.com/chemistry-11/'],
        ['Math', '12', 'Eloise Page', 'https://www.spsd.sk.ca/program/online/ProgramsServices/courses/PublishingImages/mpc30.jpg', 'Welcome to Math 12', '45$/hour', 'https://noteshelp.wordpress.com/math-12/'],
        ['Physics', '12', 'Adrienne	Barber', 'https://sites.google.com/a/hdsb.ca/mr-quenneville/_/rsrc/1439236139797/home/grade-12-college-physics/NelsonCollegePhysics12.jpg?height=400&width=309', 'Welcome to Physics 12', '50$/hour', 'https://noteshelp.wordpress.com/physics-12/'],
        ['Chemsitry', '12', 'Peggy Olson', 'http://www.bcscta.ca/resources/Hebden%2012%20cover.jpg', 'Welcome to Chemsitry 12', '45$/hour', 'https://noteshelp.wordpress.com/chemistry-12/'],
        ['Biology', '11', 'Ellary Anderson', 'https://www.mheducation.ca/sciencecanada/wp-content/uploads/sites/7/2016/04/9780070915800.jpeg', 'Welcome to Biology 11', '45$/hour', 'https://noteshelp.wordpress.com/biology-11/'],
        ['Biology', '12', 'Katey Sampertin', 'https://images-na.ssl-images-amazon.com/images/I/51Ny8AKw82L.jpg', 'Welcome to Biology 12', '50$/hour', 'https://noteshelp.wordpress.com/biology-12/']

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

