<?php

use Illuminate\Database\Seeder;

use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$category = new App\Category;
    	$category->name = 'tech';
    	$category->save();

    	$category1 = new App\Category;
    	$category1->name = 'music';
    	$category1->save();

    }
}
