<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Image;

class ImagesSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        for ($i =0; $i<6; $i++) {
            Image::create([
                'url_link' => $faker->imageUrl(400, 300, 'cats'),
                'user_id' => $faker->numberBetween(1, 8)
            ]);
        }
    }
}
