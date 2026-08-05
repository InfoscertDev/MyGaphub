<?php

namespace App\Models\Wheel;

use Illuminate\Database\Eloquent\Model;

class ProtectionAccount extends Model
{
    protected $fillable = [
        'user_id',
        'protection_category',
        'protection_type',
        'details',
        'provider_contact',
        'provider_policy',
        'sum_assured',
        'premium_pay',
        'current_balance',
        'pay_frequency',
        'payment_type',
        'cover_start',
        'cover_end',
        'document',
        'extra',
        'other',
        'bank',
        'currency',
    ];

    protected $casts = [
        'cover_start'     => 'date',
        'cover_end'       => 'date',
        'sum_assured'     => 'integer',
        'premium_pay'     => 'integer',
        'current_balance' => 'integer',
    ];

    // Appended automatically to every response — no extra call needed
    protected $appends = ['document_url'];

     /**
     * Scope: filter by pay_frequency period.
     * 'monthly' → only Monthly records
     * 'yearly'  → all records (default)
     */
    public function scopePeriod($query, $period)
    {
        if ($period === 'monthly') {
            return $query->whereRaw('LOWER(pay_frequency) = ?', ['monthly']);
        }

        if ($period === 'annually') {
            return $query->whereRaw('LOWER(pay_frequency) = ?', ['annually']);
        }

        // null or anything else → return all records, no filter
        return $query;
    }
    /**
     * Dynamically resolves the full public URL for the document.
     * Returns null if no document is stored.
     * Storage path assumed: public/user/{filename}
     * which maps to: /storage/user/{filename}
     */
    public function getDocumentUrlAttribute(): ?string
    {
        if (empty($this->document)) {
            return null;
        }

        return asset('/assets/' . str_replace('public', 'storage', $this->document));
    }

    public function user()
    {
        // Assumes App\Models\User — replace if your User model lives elsewhere
        return $this->belongsTo(\App\User::class);
    }
}
//     ALTER TABLE `protection_accounts`
// ADD COLUMN `bank` VARCHAR(255) NULL,
// ADD COLUMN `currency` VARCHAR(255) NULL;