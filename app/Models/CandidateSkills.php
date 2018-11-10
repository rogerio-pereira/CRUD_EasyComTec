<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidateSkills extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'candidate_id',
        'skill_id',
        'rate',
        'other',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'deleted_at'];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class, 'candidate_id');
    }

    public function skill()
    {
        return $this->hasOne(Skill::class, 'skill_id');
    }
}
