<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ForumRegistration;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class ForumRegistrationController extends Controller
{
    protected function ensureAdmin(): void
    {
        $user = Auth::user();

        if (! $user || $user->role !== 'admin') {
            abort(403);
        }
    }

    public function index(): Response
    {
        $this->ensureAdmin();

        $registrations = ForumRegistration::query()
            ->latest('created_at')
            ->get([
                'id',
                'forum_name',
                'name',
                'email',
                'phone',
                'organization',
                'attendee_type',
                'booth',
                'sponsorship_package',
                'status',
                'created_at',
            ]);

        return Inertia::render('Admin/ForumRegistrations', [
            'registrations' => $registrations,
        ]);
    }

    public function show(ForumRegistration $registration): Response
    {
        $this->ensureAdmin();

        $registration->refresh();

        return Inertia::render('Admin/ForumRegistrationShow', [
            'registration' => $registration,
        ]);
    }

    public function updateStatus(ForumRegistration $registration): RedirectResponse
    {
        $this->ensureAdmin();

        request()->validate([
            'status' => ['required', 'string', 'in:pending,approved,rejected'],
        ]);

        $registration->status = request('status');
        $registration->save();

        return back();
    }
}
