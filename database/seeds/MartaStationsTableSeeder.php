<?php

use App\MartaStation;
use Illuminate\Database\Seeder;

class MartaStationsTableSeeder extends Seeder
{
    private $stations = ["Arts Center", "Ashby", "Avondale", "Bankhead", "Buckhead", "Chamblee", "Civic Center", "College Park", "Decatur", "Doraville", "Dunwoody", "East Point", "Edgewood Candler Park", "Five Points", "Garnett", "Georgia Dome/GWCC/Philips Arena/CNN Center", "Georgia State", "Hamilton Holmes", "Indian Creek", "Inman Park", "Kensington", "King Memorial", "Lakewood Fort McPherson", "Lenox", "Lindbergh", "Medical Center", "Midtown", "North Avenue", "North Springs", "Oakland City", "Peachtree Center", "Sandy Springs", "Vine City", "West End", "West Lake"];
    private $abbreviations = ["ArtsCenter", "Ashby", "Avondale", "Bankhead", "Buckhead", "Chamblee", "CivicCenter", "CollegePark", "Decatur", "Doraville", "Dunwoody", "EastPoint", "EdgewoodCandler", "FivePoints", "Garnett", "GeorgiaDome", "GeorgiaState", "HamiltonHolmes", "IndianCreek", "InmanPark", "Kensington", "KingMemorial", "LakewoodFortMcPherson", "Lenox", "Lindbergh", "MedicalCenter", "Midtown", "NorthAvenue", "NorthSprings", "OaklandCity", "PeachtreeCenter", "SandySprings", "VineCity", "WestEnd", "WestLake"];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (array_combine($this->stations, $this->abbreviations) as $station => $abbrev) {
            MartaStation::firstOrCreate(['name' => $station, 'abbrev' => $abbrev]);
        }
    }
}
