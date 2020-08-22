<?php

use Illuminate\Database\Seeder;
use App\Article;
use App\Tag;
use Illuminate\Support\Facades\DB;

class ArticleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $tags = Tag::pluck('tag', 'id')->toArray();

        for ($i = 0; $i < 50; $i++) {
            $article_id = Article::insertGetId([
                'title' => $faker->text(35),
                'text' => $faker->text('5000'),
                'created_at' => $faker->dateTime
            ]);

            DB::table('tag_article')->insert([
                'article_id' => $article_id,
                'tag_id' => array_rand($tags)
            ]);
        }
    }
}
