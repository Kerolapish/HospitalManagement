<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Author::factory()
        -> count(30)
        -> hasLibrary(20)
        -> create();

        Author::factory()
        -> count(20)
        -> hasLibrary(30)
        -> create();

        Author::factory()
        -> count(30)
        -> hasLibrary(5)
        -> create();

        Author::factory()
        -> count(20)
        -> create();
    }
}
