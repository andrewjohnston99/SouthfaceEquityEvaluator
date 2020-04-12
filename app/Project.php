<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Projects';

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
        'user_id',
        'station_id'
    ];

    /**
     * Attributes that are casted
     *
     * @var array
     */
    protected $casts = [
        'project_metadata' => 'array',
        'project_json' => 'array'
    ];

    /**
     * Get the user that owns the project.
     */
    public function user() {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the station associated with the project.
     */
    public function station() {
        return $this->hasOne('App\User');
    }
}
