<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExperienceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'role' => ['required', 'string', 'max:255'],
            'company' => ['required', 'string', 'max:255'],
            'location' => ['nullable', 'string', 'max:255'],
            'type' => ['required', 'in:Full-time,Part-time,Internship,Freelance,Contract'],
            'start_date' => ['required', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
            'is_current' => ['sometimes', 'boolean'],
            'description' => ['nullable', 'string', 'max:5000'],
            'order_index' => ['sometimes', 'integer', 'min:0'],
        ];
    }
}
