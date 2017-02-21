<?php

use Illuminate\Database\Seeder;
use App\Admin;
use App\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
    }
}
