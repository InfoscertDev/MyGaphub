<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreActionStrategyAllocationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'monthly_percent' => 'required|in:10,25,50,100',
            'lumpsum_percent' => 'required|in:10,25,50,100',
        ];
    }

    public function messages(): array
    {
        return [
            'monthly_percent.in' => 'Monthly percent must be one of: 10, 25, 50, 100.',
            'lumpsum_percent.in' => 'Lumpsum percent must be one of: 10, 25, 50, 100.',
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