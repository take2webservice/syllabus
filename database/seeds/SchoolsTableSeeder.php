<?php

use Illuminate\Database\Seeder;

class SchoolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('schools')->insert([
        [
          'id' => 1,
          'name' => '教育学部',
          'ord' => 1,
        ],
        [
          'id' => 2,
          'name' => '経済学部',
          'ord' => 2,
        ],
        [
          'id' => 3,
          'name' => '工学部',
          'ord' => 3,
        ],
      ]);
    }
}
