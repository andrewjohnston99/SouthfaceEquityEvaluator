<?php

use App\Option;
use App\Question;
use Illuminate\Database\Seeder;

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

        foreach($this->points as $pv) {
            $op = Option::firstOrCreate([
                'question_id' => $index,
                'points' => $pv,
                'allocated' => false
            ]);

            $op->question()->associate(Question::where('id', $index)->first());

            $index++;
        }

        $op = Option::firstOrCreate([
            'question_id' => 2,
            'points' => 4,
            'allocated' => false
        ]);

        $op->question()->associate(Question::where('id', 2)->first());
    }
}
