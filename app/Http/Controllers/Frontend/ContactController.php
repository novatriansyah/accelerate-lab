<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Lead;
use App\Models\User; // Import User model
use App\Notifications\LeadNotification; // Import Notification
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'company' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $lead = Lead::create([
            'name' => $request->name,
            'email' => $request->email,
            'company' => $request->company,
            'phone' => $request->phone,
            'message' => $request->message,
            'status' => 'new',
        ]);

        // Send Notification to Admin
        // Find the admin user (we created one earlier) or use a fallback email
        $admin = User::where('email', 'admin@accelerate.lab')->first();

        if ($admin) {
            $admin->notify(new LeadNotification($lead));
        }

        return redirect()->back()->with('success', 'Thank you! We have received your message and will be in touch shortly.');
    }
}
