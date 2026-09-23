<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Skill;
use App\Models\Education;
use App\Models\Project;
use App\Models\SocialLink;

class PortfolioController extends Controller
{
    public function index()
    {
        $profile = Profile::first();

        $skills = Skill::orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $education = Education::orderBy('sort_order')
            ->orderByDesc('end_year')
            ->get();

        $projects = Project::orderByDesc('featured')
            ->orderBy('sort_order')
            ->orderByDesc('id')
            ->get();

        $socialLinks = SocialLink::orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view(
            'welcome',
            compact(
                'profile',
                'skills',
                'education',
                'projects',
                'socialLinks'
            )
        );
    }
}