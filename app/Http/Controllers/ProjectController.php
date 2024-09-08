<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function createProject(Request $project)
    {
        $incomingData = $project->validate([
            'name' => 'required',
            'description' => 'required',
            'due_date' => ['nullable', 'date'],
            'category_id' => ['nullable', 'exists:categories,id'],
        ]);

        $incomingData['name'] = strip_tags($incomingData['name']);
        $incomingData['description'] = strip_tags($incomingData['description']);
        $incomingData['due_date'] = $incomingData['due_date'] ?? null;
        $incomingData['category_id'] = $incomingData['category_id'] ?? null;
        $incomingData['user_id'] = auth()->id();
        $project = Project::create($incomingData);
        return view('projects/list-projects')->with('success', 'Project created successfully!');
    }

    public function showCreateProjectForm()
    {
        $categories = Category::all();
        return view('projects/create-project', compact('categories'));
    }

    public function listProjects()
    {
        return 'view projects';
    }
}
