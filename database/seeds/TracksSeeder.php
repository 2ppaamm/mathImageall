<?php

use Illuminate\Database\Seeder;
use App\Track;

class TracksSeeder extends Seeder
{
    public function run()
    {
        $track = Track::create ([
            'track' =>'Whole Numbers',
            'description'=> 'Whole Numbers',
            'user_id' => 1
        ]);
        $track->levels()->sync([1,2,3,4,5,6,7]);
        Track::create ([
            'track' =>'Units of Measurement',
            'description'=> 'Units of Measurement',
            'user_id' => 2
        ])->levels()->sync([1,2,3,4,5,6,7]);
        Track::create ([
            'track' =>'Data Analysis',
            'description'=> 'Data Analysis',
            'user_id' => 3
        ])->levels()->sync([5,6,7]);
        Track::create ([
            'track' =>'Geometry',
            'description'=> 'Geometry',
            'user_id' => 1
        ])->levels()->sync([4,5,6,7]);
        Track::create ([
            'track' =>'Ratio and Percentage',
            'description'=> 'Ratio and Percentage',
            'user_id' => 1
        ])->levels()->sync([5,6,7]);
        Track::create ([
            'track' =>'Speed',
            'description'=> 'Speed',
            'user_id' => 2
        ])->levels()->sync([6,7]);

        Track::create ([
            'track' =>'Algebra',
            'description'=> 'Algebra',
            'user_id' => 1
        ])->levels()->sync([7]);


        Track::create ([
            'track' =>'Graphs',
            'description'=> 'Graphs',
            'user_id' => 4
        ])->levels()->sync([5,6,7]);
        Track::create ([
            'track' =>'Uncategorized',
            'description'=> 'Uncategorized',
            'user_id' => 1
        ]);
    }
}
