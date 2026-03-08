<?php

namespace App\Http\Requests;

use App\Enums\SeedToken;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreSeedRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'session'  => 'required',
            'category' => 'required|in:expenditure,discretionary',
        ];

        if ($this->category === 'expenditure') {
            $rules = array_merge($rules, [
                'accomodation' => 'required|numeric|min:0',
                'mobility'     => 'required|numeric|min:0',
                'expenses'     => 'required|numeric|min:0',
                'utilities'    => 'required|numeric|min:0',
                'debt_repay'   => 'required|numeric|min:0',
            ]);
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'session.required' => 'Token required.',
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
