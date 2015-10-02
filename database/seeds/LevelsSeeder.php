<?php

use Illuminate\Database\Seeder;
use App\Level;

class LevelsSeeder extends Seeder
{
    public function run()
    {
        Level::create ([
            'level' =>000,
            'description'=> 'Kindergarten'
        ]);
        Level::create ([
            'level' =>100,
            'description'=> 'Primary/Grade/Year One',
            'age' => 7
        ]);
        Level::create ([
            'level' =>200,
            'description'=> 'Primary/Grade/Year Two',
            'age' => 8
        ]);
        Level::create ([
            'level' =>300,
            'description'=> 'Primary/Grade/Year Three',
            'age' => 9
        ]);
        Level::create ([
            'level' =>400,
            'description'=> 'Primary/Grade/Year Four',
            'age' => 10
        ]);
        Level::create ([
            'level' =>500,
            'description'=> 'Primary/Grade/Year Five',
            'age' => 11
        ]);
        Level::create ([
            'level' =>600,
            'description'=> 'Primary/Grade/Year Six',
            'age' => 12
        ]);
        Level::create ([
            'level' =>700,
            'description'=> 'Sec 1/Grade/Year 7 ',
            'age' => 13
        ]);
        Level::create ([
            'level' =>800,
            'description'=> 'Sec 2/Grade/Year 8 ',
            'age' => 14
        ]);
        Level::create ([
            'level' =>900,
            'description'=> 'Sec 3/Grade/Year 9 ',
            'age' => 15
        ]);
        Level::create ([
            'level' =>1000,
            'description'=> 'Sec 4/Grade/Year 10',
            'age' => 16
        ]);
        Level::create ([
            'level' =>1100,
            'description'=> 'Pre-U1/Grade/Year 11',
            'age' => 17
        ]);
        Level::create ([
            'level' =>1200,
            'description'=> 'Pre-U2/Grade/Year 12',
            'age' => 18
        ]);
        Level::create ([
            'level' =>1300,
            'description'=> 'Beyond Secondary School',
            'age' => 99
        ]);
    }
}
