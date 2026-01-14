<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Project;
use App\Models\Service;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SitemapController extends Controller
{
    public function index()
    {
        $sitemap = Sitemap::create()
            ->add(Url::create('/'))
            ->add(Url::create('/about'))
            ->add(Url::create('/services'))
            ->add(Url::create('/case-studies'))
            ->add(Url::create('/blog'))
            ->add(Url::create('/careers'))
            ->add(Url::create('/contact'));

        // Services
        Service::all()->each(function (Service $service) use ($sitemap) {
            $sitemap->add(Url::create("/services/{$service->slug}"));
        });

        // Projects
        Project::all()->each(function (Project $project) use ($sitemap) {
            $sitemap->add(Url::create("/case-studies/{$project->slug}"));
        });

        // Articles
        Article::where('published_at', '<=', now())->get()->each(function (Article $article) use ($sitemap) {
             $sitemap->add(Url::create("/blog/{$article->slug}"));
        });

        return $sitemap->toResponse(request());
    }
}
