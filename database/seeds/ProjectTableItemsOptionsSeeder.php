<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectTableItemsOptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ProjectTableItemsOptions')->insertOrIgnore([
            'project_id' => 1,
            'item_id' => 1,
            'option_id' => 1,
            'table_id' => 1
        ]);
    }
}
