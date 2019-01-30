<?php

use Illuminate\Database\Seeder;

class BookDisciplineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\BookDiscipline::class, 5)->create();
    }
}
