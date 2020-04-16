<?php

use App\Item;
use App\ProjectTable;
use Illuminate\Database\Seeder;
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

        // Retrieve general equity items
        $response = $api->query([
            Predicates::at('document.type', 'item'),
            Predicates::at('my.item.table', 'XpepDhIAACIAr14z')
        ]);

        foreach ($response->results as $doc) {
            $i = Item::updateOrCreate([
                'name' => $doc->data->item_name[0]->text,
                'required' => $doc->data->required,
                'instructions' => isset($doc->data->instructions) ? RichText::asText($doc->data->instructions) : null,
                'table_id' => ProjectTable::where('abbrev', 'equity')->pluck('id')->first()
            ]);

            $i->table()->associate(ProjectTable::where('abbrev', 'equity')->pluck('id')->first());
        }

        // Retrieve phyical form items
        $response = $api->query([
            Predicates::at('document.type', 'item'),
            Predicates::at('my.item.table', 'XpdZohIAAB8ArffY')
        ]);

        foreach ($response->results as $doc) {
            $i = Item::updateOrCreate([
                'name' => $doc->data->item_name[0]->text,
                'required' => $doc->data->required,
                'instructions' => isset($doc->data->instructions) ? RichText::asText($doc->data->instructions) : null,
                'table_id' => ProjectTable::where('abbrev', 'physical')->pluck('id')->first()
            ]);

            $i->table()->associate(ProjectTable::where('abbrev', 'physical')->pluck('id')->first());
        }

        // Retrieve services items
        $response = $api->query([
            Predicates::at('document.type', 'item'),
            Predicates::at('my.item.table', 'XpewxBIAACEAr31W')
        ]);

        foreach ($response->results as $doc) {
            $i = Item::updateOrCreate([
                'name' => $doc->data->item_name[0]->text,
                'required' => $doc->data->required,
                'instructions' => isset($doc->data->instructions) ? RichText::asText($doc->data->instructions) : null,
                'table_id' => ProjectTable::where('abbrev', 'services')->pluck('id')->first()
            ]);

            $i->table()->associate(ProjectTable::where('abbrev', 'services')->pluck('id')->first());
        }

        // Retrieve population items
        $response = $api->query([
            Predicates::at('document.type', 'item'),
            Predicates::at('my.item.table', 'Xpe1ihIAACEAr5Nq')
        ]);

        foreach ($response->results as $doc) {
            $i = Item::updateOrCreate([
                'name' => $doc->data->item_name[0]->text,
                'required' => $doc->data->required,
                'instructions' => isset($doc->data->instructions) ? RichText::asText($doc->data->instructions) : null,
                'table_id' => ProjectTable::where('abbrev', 'population')->pluck('id')->first()
            ]);

            $i->table()->associate(ProjectTable::where('abbrev', 'population')->pluck('id')->first());
        }

        // Retrieve community items
        $response = $api->query([
            Predicates::at('document.type', 'item'),
            Predicates::at('my.item.table', 'Xpe6gxIAACIAr6mk')
        ]);

        foreach ($response->results as $doc) {
            $i = Item::updateOrCreate([
                'name' => $doc->data->item_name[0]->text,
                'required' => $doc->data->required,
                'instructions' => isset($doc->data->instructions) ? RichText::asText($doc->data->instructions) : null,
                'table_id' => ProjectTable::where('abbrev', 'community')->pluck('id')->first()
            ]);

            $i->table()->associate(ProjectTable::where('abbrev', 'community')->pluck('id')->first());
        }

        // Retrieve housing items
        $response = $api->query([
            Predicates::at('document.type', 'item'),
            Predicates::at('my.item.table', 'Xpe9axIAACAAr7bV')
        ]);

        foreach ($response->results as $doc) {
            $i = Item::updateOrCreate([
                'name' => $doc->data->item_name[0]->text,
                'required' => $doc->data->required,
                'instructions' => isset($doc->data->instructions) ? RichText::asText($doc->data->instructions) : null,
                'table_id' => ProjectTable::where('abbrev', 'housing')->pluck('id')->first()
            ]);

            $i->table()->associate(ProjectTable::where('abbrev', 'housing')->pluck('id')->first());
        }
    }
}
