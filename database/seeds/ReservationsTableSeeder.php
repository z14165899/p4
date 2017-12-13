<?php

use Illuminate\Database\Seeder;
use App\Reservation;
use App\Student;

class ReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reservations = [
        ['Brooke Williams', 4, '1677 Hazy Extension, Horsefly BC', '20171212', '123000', '143000', '7782366079','Polynomial Equations'],
        ['Lynn Shaw', 3, '7109 Heather Island Place, Mcdames Creek BC', '20171210', '133000', '153000','6047920675','Classification of Matter'],
        ['Juana Hubbard', 5, '5523 Old Creek Byway, Canyon City BC','20171213', '103000', '123000', '7787940877','Dynamics'],
        ['Tanya Day', 2, '9459 Velvet Panda Heights, Blue River BC', '20171130', '160000', '180000', '6047806909','Uniform Acceleration'],
        ['Carl Casey', 6, '6741 Merry Corner, Cherryville BC','20171128', '160000', '180000','6047708538', 'Reaction Kinetics'],
        ['Warren Snyder', 1, '9997 Stony Horse Parade, Nootka BC', '20171201', '130000', '150000', '7789265147',  'Radical Equation'],
    ];

    
    foreach ($reservations as $key => $reservation) {
         # First, figure out the id of the student we want to associate with this appiontment

            # Extract just the last name from the reservation data...
            # Brooke Williams => ['Brooke, 'Williams'] => 'Williams'
            $name = explode(' ', $reservation[0]);
            $lastName = array_pop($name);

            # Find that student in the students table
            $student_id = Student::where('last_name', '=', $lastName)->pluck('id')->first();

        Reservation::insert([
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
            'student_id' => $student_id,
            'course_id' => $reservation[1],
            'location' => $reservation[2],
            'date' => $reservation[3],
            'start_time' => $reservation[4],
            'end_time'=>$reservation[5],
            'phone'=>$reservation[6],
            'topic'=>$reservation[7]
            ]);
        }
    }
}

