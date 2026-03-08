<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

/**
 * Validates the payload for any archive/unarchive operation.
 * Used by ArchiveController which handles all wheel account types.
 */
class ArchiveRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'header'     => 'required|string',
            'access'     => 'required|string',
            'account_id' => 'required|integer',
            'bespoke_id' => 'nullable|integer',
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