<?php

use Illuminate\Database\Seeder;
use App\Track;

class TracksSeeder extends Seeder
{
    public function run()
    {
        Track::create ([
            'track' =>'Algebra',
            'description'=> 'Algebra',
            'lowest_maxile_level' => 500,
            'highest_maxile_level' => 1300
        ]);

        Track::create ([
            'track' =>'Geometry',
            'description'=> 'Geometry',
            'lowest_maxile_level' => 300,
            'highest_maxile_level' => 1300
        ]);

        Track::create ([
            'track' =>'Units of Measure',
            'description'=> 'Units of Measure',
            'lowest_maxile_level' => 0,
            'highest_maxile_level' => 600
        ]);

        Track::create ([
            'track' =>'Graphs',
            'description'=> 'Graphs',
            'lowest_maxile_level' => 400,
            'highest_maxile_level' => 1300
        ]);
    }
}
