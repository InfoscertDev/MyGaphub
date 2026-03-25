<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


// ─────────────────────────────────────────────────────────────
// Update Liability
// ─────────────────────────────────────────────────────────────
class UpdateLiabilityRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'period_pay' => 'required|integer|min:0',
            'baseline'   => 'required|integer|min:0',
            'current'    => 'required|integer|min:0',
            'interest'   => 'required|numeric',
            'target_date'=> 'nullable|date',
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
