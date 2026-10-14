<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'regex:/^[a-z0-9-]+$/'],
            'description' => ['required', 'string', 'max:10000'],
            'thumbnail' => ['nullable', 'url', 'max:2048'],
            'demo_url' => ['nullable', 'url', 'max:2048'],
            'github_url' => ['nullable', 'url', 'max:2048'],
            'category' => ['required', 'string', 'max:50'],
            'is_featured' => ['sometimes', 'boolean'],
            'order_index' => ['sometimes', 'integer', 'min:0'],
            'skills' => ['nullable', 'array'],
            'skills.*' => ['exists:skills,id'],
        ];
    }
}
