<?php

use Illuminate\Database\Seeder;
use App\Todolist;

class TodolistTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//mine
        // for ($i=0; $i < 100; $i++) { 
        // 	Todolist::create([
        // 	'name'=>'seed name' . $i,
        // 	'description'=>'seed desc'.$i,
        // 	'note'=>'seed note' . $i

        // 	]);
        // }
    	//using faker

    	$faker = \Faker\Factory::create();

    	foreach (range(1, 50) as $index) {
    		Todolist::create([
    			'name'			=>$faker->sentence(1),
    			'description'	=>$faker->sentence(4),
    			'note'			=>$faker->sentence(2),

    			]);
    	}


    }
}
