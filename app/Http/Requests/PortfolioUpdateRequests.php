<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

// ─────────────────────────────────────────────────────────────
// Update Asset Details
// ─────────────────────────────────────────────────────────────
class UpdatePortfolioDetailsRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'asset_name'    => 'required|string',
            'asset_value'   => 'required|numeric',
            'income'        => 'numeric',
            'portfolio_type'=> 'required|numeric',
            'automated_rate'=> 'required',
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
// Update Asset Photo
// ─────────────────────────────────────────────────────────────
class UpdatePortfolioPhotoRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'photo' => 'required|mimes:jpeg,jpg,png,gif|max:2140',
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
// Update Asset Records (financial period)
// ─────────────────────────────────────────────────────────────
class UpdatePortfolioRecordsRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        $max = 10000000000;
        return [
            'amount'      => "required|numeric|min:0|max:$max",
            'revenue'     => "required|numeric|min:0|max:$max",
            'management'  => "required|numeric|min:0|max:$max",
            'maintenance' => "required|numeric|min:0|max:$max",
            'taxes'       => "required|numeric|min:0|max:$max",
            'period'      => 'nullable|date|before:today',
        ];
    }

    public function messages(): array
    {
        return ['period.date' => 'Incorrect Period'];
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
// Update Asset Note
// ─────────────────────────────────────────────────────────────
class UpdatePortfolioNoteRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'note'   => 'required|min:10|max:256',
            'period' => 'required|date|before:today',
        ];
    }

    public function messages(): array
    {
        return ['period.date' => 'Incorrect Period'];
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
