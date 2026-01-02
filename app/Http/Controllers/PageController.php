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

    public function caseStudies()
    {
        $projects = Project::latest()->get();
        return view('pages.case-studies', [
            'title' => 'Accelerate Lab - Case Studies',
            'projects' => $projects
        ]);
    }
}
