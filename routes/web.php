<?php

use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/services/{service:slug}', [PageController::class, 'service'])->name('service');
Route::get('/case-studies', [PageController::class, 'caseStudies'])->name('case-studies');
Route::get('/case-studies/{project:slug}', [PageController::class, 'project'])->name('project');
Route::get('/blog', [PageController::class, 'blog'])->name('blog');
Route::get('/blog/{article:slug}', [PageController::class, 'article'])->name('article');
Route::get('/careers', [PageController::class, 'careers'])->name('careers');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Legacy/Static Routes - Kept for reference or redirection if needed
Route::get('/the-lab', function () {
    return view('frontend.pages.the-lab', ['title' => 'The Lab - Accelerate Lab']);
});
Route::get('/web-development', function () {
    return view('frontend.pages.web-development', ['title' => 'Accelerate Lab - Web Application Development']);
});
Route::get('/mobile-development', function () {
    return view('frontend.pages.mobile-development', ['title' => 'Accelerate Lab Mobile Dev']);
});
Route::get('/cloud-architecture', function () {
    return view('frontend.pages.cloud-architecture', ['title' => 'Accelerate Lab - Cloud Architecture']);
});
Route::get('/ui-ux-design', function () {
    return view('frontend.pages.ui-ux-design', ['title' => 'Accelerate Lab - UI/UX Design']);
});


Route::get('/privacy-policy', function () {
    return view('frontend.pages.privacy-policy', ['title' => 'Accelerate Lab - Privacy Policy']);
});

Route::get('/terms-of-service', function () {
    return view('frontend.pages.terms-of-service', ['title' => 'Accelerate Lab - Terms of Service']);
});
