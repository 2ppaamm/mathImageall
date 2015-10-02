<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Factory as Faker;
use Illuminate\Support\Facades;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        User::create ([
            'name' =>'pamela',
            'firstName' =>'Pamela',
            'lastName' => 'Lim',
            'email'=> 'pamelaliusm@gmail.com',
            'password' => Hash::make('123456'),
            'is_admin' => TRUE,
            'date_of_birth' => '1966-02-20',
            'last_test_date' => $faker->dateTimeThisYear,
            'next_test_date' => $faker->dateTimeThisYear,
            'maxile_level' => 200
        ]);

        User::create ([
            'name' =>'japher',
            'firstName' =>'Japher',
            'lastName'  => 'Lim',
            'email'=> 'japher_lim@yahoo.com.sg',
            'password' => Hash::make('123456'),
            'is_admin' => TRUE,
            'date_of_birth' => '1994-03-29',
            'last_test_date' => $faker->dateTimeThisYear,
            'next_test_date' => $faker->dateTimeThisYear,
            'maxile_level' => 500
        ]);

        for ($i =0; $i<6; $i++){
            User::create([
                'name'=>$faker->firstName,
                'firstname' => $faker->firstName,
                'lastname' => $faker->lastName,
                'email'=> $faker->email,
                'password' => Hash::make('password'),
                'is_admin' => FALSE,
                'date_of_birth' => $faker->dateTimeThisCentury,
                'last_test_date' => $faker->dateTimeThisYear,
                'next_test_date' => $faker->dateTimeThisYear,
                'maxile_level' => $faker->randomNumber(3)
            ]);
        }
    }
}
