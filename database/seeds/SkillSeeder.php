<?php

use Illuminate\Database\Seeder;
use App\Skill;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Skill::create ([
            'skill' =>'Numbers up to 100',
            'short_description' => 'Numbers up to 100',
            'description'=> 'Whatever you want to describe numbers la',
            'track_id' =>1,
            'level_id' =>2,
            'user_id' =>2,
            'status_id'=>3
        ]);
        Skill::create ([
            'skill' =>'Fraction of a whole',
            'short_description' => 'Fraction of a whole',
            'description'=> 'interpretation of fraction as a part of a whole, reading and writing fractions, comparing and ordering',
            'track_id' =>1,
            'level_id' =>3,
            'user_id' =>2,
            'status_id'=>3
        ]);
        Skill::create ([
            'skill' =>'Length, mass and volume',
            'short_description' => 'Length mass and volume',
            'description'=> 'length in km, vol in ml, compound units, conversion from km to m, m to centimeters, kg to g, litres to ml',
            'track_id' =>2,
            'level_id' =>4,
            'user_id' =>2,
            'status_id'=>3
        ]);
    }
}
