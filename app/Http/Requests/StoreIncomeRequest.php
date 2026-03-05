<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreIncomeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'income_type' => 'required|in:portfolio,non_portfolio',
            'income_date' => 'nullable|date|before:today',
        ];

        if ($this->income_type === 'non_portfolio') {
            $rules['amount']      = 'required|numeric';
            $rules['income_name'] = 'required|max:50';
            $rules['channel']     = 'required';
        } else {
            $rules['portfolio_asset'] = 'required|integer';
        }

        return $rules;
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
