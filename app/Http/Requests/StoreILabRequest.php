<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreILabRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // Category is always required first
        $rules = [
            'category' => 'required|in:income,liabilities,asset,budget',
        ];

        // Then validate only the fields that belong to the submitted category
        return array_merge($rules, $this->categoryRules());
    }

    private function categoryRules(): array
    {
        return match ($this->input('category')) {

            'income' => [
                'portfolio'     => 'required|numeric|min:0',
                'non_portfolio' => 'required|numeric|min:0',
            ],

            'liabilities' => [
                'credit'   => 'required|numeric|min:0',
                'mortgage' => 'required|numeric|min:0',
            ],

            'asset' => [
                'investment' => 'required|numeric|min:0',
                'equity'     => 'required|numeric|min:0',
                'cash'       => 'required|numeric|min:0', // stored as savings in DB
            ],

            'budget' => [
                'periodic_savings' => 'required|numeric|min:0',
                'education'        => 'required|numeric|min:0',
                'expenditure'      => 'required|numeric|min:0',
                'discretionary'    => 'required|numeric|min:0',
            ],

            default => [], // category validator above will catch invalid values
        };
    }

    public function messages(): array
    {
        return [
            'category.required' => 'A category is required to save.',
            'category.in'       => 'Category must be one of: income, liabilities, asset, budget.',
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