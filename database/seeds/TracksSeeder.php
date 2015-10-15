<?php

use Illuminate\Database\Seeder;
use App\Track;

class TracksSeeder extends Seeder
{
    public function run()
    {
        Track::create ([
            'track' =>'Whole Numbers',
            'description'=> 'Whole Numbers',
            'user_id' => 1,
            'lowest_maxile_level' => 0,
            'highest_maxile_level' => 700
        ]);
        Track::create ([
            'track' =>'Units of Measurement',
            'description'=> 'Units of Measurement',
            'user_id' => 2,
            'lowest_maxile_level' => 0,
            'highest_maxile_level' => 700
        ]);
        Track::create ([
            'track' =>'Data Analysis',
            'description'=> 'Data Analysis',
            'user_id' => 3,
            'lowest_maxile_level' => 200,
            'highest_maxile_level' => 700
        ]);
        Track::create ([
            'track' =>'Geometry',
            'description'=> 'Geometry',
            'user_id' => 1,
            'lowest_maxile_level' => 0,
            'highest_maxile_level' => 700
        ]);
        Track::create ([
            'track' =>'Ratio and Percentage',
            'description'=> 'Ratio and Percentage',
            'user_id' => 1,
            'lowest_maxile_level' => 500,
            'highest_maxile_level' => 700
        ]);
        Track::create ([
            'track' =>'Speed',
            'description'=> 'Speed',
            'user_id' => 2,
            'lowest_maxile_level' => 600,
            'highest_maxile_level' => 700
        ]);

        Track::create ([
            'track' =>'Algebra',
            'description'=> 'Algebra',
            'user_id' => 1,
            'lowest_maxile_level' => 600,
            'highest_maxile_level' => 1300
        ]);


        Track::create ([
            'track' =>'Graphs',
            'description'=> 'Graphs',
            'user_id' => 4,
            'lowest_maxile_level' => 400,
            'highest_maxile_level' => 1300
        ]);
        Track::create ([
            'track' =>'Uncategorized',
            'description'=> 'Uncategorized',
            'user_id' => 1,
            'lowest_maxile_level' => 0,
            'highest_maxile_level' => 0
        ]);

    }
}
