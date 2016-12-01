<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
          'name' => 'sanjeet',
          'email' => 'sanjeet@gmail.com',
          'mobile'=>'9445165233',
          'password' => bcrypt('sanjeet'),
          'roleId'=>'1',
      ]);
    }
}
