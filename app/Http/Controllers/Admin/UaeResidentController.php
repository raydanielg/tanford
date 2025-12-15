<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UaeResident;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class UaeResidentController extends Controller
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

        $residents = UaeResident::query()
            ->latest('created_at')
            ->get([
                'id',
                'name',
                'email',
                'phone',
                'city',
                'country',
                'nationality',
                'package',
                'status',
                'created_at',
            ]);

        return Inertia::render('Admin/UaeResidents', [
            'residents' => $residents,
        ]);
    }

    public function updateStatus(UaeResident $resident): RedirectResponse
    {
        $this->ensureAdmin();

        request()->validate([
            'status' => ['required', 'string', 'in:pending,approved,rejected'],
        ]);

        $resident->status = request('status');
        $resident->save();

        return back();
    }
}
