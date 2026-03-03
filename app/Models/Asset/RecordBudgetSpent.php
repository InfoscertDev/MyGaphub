<?php

namespace App\Models\Asset;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordBudgetSpent extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'period',
        'allocation_id',
        'label',
        'amount',
        'note',
        'date' ,
        'recuring'
    ];
}
