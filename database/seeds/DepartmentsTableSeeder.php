<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('departments')->insert([
        [
          'id' => 1,
          'school_id' => 1,
          'name' => '教育学科｜学校－文科系',
          'ord' => 1,
        ],
        [
          'id' => 2,
          'school_id' => 1,
          'name' => '教育学科｜学校－理科系',
          'ord' => 2,
        ],
        [
          'id' => 3,
          'school_id' => 1,
          'name' => '教育学科｜学校－実技系（音楽',
          'ord' => 3,
        ],
        [
          'id' => 4,
          'school_id' => 1,
          'name' => '教育学科｜学校－実技系（美術）',
          'ord' => 4,
        ],
        [
          'id' => 5,
          'school_id' => 1,
          'name' => '教育学科｜学校－実技系（保健体育）',
          'ord' => 5,
        ],
        [
          'id' => 6,
          'school_id' => 2,
          'name' => '経済学科',
          'ord' => 1,
        ],
        [
          'id' => 7,
          'school_id' => 3,
          'name' => '工学科',
          'ord' => 1,
        ],
      ]);
    }
}
