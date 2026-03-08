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
        return [
            'investment'       => 'required|min:0|integer',
            'equity'           => 'required|min:0|integer',
            'savings'          => 'required|min:0|integer',
            'credit'           => 'required|min:0|integer',
            'mortgage'         => 'required|min:0|integer',
            'non_portfolio'    => 'required|min:0|integer',
            'portfolio'        => 'required|min:0|integer',
            'periodic_savings' => 'required|min:0|integer',
            'education'        => 'required|min:0|integer',
            'expenditure'      => 'required|min:0|integer',
            'discretionary'    => 'required|min:0|integer',
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
