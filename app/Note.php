<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Notes';

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
        'text',
    ];

    /**
     * Get the option that owns the note.
     */
    public function option() {
        return $this->belongsTo('App\Option', 'option_id');
    }
}
