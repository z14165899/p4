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
        ['Math', '11', 'Magni Lindsey', '/img/Math11.jpg', 'Welcome to Math 11. This course will equip you with fundemental knowledage of basic mathematic operation and quadratic function. They are very important for all future science course.', '40$/hour', 'http://www.bcmath.ca/PC11/PC11main.htm'],
        ['Physics', '11', 'Virgee Harris', '/img/Physics11.jpg', 'Welcome to Physics 11. This course will teach you the basic concepts of motion, force and energy so that you will be clear about how the fundemental law of physiscs works around us.', '40$/hour', 'https://yungmingliu.wikispaces.com/BC+Physics+11'],
        ['Chemistry', '11', 'Virgil	Barrett', '/img/Chemistry11.jpg','Welcome to Chemsitry 11. This course covers basic calculations in chemistry including mole concept, concentration, stoichiometry, classification of matter and periodic table.', '45$/hour', 'https://noteshelp.wordpress.com/chemistry-11/'],
        ['Math', '12', 'Eloise Page', '/img/Math12.jpg', 'Welcome to Math 12. This course is a good preparation course for future calculus. In this course, you will learn exponential and logarithmic functions, and various trigonometric identities.', '45$/hour', 'https://noteshelp.wordpress.com/math-12/'],
        ['Physics', '12', 'Adrienne	Barber', '/img/Physics12.jpg', 'Welcome to Physics 12. This course will introduce you to more complex natural physical behaviors, such as momentum and impulse, circular motion and gravitation and electrical forces.', '50$/hour', 'https://noteshelp.wordpress.com/physics-12/'],
        ['Chemistry', '12', 'Peggy Olson', '/img/Chemistry12.jpg', 'Welcome to Chemsitry 12. Chemistry 12 will advance your knowledage of chemistry to multiple new areas. You will start to understand reaction kinetics, solubility equilibrium.', '45$/hour', 'https://noteshelp.wordpress.com/chemistry-12/'],
        ['Biology', '11', 'Ellary Anderson', '/img/Biology11.jpg', 'Welcome to Biology 11. This course will greatly expand your knowledage of living creature around us. You will learn protists, mycology, plant biology and animal biology.', '45$/hour', 'https://noteshelp.wordpress.com/biology-11/'],
        ['Biology', '12', 'Katey Sampertin', '/img/Biology12.jpg', 'Welcome to Biology 12. This course provide you much profound knowledage about DNA and RNA stucture and function. You will also start to understand how gene express themselves.', '50$/hour', 'https://noteshelp.wordpress.com/biology-12/']

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

