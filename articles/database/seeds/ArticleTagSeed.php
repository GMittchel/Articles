<?php

use Illuminate\Database\Seeder;
use App\Tag;

class ArticleTagSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for($i = 0; $i < 100; $i++){
            Tag::insert([
                'tag' => $faker->word
            ]);
        }
    }
}
