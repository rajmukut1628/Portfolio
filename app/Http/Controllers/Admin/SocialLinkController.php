<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    public function index()
    {
        $socialLinks = SocialLink::orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $editSocial = null;

        if (request('edit')) {
            $editSocial = SocialLink::find(request('edit'));
        }

        return view('admin.socials.index', compact(
            'socialLinks',
            'editSocial'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'platform' => ['required', 'string', 'max:100'],
            'url' => ['required', 'url', 'max:1000'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        SocialLink::create($validated);

        return redirect()
            ->route('admin.socials.index')
            ->with('success', 'Social link added successfully.');
    }

    public function update(Request $request, SocialLink $socialLink)
    {
        $validated = $request->validate([
            'platform' => ['required', 'string', 'max:100'],
            'url' => ['required', 'url', 'max:1000'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        $socialLink->update($validated);

        return redirect()
            ->route('admin.socials.index')
            ->with('success', 'Social link updated successfully.');
    }

    public function destroy(SocialLink $socialLink)
    {
        $socialLink->delete();

        return redirect()
            ->route('admin.socials.index')
            ->with('success', 'Social link deleted successfully.');
    }
}