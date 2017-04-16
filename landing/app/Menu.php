<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Menu extends Model
{
    public static function createMenu()
    {
    	$menu = [];
    	$pages = Page::all();

		// foreach($pages as $page) {
		// 	$item = ['title' =>$page->name,'alias'=>$page->alias];
		// 	array_push($menu,$item);
		// }
    	$item = array('title'=>'Home','alias'=>'home');
		array_push($menu,$item);
		
		$item = array('title'=>'Services','alias'=>'service');
		array_push($menu,$item);
		
		$item = array('title'=>'Portfolio','alias'=>'Portfolio');
		array_push($menu,$item);
		
		$item = array('title'=>'Team','alias'=>'team');
		array_push($menu,$item);
		
		$item = array('title'=>'Contact','alias'=>'contact');
		array_push($menu,$item);


    	return $menu;
    }

    //TO DO 
    public static function createSubMenu(){
    	
    }
}
