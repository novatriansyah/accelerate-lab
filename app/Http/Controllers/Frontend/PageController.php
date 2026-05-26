<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CompanyMilestone;
use App\Models\CoreValue;
use App\Models\HomepageStat;
use App\Models\JobPosting;
use App\Models\Project;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\Testimonial;

class PageController extends Controller
{
    public function home()
    {
        $recentProjects = Project::latest()->take(3)->get();

        $heroStats = HomepageStat::where('section', 'hero')->orderBy('sort_order')->take(3)->get();
        $capabilityStats = HomepageStat::where('section', 'capabilities')->orderBy('sort_order')->take(3)->get();
        $testimonials = Testimonial::active()->orderBy('sort_order')->take(3)->get();

        return view('frontend.pages.home', [
            'title' => 'Accelerate Lab - Digital Innovation Agency',
            'description' => 'Accelerate Lab is a full-service digital innovation agency offering custom software, cloud solutions, and strategic design.',
            'recentProjects' => $recentProjects,
            'heroStats' => $heroStats,
            'capabilityStats' => $capabilityStats,
            'testimonials' => $testimonials,
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
            'title' => 'Our Services - Custom Software, Cloud & Design | Accelerate Lab',
            'description' => 'From product strategy and UI/UX design to custom web and mobile development, cloud architecture, and API integrations. Explore how Accelerate Lab engineers digital solutions.',
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

            if (! view()->exists($view)) {
                abort(404);
            }

            return view($view, [
                'service' => $service,
                'title' => $service->meta_title ?? $service->title . ' - Accelerate Lab',
                'description' => $service->short_description ?? \Illuminate\Support\Str::limit(strip_tags($service->content), 160),
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
            'title' => 'Careers at Accelerate Lab - Join Our Engineering Team',
            'description' => 'Join Accelerate Lab and build cutting-edge digital products. Browse open positions in engineering, design, and strategy.',
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
            'title' => 'About Accelerate Lab - Our Story, Mission & Team',
            'description' => 'Learn about Accelerate Lab, a digital innovation agency founded by Nova Triansyah Azis. Discover our mission, core values, and engineering philosophy.',
            'teamMembers' => $teamMembers,
            'milestones' => $milestones,
            'coreValues' => $coreValues,
            'stats' => $stats,
        ]);
    }

    public function contact()
    {
        return view('frontend.pages.contact', [
            'title' => 'Contact Us - Accelerate Lab',
            'description' => 'Get in touch with Accelerate Lab. Start a project, request a consultation, or ask about our custom software development and cloud services.',
        ]);
    }

    public function privacyPolicy()
    {
        return view('frontend.pages.privacy-policy', [
            'title' => 'Privacy Policy - Accelerate Lab',
            'description' => 'Read Accelerate Lab\'s privacy policy. Learn how we collect, use, and protect your personal information.',
        ]);
    }

    public function termsOfService()
    {
        return view('frontend.pages.terms-of-service', [
            'title' => 'Terms of Service - Accelerate Lab',
            'description' => 'Read the terms of service for Accelerate Lab. Understand the conditions that apply when using our digital services and website.',
        ]);
    }
}

