<?php

use App\Item;
use App\Option;
use App\Question;
use Illuminate\Database\Seeder;

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

        foreach($this->equity as $question) {
            $qt = Question::firstOrCreate([
                'item_id' => $index,
                'type' => 1,
                'header' => $question
            ]);

            $qt->item()->associate($index);
            // $qt->options()->sync(Option::pluck('id')->question);
            $index++;
        }
    }
}
