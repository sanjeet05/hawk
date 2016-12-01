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
        [
          'name' => 'Sanjeet Kumar',
          'email' => 'sanjeet@gmail.com',
          'mobile'=>'9445165233',
          'password' => bcrypt('sanjeet'),
          'roleId'=>'1',
        ],
        [
          'name' => 'Santu Kumar',
          'email' => 'santu@gmail.com',
          'mobile'=>'9445165233',
          'password' => bcrypt('santu'),
          'roleId'=>'0',
        ]

      ]);
    }
}
