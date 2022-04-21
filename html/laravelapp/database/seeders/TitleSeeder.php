<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TitleSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $seederUtil = new SeederUtil;
    $fulltitleArray = $seederUtil->getTitleArray();
    foreach ($fulltitleArray as $fulltitle) {
      $array[] = ['text' => $fulltitle];
    }
    DB::table('titles')->insert($array);
  }
}
