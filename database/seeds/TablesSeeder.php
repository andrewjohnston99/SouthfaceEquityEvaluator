<?php

use App\MartaStation;
use App\Table;
use Illuminate\Database\Seeder;

class TablesSeeder extends Seeder
{
    private $tables = ['General Equity', 'Physical Form', 'Services and Employment', 'Population Preservation/Expansion', 'Balanced Community', 'Housing Diversity'];
    private $abbreviations = ['equity', 'physical', 'services', 'population', 'community', 'housing'];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stations = MartaStation::pluck('abbrev', 'id')->all();
        $services = ['Ashby', 'Bankhead', 'HamiltonHolmes', 'IndianCreek', 'Kensington', 'LakewoodFortMcPherson', 'OaklandCity', 'WestLake'];
        $population = ['CivicCenter', 'Decatur', 'Dunwoody', 'EastPoint', 'FivePoints', 'GeorgiaDome', 'GeorgiaState', 'KingMemorial', 'Lenox', 'Lindbergh', 'Midtown', 'NorthAvenue', 'PeachtreeCenter', 'SandySprings'];
        $community = ['Avondale', 'Chamblee', 'CollegePark', 'Doraville', 'EdgewoodCandler', 'Garnett', 'InmanPark', 'VineCity', 'WestEnd'];
        $housing =['ArtsCenter', 'Brookhaven', 'Buckhead', 'EastLake', 'MedicalCenter', 'NorthSprings'];

        foreach (array_combine($this->tables, $this->abbreviations) as $table => $abbrev) {
           $t = Table::firstOrCreate(['name' => $table, 'abbrev' => $abbrev]);

            if ($abbrev == 'equity' || $abbrev == 'physical') {
               $t->stations()->sync(array_keys($stations));
            }

            if ($abbrev == 'services') {
                $tempStations = array_intersect($stations, $services);
                $t->stations()->sync(array_keys($tempStations));
            }

            if ($abbrev == 'population') {
                $tempStations = array_intersect($stations, $population);
                $t->stations()->sync(array_keys($tempStations));
            }

            if ($abbrev == 'community') {
                $tempStations = array_intersect($stations, $community);
                $t->stations()->sync(array_keys($tempStations));
            }

            if ($abbrev == 'housing') {
                $tempStations = array_intersect($stations, $housing);
                $t->stations()->sync(array_keys($tempStations));
            }
        }
    }
}
