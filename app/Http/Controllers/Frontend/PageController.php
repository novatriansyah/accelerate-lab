<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller; // Import base controller
use App\Models\Article;
use App\Models\CompanyMilestone;
use App\Models\CoreValue;
use App\Models\HomepageStat;
use App\Models\JobPosting;
use App\Models\Project;
use App\Models\Service;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        // Get 3 recent projects for the homepage
        $recentProjects = Project::latest()->take(3)->get();

        $heroStats = HomepageStat::where('section', 'hero')->orderBy('sort_order')->take(3)->get();
        $capabilityStats = HomepageStat::where('section', 'capabilities')->orderBy('sort_order')->take(3)->get();

        return view('frontend.pages.home', [
            'title' => 'Accelerate Lab - Digital Innovation Agency',
            'description' => 'Accelerate Lab is a full-service digital innovation agency offering custom software, cloud solutions, and strategic design.',
            'recentProjects' => $recentProjects,
            'heroStats' => $heroStats,
            'capabilityStats' => $capabilityStats,
        ]);
    }

    public function blog()
    {
        $featured = Article::with(['category', 'author'])
            ->where('is_featured', true)
            ->where('published_at', '<=', now())
            ->latest('published_at')
            ->first();

        // If no featured, just take the latest one
        if (! $featured) {
            $featured = Article::with(['category', 'author'])
                ->where('published_at', '<=', now())
                ->latest('published_at')
                ->first();
        }

        $latest = Article::with(['category', 'author'])
            ->where('published_at', '<=', now())
            ->where('id', '!=', $featured?->id)
            ->latest('published_at')
            ->paginate(9);

        return view('frontend.pages.blog', [
            'title' => 'Insights & Innovation - Accelerate Lab',
            'featured' => $featured,
            'latest' => $latest,
        ]);
    }

    public function article(Article $article)
    {
        if ($article->published_at > now()) {
            abort(404);
        }

        return view('frontend.pages.article', [
            'title' => $article->title . ' - Accelerate Lab',
            'description' => \Illuminate\Support\Str::limit(strip_tags($article->content), 160),
            'ogType' => 'article',
            'ogImage' => $article->image_path ? \Illuminate\Support\Facades\Storage::url($article->image_path) : null,
            'article' => $article,
        ]);
    }

    public function services()
    {
        $services = Service::orderBy('sort_order')->get();

        $strategyService = $services->firstWhere('category', 'strategy');
        $developmentServices = $services->where('category', 'development');

        // Aggregate all unique technologies from all services
        $techStack = $services->pluck('technologies')
            ->flatten(1)
            ->filter() // filter out nulls if any
            ->pluck('name')
            ->unique()
            ->values();

        return view('frontend.pages.services', [
            'title' => 'Our Services - Accelerate Lab',
            'services' => $services, // Keep all for safety or other uses
            'strategyService' => $strategyService,
            'developmentServices' => $developmentServices,
            'techStack' => $techStack,
        ]);
    }

    public function service(Service $service)
    {
        if ($service->has_custom_page) {
            $view = "frontend.pages.{$service->slug}";
            
            // Hardcoded titles from previous controller to maintain compatibility
            // or we could add a meta_title column to services table later.
            $customTitles = [
                'web-application-development' => 'Accelerate Lab - Web Application Development',
                'mobile-app-development' => 'Accelerate Lab Mobile Dev',
                'cloud-architecture' => 'Accelerate Lab - Cloud Architecture',
                'ui-ux-design' => 'Accelerate Lab - UI/UX Design',
            ];

            return view($view, [
                'service' => $service,
                'title' => $customTitles[$service->slug] ?? $service->title . ' - Accelerate Lab',
            ]);
        }

        return view('frontend.pages.service', [
            'title' => $service->title . ' - Accelerate Lab',
            'description' => $service->short_description ?? \Illuminate\Support\Str::limit(strip_tags($service->content), 160),
            'service' => $service,
        ]);
    }

    public function careers()
    {
        $jobs = JobPosting::where('is_active', true)->latest()->get();

        return view('frontend.pages.careers', [
            'title' => 'Careers - Accelerate Lab',
            'jobs' => $jobs,
        ]);
    }

    public function about()
    {
        $teamMembers = TeamMember::orderBy('sort_order')->get();
        $milestones = CompanyMilestone::orderBy('sort_order')->get();
        $coreValues = CoreValue::orderBy('sort_order')->get();
        $stats = HomepageStat::where('section', 'about')->orderBy('sort_order')->get();

        return view('frontend.pages.about', [
            'title' => 'About Accelerate Lab',
            'teamMembers' => $teamMembers,
            'milestones' => $milestones,
            'coreValues' => $coreValues,
            'stats' => $stats,
        ]);
    }

    public function contact()
    {
        return view('frontend.pages.contact', ['title' => 'Contact Us']);
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

        $featuredProject = Project::where('is_featured', true)->latest()->first();

        return view('frontend.pages.case-studies', [
            'title' => 'Accelerate Lab - Case Studies',
            'projects' => $projects,
            'industries' => $industries,
            'currentIndustry' => $request->industry,
            'featuredProject' => $featuredProject,
        ]);
    }

    public function project(Project $project)
    {
        return view('frontend.pages.project', [
            'title' => $project->title . ' - Case Study',
            'description' => $project->description ?? \Illuminate\Support\Str::limit(strip_tags($project->challenge), 160),
            'ogImage' => $project->image_path ? \Illuminate\Support\Facades\Storage::url($project->image_path) : null,
            'project' => $project,
        ]);
    }
}
