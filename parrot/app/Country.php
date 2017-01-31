<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function users()
    {
    	return $this->hasMany('App\Users');
    }

    public function lists()
    {
    	return $this->hasManyThrough('App\Tododlist', 'App\User');
    }
}
