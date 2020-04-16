<?php

use App\Item;
use App\Option;
use App\Question;
use Illuminate\Database\Seeder;
use Prismic\Api;
use Prismic\Predicates;

class QuestionsSeeder extends Seeder
{
    private $equity = ["Specialized Housing (Senior, Assisted Living, Transitional)", "Lifecycle Housing (raising children through aging in place)", "Interim Uses (open space, retail, events, art and creative placemaking)", "Small Scale Commercial and Industrial Development", "Permanent Housing", "Long-Term Housing"];
    private $physical = [];

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

        // Retrieve general equity questions
        $response = $api->query([
            Predicates::at('document.type', 'question'),
            Predicates::at('document.tags', ['General Equity'])
        ]);

        $type = 1;

        foreach ($response->results as $doc) {
            switch ($doc->data->type) {
                case 'Not specified':
                    $type = 1;
                    break;
                case 'Yes/No':
                    $type = 2;
                    break;
                case 'Select One':
                    $type = 3;
                    break;
                case 'Select All That Apply':
                    $type = 4;
                    break;
                case 'Select All':
                    $type = 5;
                    break;
            }

            $itemName = current(preg_grep('/GE/', $doc->tags));
            $q = Question::updateOrCreate([
                'header' => current($doc->data->header)->text,
                'type' => $type,
                'item_id' => Item::where('name', $itemName)->pluck('id')->first()
            ]);

            $q->item()->associate(Item::where('name', $itemName)->pluck('id')->first());
        }

        // Retrieve physical form questions
        $response = $api->query([
            Predicates::at('document.type', 'question'),
            Predicates::at('document.tags', ['Physical Form'])
        ]);

        $type = 1;

        foreach ($response->results as $doc) {
            switch ($doc->data->type) {
                case 'Not specified':
                    $type = 1;
                    break;
                case 'Yes/No':
                    $type = 2;
                    break;
                case 'Select One':
                    $type = 3;
                    break;
                case 'Select All That Apply':
                    $type = 4;
                    break;
                case 'Select All':
                    $type = 5;
                    break;
                case 'Enter Percentage':
                    $type = 6;
                    break;
            }

            $itemName = current(preg_grep('/PF/', $doc->tags));
            $q = Question::updateOrCreate([
                'header' => current($doc->data->header)->text,
                'type' => $type,
                'item_id' => Item::where('name', $itemName)->pluck('id')->first()
            ]);

            $q->item()->associate(Item::where('name', $itemName)->pluck('id')->first());
        }

        // Retrieve services questions
        $response = $api->query([
            Predicates::at('document.type', 'question'),
            Predicates::at('document.tags', ['Services and Employment'])
        ]);

        $type = 1;

        foreach ($response->results as $doc) {
            switch ($doc->data->type) {
                case 'Not specified':
                    $type = 1;
                    break;
                case 'Yes/No':
                    $type = 2;
                    break;
                case 'Select One':
                    $type = 3;
                    break;
                case 'Select All That Apply':
                    $type = 4;
                    break;
                case 'Select All':
                    $type = 5;
                    break;
                case 'Enter Percentage':
                    $type = 6;
                    break;
            }

            $itemName = current(preg_grep('/SE/', $doc->tags));
            $q = Question::updateOrCreate([
                'header' => current($doc->data->header)->text,
                'type' => $type,
                'item_id' => Item::where('name', $itemName)->pluck('id')->first()
            ]);

            $q->item()->associate(Item::where('name', $itemName)->pluck('id')->first());
        }

        // Retrieve population questions
        $response = $api->query([
            Predicates::at('document.type', 'question'),
            Predicates::at('document.tags', ['Population Preservation/Expansion'])
        ]);

        $type = 1;

        foreach ($response->results as $doc) {
            switch ($doc->data->type) {
                case 'Not specified':
                    $type = 1;
                    break;
                case 'Yes/No':
                    $type = 2;
                    break;
                case 'Select One':
                    $type = 3;
                    break;
                case 'Select All That Apply':
                    $type = 4;
                    break;
                case 'Select All':
                    $type = 5;
                    break;
                case 'Enter Percentage':
                    $type = 6;
                    break;
            }

            $itemName = current(preg_grep('/PPE/', $doc->tags));
            $q = Question::updateOrCreate([
                'header' => current($doc->data->header)->text,
                'type' => $type,
                'item_id' => Item::where('name', $itemName)->pluck('id')->first()
            ]);

            $q->item()->associate(Item::where('name', $itemName)->pluck('id')->first());
        }

        // Retrieve community questions
        $response = $api->query([
            Predicates::at('document.type', 'question'),
            Predicates::at('document.tags', ['Balanced Community'])
        ]);

        $type = 1;

        foreach ($response->results as $doc) {
            switch ($doc->data->type) {
                case 'Not specified':
                    $type = 1;
                    break;
                case 'Yes/No':
                    $type = 2;
                    break;
                case 'Select One':
                    $type = 3;
                    break;
                case 'Select All That Apply':
                    $type = 4;
                    break;
                case 'Select All':
                    $type = 5;
                    break;
                case 'Enter Percentage':
                    $type = 6;
                    break;
            }

            $itemName = current(preg_grep('/BC/', $doc->tags));
            $q = Question::updateOrCreate([
                'header' => current($doc->data->header)->text,
                'type' => $type,
                'item_id' => Item::where('name', $itemName)->pluck('id')->first()
            ]);

            $q->item()->associate(Item::where('name', $itemName)->pluck('id')->first());
        }

        // Retrieve housing questions
        $response = $api->query([
            Predicates::at('document.type', 'question'),
            Predicates::at('document.tags', ['Housing Diversity'])
        ]);

        $type = 1;

        foreach ($response->results as $doc) {
            switch ($doc->data->type) {
                case 'Not specified':
                    $type = 1;
                    break;
                case 'Yes/No':
                    $type = 2;
                    break;
                case 'Select One':
                    $type = 3;
                    break;
                case 'Select All That Apply':
                    $type = 4;
                    break;
                case 'Select All':
                    $type = 5;
                    break;
                case 'Enter Percentage':
                    $type = 6;
                    break;
            }

            $itemName = current(preg_grep('/HD/', $doc->tags));
            $q = Question::updateOrCreate([
                'header' => current($doc->data->header)->text,
                'type' => $type,
                'item_id' => Item::where('name', $itemName)->pluck('id')->first()
            ]);

            $q->item()->associate(Item::where('name', $itemName)->pluck('id')->first());
        }
    }
}
