<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectItemsOptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ProjectItemsOptions')->insertOrIgnore([
            'project_id' => 1,
            'item_id' => 1,
            'option_id' => 1
        ]);
    }
}
