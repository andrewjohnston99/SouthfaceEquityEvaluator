<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Guests';

    /**
     * Turn off timestamps
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Attributes for mass assignment
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'project_metadata'
    ];

    /**
     * Attributes not for mass assignment
     *
     * @var array
     */
    protected $guarded = [
        'station_id'
    ];

    /**
     * Attributes that are casted
     *
     * @var array
     */
    protected $casts = [
        'project_metadata' => 'array',
    ];
}
