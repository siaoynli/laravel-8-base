<?php

namespace Database\Seeders;


use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        User::truncate();
//        $this->call(UserSeeder::class);
//        Article::truncate();
        $this->call(ArticleSeeder::class);
    }
}
