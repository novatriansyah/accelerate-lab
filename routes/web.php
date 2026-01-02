<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/case-studies', [PageController::class, 'caseStudies'])->name('case-studies');

Route::get('/services', function () {
    return view('pages.services', ['title' => 'Accelerate Lab - Services']);
});

Route::get('/the-lab', function () {
    return view('pages.the-lab', ['title' => 'The Lab - Accelerate Lab']);
});

Route::get('/contact', function () {
    return view('pages.contact', ['title' => 'Contact Accelerate Lab']);
});
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/web-development', function () {
    return view('pages.web-development', ['title' => 'Accelerate Lab - Web Application Development']);
});

Route::get('/mobile-development', function () {
    return view('pages.mobile-development', ['title' => 'Accelerate Lab Mobile Dev']);
});

Route::get('/cloud-architecture', function () {
    return view('pages.cloud-architecture', ['title' => 'Accelerate Lab - Cloud Architecture']);
});

Route::get('/ui-ux-design', function () {
    return view('pages.ui-ux-design', ['title' => 'Accelerate Lab - UI/UX Design']);
});

Route::get('/about', function () {
    return view('pages.about', ['title' => 'Accelerate Lab - About Us']);
});

Route::get('/blog', function () {
    return view('pages.blog', ['title' => 'Accelerate Lab Blog']);
});

Route::get('/careers', function () {
    return view('pages.careers', ['title' => 'Accelerate Lab - Careers']);
});


Route::get('/privacy-policy', function () {
    return view('pages.privacy-policy', ['title' => 'Accelerate Lab - Privacy Policy']);
});

Route::get('/terms-of-service', function () {
    return view('pages.terms-of-service', ['title' => 'Accelerate Lab - Terms of Service']);
});
