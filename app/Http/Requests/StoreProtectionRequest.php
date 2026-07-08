<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreProtectionRequest extends FormRequest
{
    // Valid enum values — single source of truth used by rules()
    const PAY_FREQUENCIES = ['monthly', 'annually'];

    const PAYMENT_TYPES = ['Direct Debit', 'Debit/Credit Card', 'Standing Order'];

    const CATEGORIES = [
        'Life Insurance',
        'Home Insurance',
        'Car Insurance',
        'Critical Illness Cover',
        'Income Protection',
        'Gadget/Device Protection',
        'Health Insurance',
        'Others',
    ];

    const PROTECTION_TYPES = [
        'Life Insurance' => [
            'Whole of Life',
            'Term Assurance',
            'Endowment Policy',
            'Annuity Plan',
            'Others',
        ],
        'Home Insurance' => [
            'Building and Content',
            'Content Only',
            'Emergency Cover',
            'Others',
        ],
        'Car Insurance' => [
            'Comprehensive Cover',
            'Third Party Cover',
            'Others',
        ],
        'Critical Illness Cover' => [
            'Individual Critical Illness',
            'Joint Critical Illness',
            'Decreasing Critical Illness',
            'Others',
        ],
        'Income Protection' => [
            'Long Term',
            'Short Term',
            'Others',
        ],
        'Gadget/Device Protection' => [
            'Gadget/Device Protection',
            'Others',
        ],
        'Health Insurance' => [
            'Comprehensive Health Insurance',
            'Temporary / Short-Term Health Insurance',
            'Health Savings & Protection Plans',
            'Long-Term Care / Critical Illness Cover',
            'Hospital Cash / Specialised Covers',
            'Medical Indemnity (for liability)',
            'Others',
        ],
        'Others' => [
            'Comprehensive Health Insurance',
            'Temporary / Short-Term Health Insurance',
            'Health Savings & Protection Plans',
            'Long-Term Care / Critical Illness Cover',
            'Hospital Cash / Specialised Covers',
            'Medical Indemnity (for liability)',
            'Others',
        ],
    ];

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category'    => 'required|in:' . implode(',', self::CATEGORIES),
            'type'        => array('nullable', 'in:' . implode(',', $this->getTypesForCategory())),
            'details'     => 'required|string',
            'contact'     => 'required|string',
            'provider_policy'  => 'nullable|string',
            'bank'  => 'nullable|string',
            'currency' => 'nullable|string',
            'premium_pay'      => 'required|integer|min:0',
            'sum_assured'      => 'required|integer|min:0',
            'current_balance'  => 'nullable|integer|min:0',
            'pay_freq'    => 'required|in:' . implode(',', self::PAY_FREQUENCIES),
            'pay_type'    => 'required|in:' . implode(',', self::PAYMENT_TYPES),
            'cover_start' => 'required|date|before:yesterday',
            'cover_end'   => 'required|date|after:cover_start',
            'document'    => 'nullable|file|max:5000|mimes:docx,pdf,doc,txt',
        ];
    }

    private function getTypesForCategory(): array
    {
        $category = $this->input('category');

        if ($category && isset(self::PROTECTION_TYPES[$category])) {
            return self::PROTECTION_TYPES[$category];
        }

        // Fallback: flatten all types if category is invalid or not yet submitted
        $all = array();
        foreach (self::PROTECTION_TYPES as $types) {
            foreach ($types as $type) {
                $all[] = $type;
            }
        }

        return array_unique($all);
    }

    public function messages(): array
    {
        $category      = $this->input('category');
        $allowed_types = $this->getTypesForCategory();

        return array(
            'category.in'  => 'Category must be one of: ' . implode(', ', self::CATEGORIES),
            'type.in'       => 'Protection type for "' . $category . '" must be one of: ' . implode(', ', $allowed_types),
            'pay_freq.in'  => 'Pay frequency must be one of: ' . implode(', ', self::PAY_FREQUENCIES),
            'pay_type.in'  => 'Payment type must be one of: ' . implode(', ', self::PAYMENT_TYPES),
        );
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(response()->json([
            'status'  => false,
            'data'    => [],
            'message' => $validator->errors()->first(),
        ], 422));
    }
}
