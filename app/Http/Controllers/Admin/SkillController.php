<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSkillRequest;
use App\Models\Skill;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SkillController extends Controller
{
    public function index(): View
    {
        return view('admin.skills.index', ['skills' => Skill::orderBy('category')->orderBy('order_index')->get()]);
    }

    public function create(): View
    {
        return view('admin.skills.create', ['categories' => ['Frontend', 'Backend', 'Database', 'Tools', 'Other']]);
    }

    public function store(StoreSkillRequest $request): RedirectResponse
    {
        Skill::create($request->validated());
        return redirect()->route('admin.skills.index')->with('success', 'Skill berhasil ditambahkan.');
    }

    public function edit(Skill $skill): View
    {
        return view('admin.skills.edit', ['skill' => $skill, 'categories' => ['Frontend', 'Backend', 'Database', 'Tools', 'Other']]);
    }

    public function update(StoreSkillRequest $request, Skill $skill): RedirectResponse
    {
        $skill->update($request->validated());
        return redirect()->route('admin.skills.index')->with('success', 'Skill berhasil diperbarui.');
    }

    public function destroy(Skill $skill): RedirectResponse
    {
        $skill->delete();
        return redirect()->route('admin.skills.index')->with('success', 'Skill berhasil dihapus.');
    }
}
