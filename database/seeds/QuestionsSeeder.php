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
        $index = 1;

        // foreach($this->equity as $question) {
        //     $qt = Question::firstOrCreate([
        //         'item_id' => $index,
        //         'type' => 1,
        //         'header' => $question
        //     ]);

        //     $qt->item()->associate($index);
        //     // $qt->options()->sync(Option::pluck('id')->question);
        //     $index++;
        // }

        $url = config('prismic.url');
        $token = config('prismic.token');
        $api = Api::get($url, $token);

        // Retrieve physical form questions
        $response = $api->query([
            Predicates::at('document.type', 'question')
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

            $itemName = current(preg_grep('/PF/', $doc->tags));
            $q = Question::updateOrCreate([
                'header' => current($doc->data->header)->text,
                'type' => $type,
                'item_id' => Item::where('name', $itemName)->pluck('id')->first()
            ]);

            $q->item()->associate(Item::where('name', $itemName)->pluck('id')->first());
        }
    }
}
