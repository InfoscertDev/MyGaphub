<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

// ─────────────────────────────────────────────────────────────
// Store Mortgage
// ─────────────────────────────────────────────────────────────
class StoreMortgageRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'creditor'       => 'required|max:50',
            'description'    => 'required',
            'secure_against' => 'required',
            'open_bal'       => 'required|numeric|min:0',
            'current_bal'    => 'required|numeric|min:0',
            'interest'       => 'required|numeric',
            'month_pay'      => 'required|numeric|min:0',
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
