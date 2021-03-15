<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create 5 articles on each user with relations
        Article::truncate();
        Article::unguard();

        $faker = \Faker\Factory::create();
        User::all()->each(function ($user) use ($faker) {
            foreach (range(1, 5) as $i) {
                Article::create([
                    'user_id' => $user->id,
                    'name'   => $faker->sentence,
                    'content' => $faker->paragraphs(3, true),
                    'publish'   => true
                ]);
            }
        });
    }

    public function create_articles($amount)
    {
        Article::factory()
            ->count($amount)
            ->create();
    }
}
