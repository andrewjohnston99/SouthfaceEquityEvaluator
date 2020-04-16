<?php

use App\Note;
use App\Option;
use Illuminate\Database\Seeder;

class NotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $optionIds = Option::pluck('id')->all();

        Note::truncate();

        foreach ($optionIds as $id) {
            $note = Note::updateOrCreate([
                'option_id' => $id,
            ]);

            $note->option()->associate(Option::where('id', $id)->first());
        }
    }
}
