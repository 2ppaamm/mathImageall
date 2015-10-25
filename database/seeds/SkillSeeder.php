<?php

use Illuminate\Database\Seeder;
use App\Skill;
use Faker\Factory as Faker;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i =0; $i<50; $i++) {
            Skill::create ([
                'skill' =>$i,
                'short_description' => $faker->sentence(2),
                'description'=> $faker->sentence(6),
                'track_id' =>$faker->numberBetween(1,4),
                'level_id' =>$faker->numberBetween(5,8),
                'user_id' =>2,
                'status_id'=>3
            ]);

        }
            Skill::create ([
            'skill' =>3,
            'short_description' => 'Numbers up to 100',
            'description'=> 'Whatever you want to describe numbers la',
            'track_id' =>1,
            'level_id' =>6,
            'user_id' =>2,
            'status_id'=>3
        ]);
        Skill::create ([
            'skill' =>2,
            'short_description' => 'Fraction of a whole',
            'description'=> 'interpretation of fraction as a part of a whole, reading and writing fractions, comparing and ordering',
            'track_id' =>1,
            'level_id' =>7,
            'user_id' =>2,
            'status_id'=>3
        ]);
        Skill::create ([
            'skill' =>1,
            'short_description' => 'Length mass and volume',
            'description'=> 'length in km, vol in ml, compound units, conversion from km to m, m to centimeters, kg to g, litres to ml',
            'track_id' =>2,
            'level_id' =>8,
            'user_id' =>2,
            'status_id'=>3
        ]);
    }
}
