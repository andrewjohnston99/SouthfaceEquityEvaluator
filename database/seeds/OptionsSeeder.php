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
        $index = 1;

        // foreach($this->points as $pv) {
        //     $op = Option::firstOrCreate([
        //         'question_id' => $index,
        //         'points' => $pv,
        //     ]);

        //     $op->question()->associate(Question::where('id', $index)->first());

        //     $index++;
        // }

        $url = config('prismic.url');
        $token = config('prismic.token');
        $api = Api::get($url, $token);

        // Retrieve physical form options
        $response = $api->query([
            Predicates::at('document.type', 'option')
        ]);

        foreach ($response->results as $doc) {
            $itemName = current(preg_grep('/PF/', $doc->tags));

            $o = Option::updateOrCreate([
                'title' => !empty(current($doc->data->title)->text) ? current($doc->data->title)->text : null,
                'points' => isset($doc->data->points) ? $doc->data->points: null,
                'question_id' => Item::where('name', $itemName)->first()->question->id
            ]);

            $o->question()->associate(Item::where('name', $itemName)->first()->question->id);
        }
    }
}
