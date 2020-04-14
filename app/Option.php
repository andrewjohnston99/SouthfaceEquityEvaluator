<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Options';

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
        'points',
        'name'
    ];

    /**
     * Get the question that owns the option.
     */
    public function question() {
        return $this->belongsTo('App\Question', 'question_id');
    }

    /**
     * Get the question that owns the option.
     */
    public function note() {
        return $this->hasOne('App\Note');
    }
}
