<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(): View
    {
        return view('admin.projects.index', ['projects' => Project::with('skills')->get()]);
    }

    public function create(): View
    {
        return view('admin.projects.create', ['skills' => Skill::all()]);
    }

    public function store(StoreProjectRequest $request): RedirectResponse
    {
        $project = Project::create($request->validated());
        if ($request->has('skills')) {
            $project->skills()->sync($request->skills);
        }
        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil ditambahkan.');
    }

    public function edit(Project $project): View
    {
        return view('admin.projects.edit', ['project' => $project, 'skills' => Skill::all()]);
    }

    public function update(StoreProjectRequest $request, Project $project): RedirectResponse
    {
        $project->update($request->validated());
        if ($request->has('skills')) {
            $project->skills()->sync($request->skills);
        }
        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil diperbarui.');
    }

    public function destroy(Project $project): RedirectResponse
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil dihapus.');
    }
}
