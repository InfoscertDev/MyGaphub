<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Models\Asset\ActionStrategy;

class StoreActionStrategyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'     => 'required|string|max:255',
            'reason'   => 'required|string|min:10',
            'category' => 'required|in:' . implode(',', ActionStrategy::CATEGORIES),
        ];
    }

    public function messages(): array
    {
        return [
            'category.in' => 'Category must be one of: ' . implode(', ', ActionStrategy::CATEGORIES),
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