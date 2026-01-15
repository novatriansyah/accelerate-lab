<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RobotsController extends Controller
{
    public function index()
    {
        $content = "User-agent: *\n";
        $content .= "Disallow: /admin\n";
        $content .= "Disallow: /nova\n";
        $content .= "Allow: /\n";
        $content .= "Sitemap: " . url('sitemap.xml');

        return response($content, 200)
            ->header('Content-Type', 'text/plain');
    }
}
