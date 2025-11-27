<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    public function createProject(Request $project)
    {

        $incomingData = $project->validate([
            'name' => 'required',
            'description' => 'required|string',
            'due_date' => ['nullable', 'date'],
            'category_id' => 'nullable|exists:categories,id',
            'tasks' => 'nullable|array', // Tasks (array)
            'tasks.*.title' => [
                Rule::requiredIf(function () use ($project) {
                    return !empty($project->tasks);
                }),
                'string',
                'max:255'
            ],
            'tasks.*.due_date' => 'nullable|date',
        ]);

        $incomingData['name'] = strip_tags($incomingData['name']);
        $incomingData['description'] = strip_tags($incomingData['description']);
        $incomingData['due_date'] = $incomingData['due_date'] ?? null;
        $incomingData['category_id'] = $incomingData['category_id'] ?? null;
        $incomingData['user_id'] = auth()->id();
        $project = Project::create($incomingData);



        if (!empty($incomingData['tasks'])) {
            foreach ($incomingData['tasks'] as $taskData) {
                Task::create([
                    'title' => strip_tags($taskData['title']),
                    'due_date' => $taskData['due_date'] ?? null,
                    'project_id' => $project->id,
                ]);
            }
        }

        return redirect()->route('projects.list')->with('success', 'Project created successfully!');
    }

    public function showCreateProjectForm()
    {
        $categories = Category::all();
        return view('projects.create-project', compact('categories'));
    }

    public function listProjects()
    {
        $projects = Project::where('user_id', auth()->id())->orderBy('created_at', 'desc')->paginate(10);
        return view('projects.list-projects', compact('projects'));
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.list')->with('success', 'Project deleted successfully.');
    }
}
