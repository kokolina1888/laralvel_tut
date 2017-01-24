<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['_token', 'title', 'path'];
    public $directory = "/images/";

    public function setTitleAttribute($value)
    {
       $this->attributes['title'] = strtoupper($value);
    }
    public function getPathAttribute($value)
    {
    	return $this->directory.$value;
    }
}
