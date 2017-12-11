<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demand extends Model
{
	public static function getForCheckboxes()
	{
    	$demands = Demand::orderBy('name')->get();

    	$demandsForCheckboxes = [];

    	foreach ($demands as $demand) {
        $demandsForCheckboxes[$demand['id']] = $demand->name;
    	}

    	return $demandsForCheckboxes;
	}

    public function reservations() 
    {
    return $this->belongsToMany('App\Reservation')->withTimestamps();
	}
}
