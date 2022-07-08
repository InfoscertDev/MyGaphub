<?php

namespace App\Models\Asset;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeedBudgetAllocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'period',
        'seed_category', 'label',
        'amount', 'note'
    ];
}
