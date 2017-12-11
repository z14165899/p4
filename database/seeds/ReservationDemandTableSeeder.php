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
        'Brooke Williams' => ['Bring Computer', 'Bring Extra Practice'],
        'Lynn Shaw' => ['Midterm Review','Help on Assignment'],
        'Juana Hubbard' => ['Bring Extra Practice', 'Chapter Review'],
        'Tanya Day' => ['Final Review','Help on Project'],
        'Carl Casey' => ['Help on Project', 'Bring Computer'],
        'Warren Snyder' => ['Preview Chapter', 'Bring Extra Practice']
    ];

    # Now loop through the above array, creating a new pivot for each reservation to demand
    foreach ($reservations as $name => $demands) {

        # First get the reservation
        $reservation = Reservation::where('name', 'like', $name)->first();

        # Now loop through each demand for this reservation, adding the pivot
        foreach ($demands as $demandName) {
            $demand = Demand::where('name', 'LIKE', $demandName)->first();

            # Connect this demand to this reservation
            $reservation->demands()->save($demand);
        }
    }
    }
}
