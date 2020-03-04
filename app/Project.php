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
    protected $table = 'projects';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'project_id';

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
        'user_id',
        'project_metadata',
        'project_xls',
        'project_json'
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
}
