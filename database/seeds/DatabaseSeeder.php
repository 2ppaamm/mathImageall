<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

            $this->call(UsersSeeder::class);
            $this->call(TracksSeeder::class);
            $this->call(LevelsSeeder::class);
            $this->call(DifficultySeeder::class);
            $this->call(QuestionsSeeder::class);

        Model::reguard();
    }
}