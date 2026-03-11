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

// ─────────────────────────────────────────────────────────────
// Update Mortgage
// ─────────────────────────────────────────────────────────────
class UpdateMortgageRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'open_balance' => 'required|integer|min:0',
            'current'      => 'required|integer|min:0',
            'repayment'    => 'required|integer|min:0',
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
