<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
   protected $fillable = ['name', 'filter_id', 'images'];

   public function filter()
   {
   	return $this->belongsTo('App\Filter');
   }
}
