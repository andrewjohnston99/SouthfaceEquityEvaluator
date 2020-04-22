<?php

use App\Item;
use App\ProjectTable;
use Illuminate\Database\Seeder;
use Prismic\Api;
use Prismic\Predicates;
use Prismic\Dom\RichText;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $url = config('prismic.url');
        $token = config('prismic.token');
        $api = Api::get($url, $token);

        $tables = $api->query([Predicates::at('document.type', 'projecttable')]);
        $tableIDs =[];

        foreach ($tables->results as $doc) {
            $tableIDs[current($doc->data->table_name)->text] = $doc->id;
        }

        foreach(ProjectTable::all() as $table) {
            $this->seedItems($api, $table->abbrev, $tableIDs[$table->name]);
        }
    }

    public function seedItems($api, $tableAbbrev, $tableDocId) {
        $dbItems = Item::where('table_id', ProjectTable::where('abbrev', $tableAbbrev)->pluck('id')->first())->pluck('name')->all();
        $prismicItems = [];

        $response = $api->query([
            Predicates::at('document.type', 'item'),
            Predicates::at('my.item.table', $tableDocId)],
            [ 'pageSize' => 100 ]
        );

        foreach ($response->results as $doc) {
            $i = Item::where('table_id', ProjectTable::where('abbrev', $tableAbbrev)->pluck('id')->first())->where(function($query) use ($doc) {
                $query->where('name', $doc->data->item_name[0]->text)
                ->orWhere( 'order', $doc->data->order);
                })
                ->first();
            if (!is_null($i)) {
                $i->name = $doc->data->item_name[0]->text;
                $i->order = $doc->data->order;
                $i->required = $doc->data->required;
                $i->instructions = isset($doc->data->instruction_popover) ? RichText::asText($doc->data->instruction_popover) : null;
                $i->table_id = ProjectTable::where('abbrev', $tableAbbrev)->pluck('id')->first();
                $i->save();
            } else {
                $i = Item::create([
                    'name' => $doc->data->item_name[0]->text,
                    'order' => $doc->data->order,
                    'required' => $doc->data->required,
                    'instructions' => isset($doc->data->instruction_popover) ? RichText::asText($doc->data->instruction_popover) : null,
                    'table_id' => ProjectTable::where('abbrev', $tableAbbrev)->pluck('id')->first()
                ]);
            }

            $i->table()->associate(ProjectTable::where('abbrev', $tableAbbrev)->pluck('id')->first());
            array_push($prismicItems, $i->name);
        }

        if (!empty($dbItems)) {
            $deletedItems = array_diff($dbItems, $prismicItems);

            foreach($deletedItems as $item) {
                Item::where('name', $item)->delete();
            }
        }
    }
}


