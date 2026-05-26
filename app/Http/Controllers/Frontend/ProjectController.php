<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::latest();

        if ($request->has('industry') && $request->industry != '') {
            $query->where('industry', $request->industry);
        }

        $projects = $query->get();

        // Get unique industries for the filter bar
        $industries = Project::select('industry')
            ->distinct()
            ->whereNotNull('industry')
            ->where('industry', '!=', '')
            ->pluck('industry')
            ->sort();

        $featuredProject = Project::where('is_featured', true)->latest()->first();

        return view('frontend.pages.case-studies', [
            'title' => 'Case Studies - Real Projects, Real Results | Accelerate Lab',
            'description' => 'Explore our portfolio of successful digital products, from fintech platforms to enterprise SaaS solutions. See the engineering behind each project.',
            'projects' => $projects,
            'industries' => $industries,
            'currentIndustry' => $request->industry,
            'featuredProject' => $featuredProject,
        ]);
    }

    public function show(Project $project)
    {
        return view('frontend.pages.project', [
            'title' => $project->title . ' - Case Study | Accelerate Lab',
            'description' => $project->description ?? \Illuminate\Support\Str::limit(strip_tags($project->challenge), 160),
            'ogImage' => $project->image_path ? \Illuminate\Support\Facades\Storage::url($project->image_path) : null,
            'project' => $project,
        ]);
    }
}
