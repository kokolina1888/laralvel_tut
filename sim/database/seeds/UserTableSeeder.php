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
       DB::table('users')->insert(['name'=>'user22', 'email'=>'email22@email.com', 'password'=>'123456']);
       DB::table('users')->insert(['name'=>'user', 'email'=>'email@email.com', 'password'=>'123456']);
    }
}
