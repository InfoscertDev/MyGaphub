<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

// ─────────────────────────────────────────────────────────────
// Store Liability
// ─────────────────────────────────────────────────────────────
class StoreLiabilityRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'lcreditor'   => 'required|max:50',
            'credit_type' => 'required',
            'currency'    => 'required',
            'baseline'    => 'required|integer|min:0',
            'current'     => 'required|integer|min:0',
            'target_date' => 'nullable|date|after:today',
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
