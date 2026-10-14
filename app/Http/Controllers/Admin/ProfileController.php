<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Profile;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function edit(): View
    {
        return view('admin.profile.edit', ['profile' => Profile::firstOrNew()]);
    }

    public function update(UpdateProfileRequest $request): RedirectResponse
    {
        $profile = Profile::firstOrNew();
        $profile->fill($request->validated());
        $profile->save();
        return redirect()->route('admin.profile.edit')->with('success', 'Profile berhasil diperbarui.');
    }
}
