<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankInformation extends Model
{
    protected $fillable = [
        'candidate_id',
        'bank_information',
        'owner',
        'cpf',
        'bank',
        'agency',
        'account',
        'account_type',
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
}
