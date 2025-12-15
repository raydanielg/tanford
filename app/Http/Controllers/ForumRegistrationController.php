<?php

namespace App\Http\Controllers;

use App\Models\ForumRegistration;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ForumRegistrationController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'forum_name' => ['required', 'string', 'max:255'],
            'attendee_type' => ['nullable', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'city' => ['nullable', 'string', 'max:255'],
            'country' => ['nullable', 'string', 'max:255'],
            'nationality' => ['nullable', 'string', 'max:255'],
            'organization' => ['nullable', 'string', 'max:255'],
            'contact_person' => ['nullable', 'string', 'max:255'],
            'job_title' => ['nullable', 'string', 'max:255'],
            'website' => ['nullable', 'string', 'max:255'],
            'contact_phone' => ['nullable', 'string', 'max:50'],
            'attendee_count' => ['nullable', 'integer', 'min:1'],
            'services' => ['nullable', 'array'],
            'services.*' => ['string', 'max:255'],
            'other_services' => ['nullable', 'string', 'max:255'],
            'attendance_days' => ['nullable', 'array'],
            'attendance_days.*' => ['string', 'max:50'],
            'booth' => ['nullable', 'string', 'max:50'],
            'sponsorship_package' => ['nullable', 'string', 'max:255'],
            'agree_terms' => ['required', 'boolean'],
        ]);

        $payload = $data;
        $payload['services'] = $data['services'] ?? [];
        $payload['attendance_days'] = $data['attendance_days'] ?? [];

        $data['status'] = 'pending';

        ForumRegistration::create($data);

        return back()->with('success', 'Thank you for registering for the forum.');
    }
}
