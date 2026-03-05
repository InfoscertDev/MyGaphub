<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreProtectionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category'    => 'required',
            'type'        => 'required',
            'details'     => 'required',
            'contact'     => 'required',
            'premium'     => 'required',
            'pay_freq'    => 'required',
            'pay_type'    => 'required',
            'cover_start' => 'required|date|before:yesterday',
            'cover_end'   => 'required|date|after:cover_start',
            'document'    => 'nullable|file|max:5000|mimes:docx,pdf,doc,txt',
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
