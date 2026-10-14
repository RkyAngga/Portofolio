<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSkillRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'category' => ['required', 'in:Frontend,Backend,Database,Tools,Other'],
            'icon' => ['nullable', 'string', 'max:100'],
            'order_index' => ['sometimes', 'integer', 'min:0'],
        ];
    }
}
