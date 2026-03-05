<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreRetirementRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $max_year = date('Y-m-d', strtotime('-18 years'));

        return [
            'pension_name'     => 'required',
            'pension_type'     => 'required',
            'current'          => 'required|numeric|min:0',
            'assured_income'   => 'required|numeric|min:0',
            'monthly_cont'     => 'required|numeric|min:0',
            'pension_provider' => 'required',
            'retire_age'       => 'required',
            'dob'              => 'nullable|date|before:' . $max_year,
        ];
    }

    public function messages(): array
    {
        return [
            'dob.before' => 'Input a correct date of birth: GAPhub user must be at least 18 years of age.',
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
