<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Items';

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
        'name',
        'instructions'
    ];

    /**
     * Get the questions for the item.
     */
    public function questions() {
        return $this->hasOne('App\Question');
    }

    /**
     * Get the table that owns the item.
     */
    public function table() {
        return $this->belongsTo('App\ProjectTable');
    }
}
