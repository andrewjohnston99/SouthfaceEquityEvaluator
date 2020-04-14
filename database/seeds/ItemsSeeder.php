<?php

use App\Item;
use App\ProjectTable;
use Illuminate\Database\Seeder;

class ItemsSeeder extends Seeder
{
    private $equity = ['GE 1.0', 'GE 1.1', 'GE 1.2', 'GE 1.3', 'GE 1.4', 'GE 1.5'];
    private $physicalOp = ['PF 0.1', 'PF 0.2', 'PF 0.3', 'PF 0.4', 'PF 0.5', 'PF 0.6'];
    private $physicalReq = ['PF 1.1', 'PF 1.2', 'PF 1.3', 'PF 1.4', 'PF 1.45', 'PF 1.5', 'PF 1.6', 'PF 1.7', 'PF 1.8'];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->equity as $item) {
            $i= Item::firstOrCreate([
                'table_id' => ProjectTable::where('abbrev', 'equity')->pluck('id')[0],
                'name' => $item,
                'required' => false,
            ]);

            $i->table()->associate(ProjectTable::where('abbrev', 'equity')->pluck('id')[0]);
        }

        // foreach($this->physicalOp as $item) {
        //     $i= Item::firstOrCreate([
        //         'table_id' => ProjectTable::where('abbrev', 'physical')->pluck('id')[0],
        //         'name' => $item,
        //         'required' => false,
        //     ]);

        //     $i->table()->associate(ProjectTable::where('abbrev', 'physical')->pluck('id')[0]);
        // }

        // foreach($this->physicalReq as $item) {
        //     $i= Item::firstOrCreate([
        //         'table_id' => ProjectTable::where('abbrev', 'physical')->pluck('id')[0],
        //         'name' => $item,
        //         'required' => true,
        //     ]);

        //     $i->table()->associate(ProjectTable::where('abbrev', 'physical')->pluck('id')[0]);
        // }
    }
}
