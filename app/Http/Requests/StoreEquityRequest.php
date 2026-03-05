<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreEquityRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'location'     => 'required',
            'market_value' => 'required|numeric|min:10',
            'country'      => 'required',
            'ismortgage'   => 'required|integer',
        ];

        if ($this->ismortgage) {
            $rules['mortgage'] = 'required|integer';
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'ismortgage.integer' => 'Please choose a Mortgage',
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
