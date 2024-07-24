<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class PageController extends Controller
{
    public function index()
    {
        $projects = Project::where('status', 'Completed')->get();
        return view('guest.index', compact('projects'));
    }

    public function show(Project $project)
    {
        return view('guest.show', compact('project'));
    }
}
