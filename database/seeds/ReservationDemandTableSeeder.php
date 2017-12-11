<?php

use Illuminate\Database\Seeder;
use App\Reservation;
use App\Demand;

class ReservationDemandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reservations =[
        1 => ['Bring Computer', 'Bring Extra Practice'],
        2 => ['Midterm Review','Help on Assignment'],
        3 => ['Bring Extra Practice', 'Chapter Review'],
        4 => ['Final Review','Help on Project'],
        5 => ['Help on Project', 'Bring Computer'],
        6 => ['Preview Chapter', 'Bring Extra Practice']
    ];

    # Now loop through the above array, creating a new pivot for each reservation to demand
    foreach ($reservations as $id => $demands) {

        # First get the reservation
        $reservation = Reservation::where('student_id', $id)->first();

        # Now loop through each demand for this reservation, adding the pivot
        foreach ($demands as $demandName) {
            $demand = Demand::where('name', 'LIKE', $demandName)->first();

            # Connect this demand to this reservation
            $reservation->demands()->save($demand);
        }
    }
    }
}
