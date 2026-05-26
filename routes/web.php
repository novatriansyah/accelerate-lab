<?php

use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\ProjectController;
use App\Http\Controllers\Frontend\SitemapController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/sitemap.xml', [SitemapController::class, 'index']);
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/services/{service:slug}', [PageController::class, 'service'])->name('service');
Route::get('/case-studies', [ProjectController::class, 'index'])->name('case-studies');
Route::get('/case-studies/{project:slug}', [ProjectController::class, 'show'])->name('project');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{article:slug}', [BlogController::class, 'show'])->name('article');
Route::get('/careers', [PageController::class, 'careers'])->name('careers');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

Route::post('/contact', [ContactController::class, 'store'])->middleware('throttle:5,1')->name('contact.store');

Route::get('/the-lab', fn () => redirect('/blog', 301));
Route::get('/privacy-policy', [PageController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/terms-of-service', [PageController::class, 'termsOfService'])->name('terms-of-service');

Route::get('/robots.txt', [\App\Http\Controllers\Frontend\RobotsController::class, 'index']);

// Fallback route to serve storage files without symlinks (secured against path traversal)
Route::get('/storage/{path}', function (string $path) {
    $basePath = storage_path('app/public');
    $filePath = $basePath . '/' . $path;
    $realPath = realpath($filePath);

    if ($realPath === false || !str_starts_with($realPath, realpath($basePath))) {
        abort(403);
    }

    if (!file_exists($realPath)) {
        abort(404);
    }

    return response()->file($realPath);
})->where('path', '.*');


