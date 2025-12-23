<?php

namespace App\Http\Controllers;

use App\Models\TanfordMember;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class TanfordMemberController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'date' => ['nullable', 'date'],
            'nationality' => ['nullable', 'string', 'max:255'],
            'passport_or_id' => ['nullable', 'string', 'max:255'],
            'whatsapp' => ['nullable', 'string', 'max:50'],
            'email' => ['nullable', 'email', 'max:255'],
            'company_name' => ['nullable', 'string', 'max:255'],
            'country_of_registration' => ['nullable', 'string', 'max:255'],
            'business_location' => ['nullable', 'string', 'max:255'],
            'services' => ['nullable', 'array'],
            'services.*' => ['string', 'max:255'],
            'other_services' => ['nullable', 'string', 'max:255'],
            'registration_number' => ['nullable', 'string', 'max:255'],
            'tin' => ['nullable', 'string', 'max:255'],
            'willing_to_join' => ['required', 'boolean'],
            'reason' => ['nullable', 'string'],
            'agree_terms' => ['required', 'boolean'],
            'signature_name' => ['nullable', 'string', 'max:255'],
        ]);

        $data['services'] = $data['services'] ?? [];
        $data['status'] = 'pending';

        $member = TanfordMember::create($data);

        return back()
            ->with('success', 'Thank you for registering as a TANFORD member.')
            ->with('member_id', $member->id);
    }

    public function preview(TanfordMember $member): Response
    {
        return Inertia::render('TanfordMemberPreview', [
            'member' => $member,
        ]);
    }
}
