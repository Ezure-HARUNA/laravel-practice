<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  //ダミーデータ→Seeder→factoryと比べ、本番環境のデータ投入に適している
  public function run()
  {
    DB::table('tests')->insert([
      [
        'text' => 'zzz',
        'created_at' => Now()
      ],
      [
        'text' => 'fff',
        'created_at' => Now()
      ]
    ]);
  }
}
