<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('sort_order')
            ->orderByDesc('featured')
            ->orderByDesc('id')
            ->get();

        $editProject = null;

        if (request('edit')) {
            $editProject = Project::find(request('edit'));
        }

        return view('admin.projects.index', compact(
            'projects',
            'editProject'
        ));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'max:255'
            ],

            'description' => [
                'nullable',
                'string',
                'max:5000'
            ],

            'technologies' => [
                'nullable',
                'string',
                'max:1000'
            ],

            'github_url' => [
                'nullable',
                'url',
                'max:1000'
            ],

            'live_url' => [
                'nullable',
                'url',
                'max:1000'
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120'
            ],

            'sort_order' => [
                'nullable',
                'integer',
                'min:0'
            ],
        ]);


        $validated['featured'] =
            $request->boolean('featured');

        $validated['sort_order'] =
            $validated['sort_order'] ?? 0;


        if ($request->hasFile('image')) {

            $validated['image'] = $request
                ->file('image')
                ->store('projects', 'public');
        }


        Project::create($validated);


        return redirect()
            ->route('admin.projects.index')
            ->with(
                'success',
                'Project added successfully.'
            );
    }


    public function update(
        Request $request,
        Project $project
    ) {
        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'max:255'
            ],

            'description' => [
                'nullable',
                'string',
                'max:5000'
            ],

            'technologies' => [
                'nullable',
                'string',
                'max:1000'
            ],

            'github_url' => [
                'nullable',
                'url',
                'max:1000'
            ],

            'live_url' => [
                'nullable',
                'url',
                'max:1000'
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120'
            ],

            'sort_order' => [
                'nullable',
                'integer',
                'min:0'
            ],
        ]);


        $validated['featured'] =
            $request->boolean('featured');

        $validated['sort_order'] =
            $validated['sort_order'] ?? 0;


        if ($request->hasFile('image')) {

            if ($project->image) {

                Storage::disk('public')
                    ->delete($project->image);
            }

            $validated['image'] = $request
                ->file('image')
                ->store('projects', 'public');
        }


        $project->update($validated);


        return redirect()
            ->route('admin.projects.index')
            ->with(
                'success',
                'Project updated successfully.'
            );
    }


    public function destroy(Project $project)
    {
        if ($project->image) {

            Storage::disk('public')
                ->delete($project->image);
        }

        $project->delete();


        return redirect()
            ->route('admin.projects.index')
            ->with(
                'success',
                'Project deleted successfully.'
            );
    }
}