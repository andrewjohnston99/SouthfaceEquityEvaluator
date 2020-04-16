<?php

use App\Option;
use App\Question;
use App\Item;
use Illuminate\Database\Seeder;
use Prismic\Api;
use Prismic\Predicates;

class OptionsSeeder extends Seeder
{
    private $points = [20, 15, 10, 20, 20, 15];

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

        // Retrieve general equity options
        $response = $api->query([
            Predicates::at('document.type', 'option'),
            Predicates::at('document.tags', ['General Equity'])
        ]);

        foreach ($response->results as $doc) {
            $itemName = current(preg_grep('/PF/', $doc->tags));

            $o = Option::updateOrCreate([
                'title' => !empty(current($doc->data->title)->text) ? current($doc->data->title)->text : null,
                'points' => isset($doc->data->points) ? $doc->data->points: null,
                'label' => isset(current($doc->data->label)->text) ? current($doc->data->label)->text: null,
                'question_id' => Item::where('name', $itemName)->first()->question->id
            ]);

            $o->question()->associate(Item::where('name', $itemName)->first()->question->id);
        }

        // Retrieve physical form options
        $response = $api->query([
            Predicates::at('document.type', 'option'),
            Predicates::at('document.tags', ['Physical Form'])
        ]);

        foreach ($response->results as $doc) {
            $itemName = current(preg_grep('/PF/', $doc->tags));

            $o = Option::updateOrCreate([
                'title' => !empty(current($doc->data->title)->text) ? current($doc->data->title)->text : null,
                'points' => isset($doc->data->points) ? $doc->data->points: null,
                'label' => isset(current($doc->data->label)->text) ? current($doc->data->label)->text: null,
                'question_id' => Item::where('name', $itemName)->first()->question->id
            ]);

            $o->question()->associate(Item::where('name', $itemName)->first()->question->id);
        }

        // Retrieve services options
        $response = $api->query([
            Predicates::at('document.type', 'option'),
            Predicates::at('document.tags', ['Services and Employment'])
        ]);

        foreach ($response->results as $doc) {
            $itemName = current(preg_grep('/SE/', $doc->tags));

            $o = Option::updateOrCreate([
                'title' => !empty(current($doc->data->title)->text) ? current($doc->data->title)->text : null,
                'points' => isset($doc->data->points) ? $doc->data->points: null,
                'label' => isset(current($doc->data->label)->text) ? current($doc->data->label)->text: null,
                'question_id' => Item::where('name', $itemName)->first()->question->id
            ]);

            $o->question()->associate(Item::where('name', $itemName)->first()->question->id);
        }

        // Retrieve population options
        $response = $api->query([
            Predicates::at('document.type', 'option'),
            Predicates::at('document.tags', ['Population Preservation/Expansion'])
        ]);

        foreach ($response->results as $doc) {
            $itemName = current(preg_grep('/PPE/', $doc->tags));

            $o = Option::updateOrCreate([
                'title' => !empty(current($doc->data->title)->text) ? current($doc->data->title)->text : null,
                'points' => isset($doc->data->points) ? $doc->data->points: null,
                'label' => isset(current($doc->data->label)->text) ? current($doc->data->label)->text: null,
                'question_id' => Item::where('name', $itemName)->first()->question->id
            ]);

            $o->question()->associate(Item::where('name', $itemName)->first()->question->id);
        }

        // Retrieve community options
        $response = $api->query([
            Predicates::at('document.type', 'option'),
            Predicates::at('document.tags', ['Balanced Community'])
        ]);

        foreach ($response->results as $doc) {
            $itemName = current(preg_grep('/BC/', $doc->tags));

            $o = Option::updateOrCreate([
                'title' => !empty(current($doc->data->title)->text) ? current($doc->data->title)->text : null,
                'points' => isset($doc->data->points) ? $doc->data->points: null,
                'label' => isset(current($doc->data->label)->text) ? current($doc->data->label)->text: null,
                'question_id' => Item::where('name', $itemName)->first()->question->id
            ]);

            $o->question()->associate(Item::where('name', $itemName)->first()->question->id);
        }

        // Retrieve housing options
        $response = $api->query([
            Predicates::at('document.type', 'option'),
            Predicates::at('document.tags', ['Housing Diversity'])
        ]);

        foreach ($response->results as $doc) {
            $itemName = current(preg_grep('/HD/', $doc->tags));

            $o = Option::updateOrCreate([
                'title' => !empty(current($doc->data->title)->text) ? current($doc->data->title)->text : null,
                'points' => isset($doc->data->points) ? $doc->data->points: null,
                'label' => isset(current($doc->data->label)->text) ? current($doc->data->label)->text: null,
                'question_id' => Item::where('name', $itemName)->first()->question->id
            ]);

            $o->question()->associate(Item::where('name', $itemName)->first()->question->id);
        }
    }
}
