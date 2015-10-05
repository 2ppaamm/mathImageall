<?php

use Illuminate\Database\Seeder;
use App\Question;
use Faker\Factory as Faker;

class QuestionsSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        Question::create ([
            'track_id' => 1,
            'level_id'=> 7,
            'difficulty_id' =>1,
            'question' => 'x + 10 = 5. What is x?',
            'question_image' => $faker->imageUrl(500, 300, 'cats'),
            'answer1' => '35',
            'answer1_image' => $faker->imageUrl(250, 150, 'food'),
            'answer2' => '-5',
            'answer2_image' => $faker->imageUrl(250, 150, 'food'),
            'answer3' => '15',
            'answer3_image' => $faker->imageUrl(250, 150, 'fashion'),
            'answer4' => '25',
            'answer4_image' => $faker->imageUrl(250, 150, 'nature'),
            'user_id' => 1,
            'correct_answer' => 2
        ]);
        Question::create ([
            'track_id' => 1,
            'level_id'=> 7,
            'difficulty_id' =>2,
            'question' => 'y + 10 = 5. What is y?',
            'question_image' => $faker->imageUrl(500, 300, 'cats'),
            'answer1' => '35',
            'answer1_image' => $faker->imageUrl(250, 150, 'food'),
            'answer2' => '5',
            'answer2_image' => $faker->imageUrl(250, 150, 'food'),
            'answer3' => '-5',
            'answer3_image' => $faker->imageUrl(250, 150, 'fashion'),
            'answer4' => '25',
            'answer4_image' => $faker->imageUrl(250, 150, 'nature'),
            'user_id' => 2,
            'correct_answer' => 3
        ]);
        Question::create ([
            'track_id' => 1,
            'level_id'=> 7,
            'difficulty_id' =>3,
            'question' => 'z + 10 = 5. What is z?',
            'question_image' => $faker->imageUrl(500, 300, 'cats'),
            'answer1' => '35',
            'answer1_image' => $faker->imageUrl(250, 150, 'food'),
            'answer2' => '5',
            'answer2_image' => $faker->imageUrl(250, 150, 'food'),
            'answer3' => '15',
            'answer3_image' => $faker->imageUrl(250, 150, 'fashion'),
            'answer4' => '-5',
            'answer4_image' => $faker->imageUrl(250, 150, 'nature'),
            'user_id' => 1,
            'correct_answer' => 4
        ]);
        Question::create ([
            'track_id' => 2,
            'level_id'=> 7,
            'difficulty_id' =>1,
            'question' => 'The base and height of a triangle is 9cm and 4 cm respectively. What is the area?',
            'question_image' => $faker->imageUrl(400, 300, 'cats'),
            'answer1' => '38',
            'answer1_image' => $faker->imageUrl(250, 150, 'food'),
            'answer2' => '18',
            'answer2_image' => $faker->imageUrl(250, 150, 'food'),
            'answer3' => '15',
            'answer3_image' => $faker->imageUrl(250, 150, 'fashion'),
            'answer4' => '20',
            'answer4_image' => $faker->imageUrl(250, 150, 'nature'),
            'user_id' => 2,
            'correct_answer' => 2
        ]);
        Question::create ([
            'track_id' => 2,
            'level_id'=> 7,
            'difficulty_id' =>2,
            'question' => 'The base and height of a triangle is 9cm and 8 cm respectively. What is the area?',
            'question_image' => $faker->imageUrl(400, 300, 'cats'),
            'answer1' => '36',
            'answer1_image' => $faker->imageUrl(250, 150, 'food'),
            'answer2' => '18',
            'answer2_image' => $faker->imageUrl(250, 150, 'food'),
            'answer3' => '15',
            'answer3_image' => $faker->imageUrl(250, 150, 'fashion'),
            'answer4' => '20',
            'answer4_image' => $faker->imageUrl(250, 150, 'nature'),
            'user_id' => 1,
            'correct_answer' => 1
        ]);
        Question::create ([
            'track_id' => 2,
            'level_id'=> 7,
            'difficulty_id' =>3,
            'question' => 'The base and height of a triangle is 14 cm and 4 cm respectively. What is the area?',
            'question_image' => $faker->imageUrl(500, 300, 'cats'),
            'answer1' => '38',
            'answer1_image' => $faker->imageUrl(250, 150, 'food'),
            'answer2' => '18',
            'answer2_image' => $faker->imageUrl(250, 150, 'food'),
            'answer3' => '15',
            'answer3_image' => $faker->imageUrl(250, 150, 'fashion'),
            'answer4' => '28',
            'answer4_image' => $faker->imageUrl(250, 150, 'nature'),
            'user_id' => 1,
            'correct_answer' => 4
        ]);
        Question::create ([
            'track_id' => 3,
            'level_id'=> 7,
            'difficulty_id' =>1,
            'question' => 'How many meters is 2 km?',
            'question_image' => $faker->imageUrl(500, 300, 'cats'),
            'answer1' => '2400 m',
            'answer1_image' => $faker->imageUrl(250, 150, 'food'),
            'answer2' => '2000 m',
            'answer2_image' => $faker->imageUrl(250, 150, 'food'),
            'answer3' => '2500 m',
            'answer3_image' => $faker->imageUrl(250, 150, 'fashion'),
            'answer4' => '2 m',
            'answer4_image' => $faker->imageUrl(250, 150, 'nature'),
            'user_id' => 1,
            'correct_answer' => 2
        ]);
        Question::create ([
            'track_id' => 3,
            'level_id'=> 7,
            'difficulty_id' =>2,
            'question' => 'How many meters is 4 km?',
            'question_image' => $faker->imageUrl(500, 300, 'cats'),
            'answer1' => '2400 m',
            'answer1_image' => $faker->imageUrl(250, 150, 'food'),
            'answer2' => '2000 m',
            'answer2_image' => $faker->imageUrl(250, 150, 'food'),
            'answer3' => '4000 m',
            'answer3_image' => $faker->imageUrl(250, 150, 'fashion'),
            'answer4' => '2 m',
            'answer4_image' => $faker->imageUrl(250, 150, 'nature'),
            'user_id' => 1,
            'correct_answer' => 3
        ]);
        Question::create ([
            'track_id' => 3,
            'level_id'=> 7,
            'difficulty_id' =>3,
            'question' => 'How many meters is 200 km?',
            'question_image' => $faker->imageUrl(500, 300, 'cats'),
            'answer1' => '24000 m',
            'answer1_image' => $faker->imageUrl(500, 300, 'food'),
            'answer2' => '200000 m',
            'answer2_image' => $faker->imageUrl(250, 150, 'food'),
            'answer3' => '25000 m',
            'answer3_image' => $faker->imageUrl(250, 150, 'fashion'),
            'answer4' => '2000 m',
            'answer4_image' => $faker->imageUrl(250, 150, 'nature'),
            'user_id' => 2,
            'correct_answer' => 2
        ]);
    }
}