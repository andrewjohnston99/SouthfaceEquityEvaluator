<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Questions';

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
        'type',
        'header'
    ];

    /**
     * Get the item that owns the question.
     */
    public function item() {
        return $this->belongsTo('App\Item');
    }

    /**
     * Get the options for the question.
     */
    public function options() {
        return $this->hasMany('App\Option', 'question_id', 'id')->orderBy('title');
    }
}
