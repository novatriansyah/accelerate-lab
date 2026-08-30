<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Demo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DemoController extends Controller
{
    protected function isUnlocked(Demo $demo, Request $request): bool
    {
        if (!$demo->isPasscodeProtected()) {
            return true;
        }

        return $request->session()->get('demo_unlocked_' . $demo->id) === true;
    }

    public function showcase(string $slug, Request $request)
    {
        $demo = Demo::where('slug', $slug)->where('is_active', true)->firstOrFail();

        if (!$this->isUnlocked($demo, $request)) {
            return view('frontend.demos.passcode', compact('demo'));
        }

        return view('frontend.demos.showcase', compact('demo'));
    }

    public function preview(string $slug, Request $request)
    {
        $demo = Demo::where('slug', $slug)->where('is_active', true)->firstOrFail();

        if (!$this->isUnlocked($demo, $request)) {
            return redirect()->route('demos.showcase', $demo->slug);
        }

        return response($demo->getProcessedHtmlContent(), 200, [
            'Content-Type' => 'text/html; charset=UTF-8',
        ]);
    }

    public function verifyPasscode(string $slug, Request $request)
    {
        $demo = Demo::where('slug', $slug)->where('is_active', true)->firstOrFail();

        $request->validate([
            'passcode' => ['required', 'string'],
        ]);

        if (!$demo->verifyPasscode($request->input('passcode'))) {
            return back()->withErrors(['passcode' => __('Invalid access passcode. Please try again.')]);
        }

        $request->session()->put('demo_unlocked_' . $demo->id, true);

        return redirect()->route('demos.showcase', $demo->slug);
    }
}
