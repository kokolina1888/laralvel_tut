<?php

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //  
        //DB::table('pages')->truncate();

    	DB::table('pages')->insert(
    		// [
    		
    		// 'title'	=>'About', 
    		// 'url'	=> 'about',
    		// 'content'=>'this is about page',     
      //       'parent_id'=> null,
      //       'lft' =>3,
      //       'rgt' => 8,
      //       'depth'=>0  	
      //       ],
            // [
            
            // 'title' =>'Contact', 
            // 'url'   => 'contact',
            // 'content'=>'this is contact page',     
            // 'parent_id'=> 1,
            // 'lft' =>4,
            // 'rgt' => 5,
            // 'depth'=>1      
            // ],
            // [
            
            // 'title' =>'Media', 
            // 'url'   => 'media',
            // 'content'=>'this is media page',     
            // 'parent_id'=> null,
            // 'lft' =>1,
            // 'rgt' => 2,
            // 'depth'=>0      
            // ],
            // [
            
            // 'title' =>'FAQ', 
            // 'url'   => 'faq',
            // 'content'=>'this is faq page',     
            // 'parent_id'=> 1,
            // 'lft' =>6,
            // 'rgt' => 7,
            // 'depth'=>1      
            // ],
    		
        [
            
            'title' =>'Characters', 
            'url'   => 'characters',
            'content'=>'this is characters page',
            'parent_id'=> null,
            'lft' =>9,
            'rgt' => 10,
            'depth'=>0
        ]
            );
    }
}
