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
            // UserSeeder::class,
            // MartaStationsSeeder::class,
            // ProjectTablesSeeder::class,
            // ItemsSeeder::class,
            // QuestionsSeeder::class,
            // OptionsSeeder::class,
            // NotesSeeder::class,
            ProjectTableItemsOptionsSeeder::class,
        ]);
    }
}
