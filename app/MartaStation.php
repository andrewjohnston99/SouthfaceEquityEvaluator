<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MartaStation extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'MartaStations';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Attributes not for mass assignment.
     *
     * @var string
     */
    protected $fillable = [
        'abbrev',
        'name'
    ];

    /**
     * Tables that belong to the station.
     */
    public function tables() {
        return $this->belongsToMany('App\ProjectTable', 'StationsTables', 'station_id', 'table_id');
    }
}
