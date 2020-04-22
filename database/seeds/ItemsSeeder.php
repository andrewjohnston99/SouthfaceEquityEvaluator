<?php

use App\Item;
use App\ProjectTable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Prismic\Api;
use Prismic\Predicates;
use Prismic\Dom\RichText;

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
        }

        // Retrieve phyical form items
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
        }

        // Retrieve services items
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
        }

        // Retrieve population items
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
        }

        // Retrieve community items
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
        }

        // Retrieve housing items
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
        }
    }
}
