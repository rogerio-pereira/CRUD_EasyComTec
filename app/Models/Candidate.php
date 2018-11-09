<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'skype',
        'city',
        'state',
        'linkedin',
        'portfolio',

        'availability',
        'best_time',
        'salary',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'deleted_at'];

    public function bankInformation()
    {
        return $this->hasOne(BankInformation::class, 'candidate_id');
    }
}
