<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;

class ServicePageController extends Controller
{
    protected $servicePageTitles = [
        'web-development' => 'Accelerate Lab - Web Application Development',
        'mobile-development' => 'Accelerate Lab Mobile Dev',
        'cloud-architecture' => 'Accelerate Lab - Cloud Architecture',
        'ui-ux-design' => 'Accelerate Lab - UI/UX Design',
    ];

    public function show($slug)
    {
        $service = Service::where('slug', $slug)
            ->where('has_custom_page', true)
            ->firstOrFail();
        $title = $this->servicePageTitles[$slug] ?? $service->title;

        if (!view()->exists("frontend.pages.{$slug}")) {
            abort(404);
        }

        return view("frontend.pages.{$slug}", compact('service', 'title'));
    }
}
