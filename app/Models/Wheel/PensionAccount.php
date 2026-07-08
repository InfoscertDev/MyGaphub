<?php

namespace App\Models\Wheel;

use Illuminate\Database\Eloquent\Model;

class PensionAccount extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'pension_type',
        'provider',
        'current',
        'assured_income',
        'percentage_cos',
        'monthly_contribution',
        'retirement_age',
    ];

    protected $casts = [
        'current'              => 'integer',
        'assured_income'       => 'integer',
        'percentage_cos'       => 'float',
        'monthly_contribution' => 'integer',
        'retirement_age'       => 'integer',
    ];

    protected $hidden = [
        'other',
        'extra',
        'updated_at',
    ];

    // Assumes App\Models\User or App\User — match your existing User model path
    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }
}