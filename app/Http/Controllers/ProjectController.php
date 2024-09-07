<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function createProject(Request $project)
    {
        $incomingData = $project->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $incomingData['name'] = strip_tags($incomingData['name']);
        $incomingData['description'] = strip_tags($incomingData['description']);
        $incomingData['user_id'] = auth()->id();
        $project = Project::create($incomingData);
        return redirect('/')->with('success', 'Project created successfully!');
    }

    public function showCreateProjectForm()
    {
        return view('projects/create-project');
    }
}
