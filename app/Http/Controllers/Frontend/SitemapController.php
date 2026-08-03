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
        $baseUrl = rtrim(config('app.url'), '/');

        $sitemap = Sitemap::create()
            ->add(Url::create($baseUrl . '/')->setPriority(1.0)->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY))
            ->add(Url::create($baseUrl . '/about')->setPriority(0.8)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY))
            ->add(Url::create($baseUrl . '/services')->setPriority(0.9)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY))
            ->add(Url::create($baseUrl . '/case-studies')->setPriority(0.8)->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY))
            ->add(Url::create($baseUrl . '/blog')->setPriority(0.8)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY))
            ->add(Url::create($baseUrl . '/careers')->setPriority(0.6)->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY))
            ->add(Url::create($baseUrl . '/contact')->setPriority(0.7)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY))
            ->add(Url::create($baseUrl . '/privacy-policy')->setPriority(0.3)->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY))
            ->add(Url::create($baseUrl . '/terms-of-service')->setPriority(0.3)->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY));

        // Services
        Service::all()->each(function (Service $service) use ($sitemap, $baseUrl) {
            $sitemap->add(
                Url::create("{$baseUrl}/services/{$service->slug}")
                    ->setPriority(0.7)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                    ->setLastModificationDate($service->updated_at)
            );
        });

        // Projects
        Project::all()->each(function (Project $project) use ($sitemap, $baseUrl) {
            $sitemap->add(
                Url::create("{$baseUrl}/case-studies/{$project->slug}")
                    ->setPriority(0.7)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                    ->setLastModificationDate($project->updated_at)
            );
        });

        // Articles
        Article::where('published_at', '<=', now())->get()->each(function (Article $article) use ($sitemap, $baseUrl) {
            $sitemap->add(
                Url::create("{$baseUrl}/blog/{$article->slug}")
                    ->setPriority(0.6)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                    ->setLastModificationDate($article->updated_at)
            );
        });

        return $sitemap->toResponse(request());
    }
}
