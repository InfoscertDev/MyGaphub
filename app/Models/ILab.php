<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ILab extends Model
{
    protected $fillable = [
        'user_id',
        'asset_portfolio',
        'non_portfolio',
        'credit',
        'mortgage',
        'investment',
        'equity',
        'savings',        // DB column name stays as savings
        'periodic_savings',
        'education',
        'expenditure',
        'discretionary',
    ];

    /**
     * Format the ILab record into the 4-category structure
     * the frontend expects. "savings" DB column is exposed
     * as "cash" throughout — no migration needed.
     */
    public function toGroupedArray(): array
    {
        return [
            'income' => [
                [
                    'key'     => 'portfolio',
                    'label'   => 'Portfolio',
                    'current' => $this->asset_portfolio ?? 0,
                    'target'  => null, // target is what the user sets via storeILab
                ],
                [
                    'key'     => 'non_portfolio',
                    'label'   => 'Non-Portfolio',
                    'current' => $this->non_portfolio ?? 0,
                    'target'  => null,
                ],
            ],
            'liabilities' => [
                [
                    'key'     => 'credit',
                    'label'   => 'Credit',
                    'current' => $this->credit ?? 0,
                    'target'  => null,
                ],
                [
                    'key'     => 'mortgage',
                    'label'   => 'Mortgage',
                    'current' => $this->mortgage ?? 0,
                    'target'  => null,
                ],
            ],
            'asset' => [
                [
                    'key'     => 'investment',
                    'label'   => 'Investments',
                    'current' => $this->investment ?? 0,
                    'target'  => null,
                ],
                [
                    'key'     => 'equity',
                    'label'   => 'Home Equity',
                    'current' => $this->equity ?? 0,
                    'target'  => null,
                ],
                [
                    'key'     => 'cash',              // UI label = cash
                    'label'   => 'Cash',
                    'current' => $this->savings ?? 0, // reads from savings column
                    'target'  => null,
                ],
            ],
            'budget' => [
                [
                    'key'     => 'periodic_savings',
                    'label'   => 'Savings Periodic',
                    'current' => $this->periodic_savings ?? 0,
                    'target'  => null,
                ],
                [
                    'key'     => 'education',
                    'label'   => 'Education',
                    'current' => $this->education ?? 0,
                    'target'  => null,
                ],
                [
                    'key'     => 'expenditure',
                    'label'   => 'Expenditure',
                    'current' => $this->expenditure ?? 0,
                    'target'  => null,
                ],
                [
                    'key'     => 'discretionary',
                    'label'   => 'Discretionary',
                    'current' => $this->discretionary ?? 0,
                    'target'  => null,
                ],
            ],
        ];
    }
}