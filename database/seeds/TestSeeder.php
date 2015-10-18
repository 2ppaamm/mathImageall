<?php

use Illuminate\Database\Seeder;
use App\Test;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Test::create ([
 //           'user_id' =>1,
  //          'status_id'=>3
   //     ]);
        Test::create ([
            'user_id' =>3,
            'status_id'=>3
        ]);
    }
}
