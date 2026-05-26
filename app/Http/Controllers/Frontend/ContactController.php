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
        $validated = $request->validated();

        $lead = Lead::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'company' => $validated['company'] ?? null,
            'phone' => $validated['phone'] ?? null,
            'message' => $validated['message'] ?? null,
            'status' => 'new',
            'source' => 'Web Form',
        ]);

        // Send Notification to Admin
        $admin = User::where('email', 'admin@accelerate.lab')->first();

        if ($admin) {
            $admin->notify(new LeadNotification($lead));
        }

        return redirect()->back()->with('success', 'Thank you! We have received your message and will be in touch shortly.');
    }
}

