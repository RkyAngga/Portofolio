<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExperienceRequest;
use App\Models\Experience;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ExperienceController extends Controller
{
    public function index(): View
    {
        return view('admin.experiences.index', ['experiences' => Experience::orderByDesc('start_date')->get()]);
    }

    public function create(): View
    {
        return view('admin.experiences.create', ['types' => ['Full-time', 'Part-time', 'Internship', 'Freelance', 'Contract']]);
    }

    public function store(StoreExperienceRequest $request): RedirectResponse
    {
        Experience::create($request->validated());
        return redirect()->route('admin.experiences.index')->with('success', 'Experience berhasil ditambahkan.');
    }

    public function edit(Experience $experience): View
    {
        return view('admin.experiences.edit', ['experience' => $experience, 'types' => ['Full-time', 'Part-time', 'Internship', 'Freelance', 'Contract']]);
    }

    public function update(StoreExperienceRequest $request, Experience $experience): RedirectResponse
    {
        $experience->update($request->validated());
        return redirect()->route('admin.experiences.index')->with('success', 'Experience berhasil diperbarui.');
    }

    public function destroy(Experience $experience): RedirectResponse
    {
        $experience->delete();
        return redirect()->route('admin.experiences.index')->with('success', 'Experience berhasil dihapus.');
    }
}
