<?php

use App\Tag;
use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Article::class, 50)->create()->each(function($article) {

            $take = random_int(1, 3);
            $tags = Tag::inRandomOrder()->take($take)->get();

            $article->tags()->sync($tags);
        });
    }
}
