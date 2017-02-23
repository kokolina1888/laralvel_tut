<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       //DB::table('users')->truncate();       
       DB::table('users')->insert(['name'=>'user22', 'email'=>'email_koko@email.com', 'password'=>bcrypt('123456')]);
      
    }
}
