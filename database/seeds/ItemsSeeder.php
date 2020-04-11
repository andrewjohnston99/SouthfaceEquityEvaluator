<?php

use App\Item;
use App\ProjectTable;
use Illuminate\Database\Seeder;

class ItemsSeeder extends Seeder
{
    private $items = ['GE 1.0', 'GE 1.1', 'GE 1.2', 'GE 1.3', 'GE 1.4', 'GE 1.5'];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->items as $item) {
            $it = Item::firstOrCreate([
                'table_id' => ProjectTable::where('abbrev', 'equity')->pluck('id')[0],
                'name' => $item,
                'required' => false,
            ]);

            $it->table()->associate(ProjectTable::where('abbrev', 'equity')->pluck('id')[0]);
        }
    }
}
