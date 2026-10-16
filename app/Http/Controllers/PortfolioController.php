<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\View\View;

class PortfolioController extends Controller
{
    public function index(): View
    {
        $skillsQuery = Skill::orderBy('category')->orderBy('order_index')->get();
        $projectsQuery = Project::with('skills')->orderByDesc('is_featured')->orderBy('order_index')->get();
        $experiencesQuery = Experience::orderByDesc('start_date')->get();

        return view('portfolio.index', [
            'profile' => Profile::query()->first() ?? new Profile([
                'full_name' => 'Portfolio',
                'headline' => 'Full-Stack Developer',
                'bio_short' => 'Crafting digital solutions with precision, creativity, and impact.',
                'about_me' => 'Professional software engineer with expertise in web development, system design, and modern architecture.',
                'avatar_url' => '/images/profile.jpg',
            ]),
            'projects' => $projectsQuery,
            'skills' => $skillsQuery->groupBy('category'),
            'experiences' => $experiencesQuery,
            'projectsCount' => $projectsQuery->count(),
            'skillsCount' => $skillsQuery->count(),
            'experiencesCount' => $experiencesQuery->count(),
        ]);
    }
}
