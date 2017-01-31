<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;


class Todolist extends Model 
{
    use SoftDeletes;
    
   protected $sluggable = array(
   			'build_from' 	=> 'name',
   			'save_to'		=> 'slug', );

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

   public function tasks()
   {
   	return $this->hasMany('App\Task');
   }

   public function categories()
   {
      return $this->belongsToMany('App\Category')
                  ->withPivot('description')
                  ->withTimestamps();
   }

   public function comments()
   {
      return $this->morphMany('App\Comment', 'commentable');
   }
}
