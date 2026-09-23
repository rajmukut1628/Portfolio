<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Models\Education;
use App\Models\Project;
use App\Models\SocialLink;
use App\Models\ContactMessage;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'skills' => Skill::count(),
            'education' => Education::count(),
            'projects' => Project::count(),
            'socials' => SocialLink::count(),
            'messages' => ContactMessage::count(),
            'unread_messages' => ContactMessage::where('is_read', false)->count(),
        ];

        $latestMessages = ContactMessage::latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'stats',
            'latestMessages'
        ));
    }
}