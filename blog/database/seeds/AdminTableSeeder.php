<?php

use Illuminate\Database\Seeder;

use App\Admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new App\Admin;
        $admin->email 		= 'test@test.com';
        $admin->password 	= bcrypt('komolin');
        $admin->save();	 
    }
}
