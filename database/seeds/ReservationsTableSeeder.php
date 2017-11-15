<?php

use Illuminate\Database\Seeder;
Use App\Reservation;

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
        ['Brooke Williams', 'Math 12', '1677 Hazy Extension, Horsefly BC', '20171212', '1230', '1430', '2366079','Polynomial Equations'],
        ['Lynn	Shaw', 'Chemsitry 11', '7109 Heather Island Place, Mcdames Creek BC', '20171210', '1330', '1530','7920675','Classification of Matter'],
        ['Juana	Hubbard', 'Physics 12', '5523 Old Creek Byway, Canyon City BC','20171213', '1030', '1230', '7940877','Dynamics'],
        ['Tanya	Day', 'Physics 11', '9459 Velvet Panda Heights, Blue River BC', '20171130', '1600', '1800', '7806909','Uniform Acceleration'],
        ['Carl Casey', 'Chemsitry 12', '6741 Merry Corner, Cherryville BC','20171128', '1600', '1800','7708538', 'Reaction Kinetics'],
        ['Warren Snyder', 'Math 11', '9997 Stony Horse Parade, Nootka BC', '20171201', '1300', '1500', '9265147',  'Radical Equation'],
    ];

    
    foreach ($reservations as $key => $reservation) {
        Reservation::insert([
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
            'name' => $reservation[0],
            'subject' => $reservation[1],
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

