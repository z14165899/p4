<?php

use Illuminate\Database\Seeder;
use App\Demand;

class DemandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $demands = ['Bring Computer', 'Bring Extra Practice', 'Chapter Review', 'Midterm Review', 'Final Review', 'Preview Chapter','Help on Assignment','Help on Project'];

    foreach ($demands as $demandName) {
        $demand = new Demand();
        $demand->name = $demandName;
        $demand->save();
    }
    }
}
