<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('articles')->insert([
            'title' => 'First Article',
            'content' => 'Welcome in my blog',
            'author_id' => 13,
            'timestamp' => '2024-06-11 17:20:34',
        ]);
    }
}
