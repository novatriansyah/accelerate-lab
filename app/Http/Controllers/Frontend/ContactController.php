<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;
use App\Models\Lead;
use App\Models\User;
use App\Notifications\LeadNotification;

class ContactController extends Controller
{
    public function store(StoreContactRequest $request)
    {
        if (!empty($request->input('my_favorite_color'))) {
            return redirect()->back()->with('success', 'Thank you! We have received your message and will be in touch shortly.');
        }

        $validated = $request->validated();

        $scopingSummary = [];
        if (!empty($validated['service_interest'])) $scopingSummary[] = "Interest: " . $validated['service_interest'];
        if (!empty($validated['project_stage'])) $scopingSummary[] = "Stage: " . $validated['project_stage'];
        if (!empty($validated['timeline'])) $scopingSummary[] = "Timeline: " . $validated['timeline'];
        if (!empty($validated['tech_preference'])) $scopingSummary[] = "Tech Pref: " . $validated['tech_preference'];

        $formattedMessage = implode("\n", array_filter([
            !empty($scopingSummary) ? implode(" | ", $scopingSummary) : null,
            $validated['message'] ?? null,
        ]));

        $lead = Lead::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'company' => $validated['company'] ?? null,
            'phone' => $validated['phone'] ?? null,
            'message' => $formattedMessage ?: 'Inquiry received from website.',
            'status' => 'new',
            'source' => !empty($scopingSummary) ? 'Project Estimator Wizard' : 'Web Form',
        ]);

        // Send Notification to Admin
        $admin = User::where('email', 'nova@acceleratelab.id')->first()
            ?? User::where('email', 'admin@accelerate.lab')->first()
            ?? User::first();

        if ($admin) {
            $admin->notify(new LeadNotification($lead));
        }

        return redirect()->back()->with('success', 'Thank you! We have received your message and will be in touch shortly.');
    }
}

