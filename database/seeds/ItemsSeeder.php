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

        // Retrieve table document IDs
        $tables = $api->query([Predicates::at('document.type', 'projecttable')]);
        $tableIDs =[];

        foreach ($tables->results as $doc) {
            $tableIDs[current($doc->data->table_name)->text] = $doc->id;
        }

        // Retrieve general equity items
        $dbItems = Item::where('table_id', 1)->pluck('name')->all();
        $prismicItems = [];

        $response = $api->query([
            Predicates::at('document.type', 'item'),
            Predicates::at('my.item.table', $tableIDs['General Equity'])],
            [ 'pageSize' => 100 ]
        );

        foreach ($response->results as $doc) {
            $i = Item::where('name', $doc->data->item_name[0]->text)->orWhere( 'order', $doc->data->order)->first();
            if (!is_null($i)) {
                $i->name = $doc->data->item_name[0]->text;
                $i->order = $doc->data->order;
                $i->required = $doc->data->required;
                $i->instructions = isset($doc->data->instruction_popover) ? RichText::asText($doc->data->instruction_popover) : null;
                $i->table_id = ProjectTable::where('abbrev', 'equity')->pluck('id')->first();
                $i->save();
            } else {
                $i = Item::create([
                    'name' => $doc->data->item_name[0]->text,
                    'order' => $doc->data->order,
                    'required' => $doc->data->required,
                    'instructions' => isset($doc->data->instruction_popover) ? RichText::asText($doc->data->instruction_popover) : null,
                    'table_id' => ProjectTable::where('abbrev', 'equity')->pluck('id')->first()
                ]);
            }

            $i->table()->associate(ProjectTable::where('abbrev', 'equity')->pluck('id')->first());
            array_push($prismicItems, $i->name);
        }

        $deletedItems = array_diff($dbItems, $prismicItems);

        foreach($deletedItems as $item) {
            Item::where('name', $item)->delete();
        }

        // Retrieve phyical form items
        $dbItems = Item::where('table_id', 1)->pluck('name')->all();
        $prismicItems = [];

        $response = $api->query([
            Predicates::at('document.type', 'item'),
            Predicates::at('my.item.table', $tableIDs['Physical Form'])],
            [ 'pageSize' => 100 ]
        );

        foreach ($response->results as $doc) {
            $i = Item::where('name', $doc->data->item_name[0]->text)->orWhere( 'order', $doc->data->order)->first();
            if (!is_null($i)) {
                $i->name = $doc->data->item_name[0]->text;
                $i->order = $doc->data->order;
                $i->required = $doc->data->required;
                $i->instructions = isset($doc->data->instruction_popover) ? RichText::asText($doc->data->instruction_popover) : null;
                $i->table_id = ProjectTable::where('abbrev', 'equity')->pluck('id')->first();
                $i->save();
            } else {
                $i = Item::create([
                    'name' => $doc->data->item_name[0]->text,
                    'order' => $doc->data->order,
                    'required' => $doc->data->required,
                    'instructions' => isset($doc->data->instruction_popover) ? RichText::asText($doc->data->instruction_popover) : null,
                    'table_id' => ProjectTable::where('abbrev', 'equity')->pluck('id')->first()
                ]);
            }

            $i->table()->associate(ProjectTable::where('abbrev', 'physical')->pluck('id')->first());
            array_push($prismicItems, $i->name);
        }

        $deletedItems = array_diff($dbItems, $prismicItems);

        foreach($deletedItems as $item) {
            Item::where('name', $item)->delete();
        }

        // Retrieve services items
        $dbItems = Item::where('table_id', 1)->pluck('name')->all();
        $prismicItems = [];

        $response = $api->query([
            Predicates::at('document.type', 'item'),
            Predicates::at('my.item.table', $tableIDs['Services and Employment'])],
            [ 'pageSize' => 100 ]
        );

        foreach ($response->results as $doc) {
            $i = Item::where('name', $doc->data->item_name[0]->text)->orWhere( 'order', $doc->data->order)->first();
            if (!is_null($i)) {
                $i->name = $doc->data->item_name[0]->text;
                $i->order = $doc->data->order;
                $i->required = $doc->data->required;
                $i->instructions = isset($doc->data->instruction_popover) ? RichText::asText($doc->data->instruction_popover) : null;
                $i->table_id = ProjectTable::where('abbrev', 'equity')->pluck('id')->first();
                $i->save();
            } else {
                $i = Item::create([
                    'name' => $doc->data->item_name[0]->text,
                    'order' => $doc->data->order,
                    'required' => $doc->data->required,
                    'instructions' => isset($doc->data->instruction_popover) ? RichText::asText($doc->data->instruction_popover) : null,
                    'table_id' => ProjectTable::where('abbrev', 'equity')->pluck('id')->first()
                ]);
            }

            $i->table()->associate(ProjectTable::where('abbrev', 'services')->pluck('id')->first());
            array_push($prismicItems, $i->name);
        }

        $deletedItems = array_diff($dbItems, $prismicItems);

        foreach($deletedItems as $item) {
            Item::where('name', $item)->delete();
        }

        // Retrieve population items
        $dbItems = Item::where('table_id', 1)->pluck('name')->all();
        $prismicItems = [];

        $response = $api->query([
            Predicates::at('document.type', 'item'),
            Predicates::at('my.item.table', $tableIDs['Population Preservation/Expansion'])],
            [ 'pageSize' => 100 ]
        );

        foreach ($response->results as $doc) {
            $i = Item::where('name', $doc->data->item_name[0]->text)->orWhere( 'order', $doc->data->order)->first();
            if (!is_null($i)) {
                $i->name = $doc->data->item_name[0]->text;
                $i->order = $doc->data->order;
                $i->required = $doc->data->required;
                $i->instructions = isset($doc->data->instruction_popover) ? RichText::asText($doc->data->instruction_popover) : null;
                $i->table_id = ProjectTable::where('abbrev', 'equity')->pluck('id')->first();
                $i->save();
            } else {
                $i = Item::create([
                    'name' => $doc->data->item_name[0]->text,
                    'order' => $doc->data->order,
                    'required' => $doc->data->required,
                    'instructions' => isset($doc->data->instruction_popover) ? RichText::asText($doc->data->instruction_popover) : null,
                    'table_id' => ProjectTable::where('abbrev', 'equity')->pluck('id')->first()
                ]);
            }

            $i->table()->associate(ProjectTable::where('abbrev', 'population')->pluck('id')->first());
            array_push($prismicItems, $i->name);
        }

        $deletedItems = array_diff($dbItems, $prismicItems);

        foreach($deletedItems as $item) {
            Item::where('name', $item)->delete();
        }

        // Retrieve community items
        $dbItems = Item::where('table_id', 1)->pluck('name')->all();
        $prismicItems = [];

        $response = $api->query([
            Predicates::at('document.type', 'item'),
            Predicates::at('my.item.table', $tableIDs['Balanced Community'])],
            [ 'pageSize' => 100 ]
        );

        foreach ($response->results as $doc) {
            $i = Item::where('name', $doc->data->item_name[0]->text)->orWhere( 'order', $doc->data->order)->first();
            if (!is_null($i)) {
                $i->name = $doc->data->item_name[0]->text;
                $i->order = $doc->data->order;
                $i->required = $doc->data->required;
                $i->instructions = isset($doc->data->instruction_popover) ? RichText::asText($doc->data->instruction_popover) : null;
                $i->table_id = ProjectTable::where('abbrev', 'equity')->pluck('id')->first();
                $i->save();
            } else {
                $i = Item::create([
                    'name' => $doc->data->item_name[0]->text,
                    'order' => $doc->data->order,
                    'required' => $doc->data->required,
                    'instructions' => isset($doc->data->instruction_popover) ? RichText::asText($doc->data->instruction_popover) : null,
                    'table_id' => ProjectTable::where('abbrev', 'equity')->pluck('id')->first()
                ]);
            }

            $i->table()->associate(ProjectTable::where('abbrev', 'community')->pluck('id')->first());
            array_push($prismicItems, $i->name);
        }

        $deletedItems = array_diff($dbItems, $prismicItems);

        foreach($deletedItems as $item) {
            Item::where('name', $item)->delete();
        }

        // Retrieve housing items
        $dbItems = Item::where('table_id', 1)->pluck('name')->all();
        $prismicItems = [];

        $response = $api->query([
            Predicates::at('document.type', 'item'),
            Predicates::at('my.item.table', $tableIDs['Housing Diversity'])],
            [ 'pageSize' => 100 ]
        );

        foreach ($response->results as $doc) {
            $i = Item::where('name', $doc->data->item_name[0]->text)->orWhere( 'order', $doc->data->order)->first();
            if (!is_null($i)) {
                $i->name = $doc->data->item_name[0]->text;
                $i->order = $doc->data->order;
                $i->required = $doc->data->required;
                $i->instructions = isset($doc->data->instruction_popover) ? RichText::asText($doc->data->instruction_popover) : null;
                $i->table_id = ProjectTable::where('abbrev', 'equity')->pluck('id')->first();
                $i->save();
            } else {
                $i = Item::create([
                    'name' => $doc->data->item_name[0]->text,
                    'order' => $doc->data->order,
                    'required' => $doc->data->required,
                    'instructions' => isset($doc->data->instruction_popover) ? RichText::asText($doc->data->instruction_popover) : null,
                    'table_id' => ProjectTable::where('abbrev', 'equity')->pluck('id')->first()
                ]);
            }

            $i->table()->associate(ProjectTable::where('abbrev', 'housing')->pluck('id')->first());
            array_push($prismicItems, $i->name);
        }

        $deletedItems = array_diff($dbItems, $prismicItems);

        foreach($deletedItems as $item) {
            Item::where('name', $item)->delete();
        }
    }
}
