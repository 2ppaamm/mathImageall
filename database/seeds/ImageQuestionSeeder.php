<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Question;

class ImageQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $questionId = DB::table('questions')->lists('id');
        for ($i =0; $i<6; $i++) {
            DB::table('image_question')->insert([
                ['image_id' => $faker->numberBetween(1,6),
                 'question_id' => $faker->randomElement($questionId)
                ],
            ]);
        }
    }
}
