<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
     public function student()
    {
        # Book belongs to Student
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('App\Student');
    }

    public function course()
+    {
+        return $this->belongsTo('App\Course');
+    }

    public function demands()
	{
    	# With timetsamps() will ensure the pivot table has its created_at/updated_at fields automatically maintained
    	return $this->belongsToMany('App\Demand')->withTimestamps();
	}
}
