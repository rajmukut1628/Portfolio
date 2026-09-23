<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        $profile = Profile::first();

        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $profile = Profile::first();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'title' => ['nullable', 'string', 'max:255'],
            'short_description' => ['nullable', 'string', 'max:1000'],
            'about' => ['nullable', 'string', 'max:5000'],

            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'location' => ['nullable', 'string', 'max:255'],
            'nationality' => ['nullable', 'string', 'max:255'],
            'languages' => ['nullable', 'string', 'max:255'],
            'availability' => ['nullable', 'string', 'max:255'],

            'photo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120'
            ],

            'cv' => [
                'nullable',
                'file',
                'mimes:pdf',
                'max:10240'
            ],
        ]);

        if (!$profile) {
            $profile = new Profile();
        }

        if ($request->hasFile('photo')) {

            if ($profile->photo) {
                Storage::disk('public')->delete($profile->photo);
            }

            $validated['photo'] = $request
                ->file('photo')
                ->store('profile', 'public');
        }

        if ($request->hasFile('cv')) {

            if ($profile->cv) {
                Storage::disk('public')->delete($profile->cv);
            }

            $validated['cv'] = $request
                ->file('cv')
                ->store('cv', 'public');
        }

        $profile->fill($validated);
        $profile->save();

        return redirect()
            ->route('admin.profile.edit')
            ->with('success', 'Profile updated successfully.');
    }
}