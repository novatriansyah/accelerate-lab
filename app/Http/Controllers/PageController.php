<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        // Get 3 recent projects for the homepage
        $recentProjects = Project::latest()->take(3)->get();
        return view('pages.home', [
            'title' => 'Accelerate Lab - Digital Innovation Agency',
            'recentProjects' => $recentProjects
        ]);
    }

    public function caseStudies(Request $request)
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

        return view('pages.case-studies', [
            'title' => 'Accelerate Lab - Case Studies',
            'projects' => $projects,
            'industries' => $industries,
            'currentIndustry' => $request->industry
        ]);
    }
}
