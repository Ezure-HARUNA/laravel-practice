<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
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
        'name' => 'ごりら',
        'email' => 'gorilla@example.com',
        'password' => Hash::make('password123')
      ],
      [
        'name' => 'うさぎ',
        'email' => 'usagi@example.com',
        'password' => Hash::make('password456')
      ]
    ]);
  }
}
