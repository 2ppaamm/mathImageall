<?php

use Illuminate\Database\Seeder;
use App\Status;
class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create ([
            'status' =>'Unpublished',
            'description' => 'Only Me'
        ]);
        Status::create ([
            'status' =>'Restricted',
            'description' =>'Restricted by community'
        ]);
        Status::create ([
            'status' => 'Public',
            'description' => 'Everyone can see'
        ]);
        Status::create([
            'status'=>'Unsaved',
            'description' =>'Work not saved'
        ]);
    }
}
