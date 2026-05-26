<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
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
            'title' => 'Insights & Innovation - Accelerate Lab Blog',
            'description' => 'Explore the latest articles on web technology, software engineering, cloud architecture, and digital product design from Accelerate Lab.',
            'featured' => $featured,
            'latest' => $latest,
        ]);
    }

    public function show(Article $article)
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
}
