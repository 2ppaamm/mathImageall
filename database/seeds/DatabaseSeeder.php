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
            $this->call(StatusSeeder::class);
            $this->call(TypeSeeder::class);
    //            $this->call(LevelsSeeder::class);
   //         $this->call(TracksSeeder::class);
            $this->call(DifficultySeeder::class);
  //          $this->call(SkillSeeder::class);
    //        $this->call(QuestionSeeder::class);
      //      $this->call(TestSeeder::class);
        Model::reguard();
    }
}
