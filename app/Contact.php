<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Contacts';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Attributes for mass assignment.
     *
     * @var string
     */
    protected $fillable = [
        'project_id',
        'email',
        'community_name',
        'community_address',
        'community_gps',
        'developer_phone',
        'developer_email',
        'developer_address',
        'acerage',
        'greenspace',
        'residential_units',
        'multi_family_units',
        'single_family_units',
        'commercial_space',
        'residential_space'
    ];

    /**
     * Get the project that owns the contact.
     */
    public function project() {
        return $this->belongsTo('App\Project');
    }

}
