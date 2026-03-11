<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StorePortfolioRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'currency'         => 'required',
            'asset_name'       => 'required|max:50',
            'description'      => 'required|max:350',
            'asset_value'      => 'required|numeric',
            'monthly_roi'      => 'required|numeric',
            'credit_value'     => 'required|numeric',
            'projected_value'  => 'required|numeric',
            'portfolio_type'   => 'required|numeric',
            'asset_category'   => 'required|in:existing,desired',
            'asset_class'      => 'required|in:business,risk,intellectual,depreciating,appreciating',
        ];
    }

    public function messages(): array
    {
        return [
            'asset_category.in' => 'Invalid Credentials',
            'asset_class.in'    => 'Invalid Credentials',
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