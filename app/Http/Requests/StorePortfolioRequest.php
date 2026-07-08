<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreProtectionRequest extends FormRequest
{
    // Valid enum values — single source of truth used by rules()
    const PAY_FREQUENCIES = ['Monthly', 'Annually'];

    const PAYMENT_TYPES = ['Direct Debit', 'Debit/Credit Card', 'Standing Order'];

    const PROTECTION_TYPES = [
        'Whole of Life',
        'Term Assurance',
        'Endowment Policy',
        'Annuity Plan',
        'Comprehensive Cover',
        'Gadget/Device Protection',
        'Third Party Cover',
        'Others',
    ];

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category'    => 'required|string',
            'type'        => 'required|in:' . implode(',', self::PROTECTION_TYPES),
            'details'     => 'required|string',
            'contact'     => 'required|string',
            'provider_policy'  => 'nullable|string',
            'bank'  => 'nullable|string',
            'currency' => 'nullable|string',
            'premium_pay'      => 'required|integer|min:0',
            'sum_assured'      => 'required|integer|min:0',
            'current_balance'  => 'nullable|integer|min:0',
            'premium'     => 'required|integer|min:0',
            'pay_freq'    => 'required|in:' . implode(',', self::PAY_FREQUENCIES),
            'pay_type'    => 'required|in:' . implode(',', self::PAYMENT_TYPES),
            'cover_start' => 'required|date|before:yesterday',
            'cover_end'   => 'required|date|after:cover_start',
            'document'    => 'nullable|file|max:5000|mimes:docx,pdf,doc,txt',
        ];
    }

    public function messages(): array
    {
        return [
            'type.in'     => 'Protection type must be one of: ' . implode(', ', self::PROTECTION_TYPES),
            'pay_freq.in' => 'Pay frequency must be one of: ' . implode(', ', self::PAY_FREQUENCIES),
            'pay_type.in' => 'Payment type must be one of: ' . implode(', ', self::PAYMENT_TYPES),
        ];
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
