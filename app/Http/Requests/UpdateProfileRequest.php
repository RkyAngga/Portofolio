<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'full_name' => ['required', 'string', 'max:255'],
            'headline' => ['required', 'string', 'max:255'],
            'bio_short' => ['nullable', 'string', 'max:500'],
            'about_me' => ['nullable', 'string', 'max:10000'],
            'avatar_url' => ['nullable', 'string', 'max:2048'],
            'resume_url' => ['nullable', 'url', 'max:2048'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'location' => ['nullable', 'string', 'max:255'],
            'github_url' => ['nullable', 'url', 'max:2048'],
            'linkedin_url' => ['nullable', 'url', 'max:2048'],
            'twitter_url' => ['nullable', 'url', 'max:2048'],
        ];
    }
}
