<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreActionStrategyInvestigationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'opportunity_age'    => 'nullable|string|min:5',
            'investors_last_5yr' => 'nullable|string|min:5',
            'team_experience'    => 'nullable|string|min:5',
            'customer_value'     => 'nullable|string|min:5',
            'other_details'      => 'nullable|string',
        ];
    }

    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            $fields = ['opportunity_age', 'investors_last_5yr', 'team_experience', 'customer_value', 'other_details'];
            $filled = false;

            foreach ($fields as $field) {
                if (filled($this->input($field))) {
                    $filled = true;
                    break;
                }
            }

            if (!$filled) {
                $validator->errors()->add('_any', 'At least one investigation field is required.');
            }
        });
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