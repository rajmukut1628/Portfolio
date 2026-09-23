<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        $education = Education::orderBy('sort_order')
            ->orderByDesc('end_year')
            ->get();

        $editEducation = null;

        if (request('edit')) {
            $editEducation = Education::find(request('edit'));
        }

        return view('admin.education.index', compact(
            'education',
            'editEducation'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'degree' => ['required', 'string', 'max:255'],
            'institution' => ['required', 'string', 'max:255'],
            'field_of_study' => ['nullable', 'string', 'max:255'],
            'start_year' => ['nullable', 'string', 'max:20'],
            'end_year' => ['nullable', 'string', 'max:20'],
            'location' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:2000'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        Education::create($validated);

        return redirect()
            ->route('admin.education.index')
            ->with('success', 'Education added successfully.');
    }

    public function update(Request $request, Education $education)
    {
        $validated = $request->validate([
            'degree' => ['required', 'string', 'max:255'],
            'institution' => ['required', 'string', 'max:255'],
            'field_of_study' => ['nullable', 'string', 'max:255'],
            'start_year' => ['nullable', 'string', 'max:20'],
            'end_year' => ['nullable', 'string', 'max:20'],
            'location' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:2000'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        $education->update($validated);

        return redirect()
            ->route('admin.education.index')
            ->with('success', 'Education updated successfully.');
    }

    public function destroy(Education $education)
    {
        $education->delete();

        return redirect()
            ->route('admin.education.index')
            ->with('success', 'Education deleted successfully.');
    }
}