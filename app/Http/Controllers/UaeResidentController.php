<?php

namespace App\Http\Controllers;

use App\Models\UaeResident;
use App\Mail\UaeResidentNotification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UaeResidentController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'attendee_type' => ['nullable', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
            'city' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'nationality' => ['required', 'string', 'max:255'],
            'passport_number' => ['required', 'string', 'max:255'],
            'emirates_id' => ['required', 'string', 'max:255'],
            'job_title' => ['required', 'string', 'max:255'],
            'organization' => ['nullable', 'string', 'max:255'],
            'website' => ['nullable', 'string', 'max:255'],
            'attendance_days' => ['nullable', 'array'],
            'attendance_days.*' => ['string', 'max:50'],
            'package' => ['required', 'string', 'max:255'],
            'agree_terms' => ['required', 'boolean'],
        ]);

        $payload = $data;
        $payload['attendance_days'] = $data['attendance_days'] ?? [];
        $payload['status'] = 'pending';

        $resident = UaeResident::create($payload);

        Mail::to(config('mail.notification_email', 'Forum@tanforduae.com'))
            ->send(new UaeResidentNotification($resident));

        return back()->with('success', 'Thank you for registering as a UAE resident attendee.');
    }
}
