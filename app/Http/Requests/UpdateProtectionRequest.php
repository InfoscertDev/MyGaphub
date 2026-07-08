<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateProtectionRequest extends FormRequest
{

    const PAY_FREQUENCIES = ['monthly', 'annually'];

    const PAYMENT_TYPES = ['Direct Debit', 'Debit/Credit Card', 'Standing Order'];

    // Reuse same map from StoreProtectionRequest
    private function getTypesForCategory(): array
    {
        $category = $this->input('protection_category');

        if ($category && isset(StoreProtectionRequest::PROTECTION_TYPES[$category])) {
            return StoreProtectionRequest::PROTECTION_TYPES[$category];
        }

        $all = array();
        foreach (StoreProtectionRequest::PROTECTION_TYPES as $types) {
            foreach ($types as $type) {
                $all[] = $type;
            }
        }

        return array_unique($all);
    }


    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'type'  => array('required', 'in:' . implode(',', $this->getTypesForCategory())),
            'details'          => 'required|string',
            'contact' => 'required|string',
            'provider_policy'  => 'nullable|string',
            'bank'  => 'nullable|string',
            'currency' => 'nullable|string',
            'premium_pay'      => 'required|integer|min:0',
            'sum_assured'      => 'required|integer|min:0',
            'current_balance'  => 'nullable|integer|min:0',
            'pay_freq'   => 'required|in:' . implode(',', self::PAY_FREQUENCIES),
            'pay_type'        => 'required|in:' . implode(',', self::PAYMENT_TYPES),
            'cover_start'      => 'required|date|before:yesterday',
            'cover_end'        => 'required|date|after:cover_start',
            'document'            => 'nullable|file|max:5000|mimes:docx,pdf,doc,txt', // added
        ];
    }

    public function messages(): array
    {
        $category      = $this->input('category');
        $allowed_types = $this->getTypesForCategory();

        return [
            'type.in'       => 'Protection type for "' . $category . '" must be one of: ' . implode(', ', $allowed_types),
            'pay_freq.in'  => 'Pay frequency must be one of: '   . implode(', ', self::PAY_FREQUENCIES),
            'pay_type.in'  => 'Payment type must be one of: '     . implode(', ', self::PAYMENT_TYPES),
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
