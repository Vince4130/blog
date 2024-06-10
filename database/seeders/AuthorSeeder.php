<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::factory()->count(10)->create();
        //
        // DB::table('authors')->insert([
        //     'lastname' => 'brusciano',
        //     'firstname' => 'florent',
        //     'birth'
        //     => 47,
        // ]);
    }
}
