<?php

use App\Table;
use Illuminate\Database\Seeder;

class TablesSeeder extends Seeder
{
    private $tables = ['General Equity', 'Physical Form', 'Services and Employment', 'Population Preservation/Expansion', 'Balanced Community', 'Housing Diversity'];
    private $abbreviations = ['equity', 'physical', 'services', 'population', 'community', 'housing'];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (array_combine($this->tables, $this->abbreviations) as $table => $abbrev) {
            Table::firstOrCreate(['name' => $table, 'abbrev' => $abbrev]);
        }
    }
}
