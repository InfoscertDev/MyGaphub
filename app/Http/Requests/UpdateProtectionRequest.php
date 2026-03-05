<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateProtectionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'details'          => 'required',
            'provider_contact' => 'required',
            'premium_pay'      => 'required',
            'sum_assured'      => 'required|numeric|min:0',
            'pay_frequently'   => 'required',
            'pay_typed'        => 'required',
            'protection_type'  => 'required',
            'cover_start'      => 'required|date|before:yesterday',
            'cover_end'        => 'required|date|after:cover_start',
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
