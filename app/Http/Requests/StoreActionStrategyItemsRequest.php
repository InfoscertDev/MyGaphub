<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Models\Asset\ActionStrategy;

class StoreActionStrategyItemsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // Strategy is resolved in the service — we validate allowed subs dynamically
        $strategy = ActionStrategy::where('user_id', $this->user()->id)
            ->find($this->route('strategyId'));

        $allowedSubs = array();

        if ($strategy && isset(ActionStrategy::SUB_CATEGORIES[$strategy->category])) {
            $allowedSubs = ActionStrategy::SUB_CATEGORIES[$strategy->category];
        }

        return [
            'items'                => 'required|array|min:1',
            'items.*.sub_category' => 'required|in:' . implode(',', $allowedSubs),
            'items.*.note'         => 'nullable|string|min:5',
        ];
    }

    public function messages(): array
    {
        return [
            'items.*.sub_category.in' => 'Sub-category is not valid for the selected strategy category.',
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