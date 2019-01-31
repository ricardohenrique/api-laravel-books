<?php

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
        $this->call([
            DataDefaultSeeder::class,
            AuthorTableSeeder::class,
            DisciplineTableSeeder::class,
            LevelTableSeeder::class,
            BookTableSeeder::class,
            BookAuthorTableSeeder::class,
        	BookDisciplineTableSeeder::class
        ]);
    }
}
