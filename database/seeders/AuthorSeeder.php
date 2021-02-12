<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $authors = ["William Shakespeare", "Agatha Christie", "Barbara Cartland", "Danielle Steel", "Harold Robbins", "Georges Simenon"];
        foreach($authors as $author) {
            Author::create(['name' => $author]);
        }
    }
}
