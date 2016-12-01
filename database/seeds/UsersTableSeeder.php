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
          'name' => 'Admin',
          'email' => 'admin@hawk.com',
          'mobile'=>'9445165233',
          'password' => bcrypt('admin'),
          'roleId'=>'1',
        ],
        [
          'name' => 'User',
          'email' => 'user@hawk.com',
          'mobile'=>'9445165233',
          'password' => bcrypt('user'),
          'roleId'=>'0',
        ]

      ]);
    }
}
