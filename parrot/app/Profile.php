<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public function user()
    {
    	return 4this->belongsTo('App\User');
    }
}
