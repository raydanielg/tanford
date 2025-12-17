<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ForumRegistration;
use App\Exports\ForumRegistrationsExport;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
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

    public function export(Request $request)
    {
        $this->ensureAdmin();

        $data = $request->validate([
            'ids' => ['required', 'array'],
            'ids.*' => ['integer'],
            'format' => ['required', 'string', 'in:pdf,excel'],
        ]);

        $ids = $data['ids'];

        if ($data['format'] === 'excel') {
            return Excel::download(new ForumRegistrationsExport($ids), 'forum-registrations.xlsx');
        }

        $registrations = ForumRegistration::query()
            ->whereIn('id', $ids)
            ->orderByDesc('created_at')
            ->get([
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

        $html = view('exports.forum_registrations_pdf', [
            'registrations' => $registrations,
        ])->render();

        return Pdf::loadHTML($html)->download('forum-registrations.pdf');
    }
}
