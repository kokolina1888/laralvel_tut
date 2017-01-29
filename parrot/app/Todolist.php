<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todolist extends Model
{
    use SoftDeletes;

   protected $dates = ['deleted_at'];
   protected $fillable = ['name', 'note', 'description'];

   public function isDueToday()
   {
   	$now = \Carbon::now();
   	if ($this->due_date->diff($now)->days == 0) {
   		return true;
   	} else {
   		return false;
   	}
   }
}
