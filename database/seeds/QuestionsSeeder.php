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
            'answer1' => '35',
            'answer2' => '-5',
            'answer3' => '15',
            'answer4' => '25',
            'user_id' => 1,
            'image' =>$faker->imageUrl(400, 300, 'cats'),
            'correct_answer' => 2
        ]);
        Question::create ([
            'track_id' => 1,
            'level_id'=> 7,
            'difficulty_id' =>2,
            'question' => 'y + 10 = 5. What is y?',
            'answer1' => '35',
            'answer2' => '5',
            'answer3' => '-5',
            'answer4' => '25',
            'user_id' => 2,
            'image' =>$faker->imageUrl(400, 300, 'cats'),
            'correct_answer' => 3
        ]);
        Question::create ([
            'track_id' => 1,
            'level_id'=> 7,
            'difficulty_id' =>3,
            'question' => 'z + 10 = 5. What is z?',
            'answer1' => '35',
            'answer2' => '5',
            'answer3' => '15',
            'answer4' => '-5',
            'user_id' => 1,
            'image' =>$faker->imageUrl(400, 300, 'cats'),
            'correct_answer' => 4
        ]);
        Question::create ([
            'track_id' => 2,
            'level_id'=> 7,
            'difficulty_id' =>1,
            'question' => 'The base and height of a triangle is 9cm and 4 cm respectively. What is the area?',
            'answer1' => '38',
            'answer2' => '18',
            'answer3' => '15',
            'answer4' => '20',
            'user_id' => 2,
            'image' =>$faker->imageUrl(400, 300, 'cats'),
            'correct_answer' => 2
        ]);
        Question::create ([
            'track_id' => 2,
            'level_id'=> 7,
            'difficulty_id' =>2,
            'question' => 'The base and height of a triangle is 9cm and 8 cm respectively. What is the area?',
            'answer1' => '36',
            'answer2' => '18',
            'answer3' => '15',
            'answer4' => '20',
            'user_id' => 1,
            'image' =>$faker->imageUrl(400, 300, 'cats'),
            'correct_answer' => 1
        ]);
        Question::create ([
            'track_id' => 2,
            'level_id'=> 7,
            'difficulty_id' =>3,
            'question' => 'The base and height of a triangle is 14 cm and 4 cm respectively. What is the area?',
            'answer1' => '38',
            'answer2' => '18',
            'answer3' => '15',
            'answer4' => '28',
            'user_id' => 1,
            'image' =>$faker->imageUrl(400, 300, 'cats'),
            'correct_answer' => 4
        ]);
        Question::create ([
            'track_id' => 3,
            'level_id'=> 7,
            'difficulty_id' =>1,
            'question' => 'How many meters is 2 km?',
            'answer1' => '2400 m',
            'answer2' => '2000 m',
            'answer3' => '2500 m',
            'answer4' => '2 m',
            'user_id' => 1,
            'image' =>$faker->imageUrl(400, 300, 'cats'),
            'correct_answer' => 2
        ]);
        Question::create ([
            'track_id' => 3,
            'level_id'=> 7,
            'difficulty_id' =>2,
            'question' => 'How many meters is 4 km?',
            'answer1' => '2400 m',
            'answer2' => '2000 m',
            'answer3' => '4000 m',
            'answer4' => '2 m',
            'user_id' => 1,
            'image' =>$faker->imageUrl(400, 300, 'cats'),
            'correct_answer' => 3
        ]);
        Question::create ([
            'track_id' => 3,
            'level_id'=> 7,
            'difficulty_id' =>3,
            'question' => 'How many meters is 200 km?',
            'answer1' => '24000 m',
            'answer2' => '200000 m',
            'answer3' => '25000 m',
            'answer4' => '2000 m',
            'user_id' => 2,
            'image' =>$faker->imageUrl(400, 300, 'cats'),
            'correct_answer' => 2
        ]);
    }
}