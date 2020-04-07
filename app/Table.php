<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Tables';

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
    public function stations() {
        return $this->belongsToMany('App\MartaStation', 'StationsTables', 'table_id', 'station_id');
    }
}
