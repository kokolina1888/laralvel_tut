<?php

namespace Corp;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{

	protected $fillable = ['title', 'path', 'parent', 'user_id'];

	public function user()
	{
		return $this->belongsTo('Corp\User');
	}

	public function delete(array $options = []) {
    	
    	// $this
    	self::where('parent',$this->id)->delete();
		
		
		return parent::delete($options);
	}
}
