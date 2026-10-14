<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard', [
            'projectCount' => Project::count(),
            'skillCount' => Skill::count(),
            'experienceCount' => Experience::count(),
            'messageCount' => ContactMessage::where('is_read', false)->count(),
            'recentMessages' => ContactMessage::latest()->limit(5)->get(),
        ]);
    }
}
