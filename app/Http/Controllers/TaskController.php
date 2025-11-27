<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    public function index(Project $project)
    {
        $tasks = $project->tasks()->orderBy('created_at', 'desc')->get();
        return view('tasks.list-tasks', compact('tasks', 'project'));
    }

    public function createTask(Project $project)
    {
        return view('tasks.create-task', compact('project'));
    }

    public function storeTask(Request $request, Project $project)
    {
        $incomingData = $request->validate([
            'description' => 'required',
            'due_date' => ['nullable', 'date'],
        ]);

        $incomingData['due_date'] = $incomingData['due_date'] ?? null;
        $incomingData['project_id'] = $project->id;
        Task::create($incomingData);

        return redirect()->route('tasks.index', $project)->with('success', 'Task created successfully!');
    }

    public function editTask(Project $project, Task $task)
    {
        return view('tasks.edit-task', compact('project', 'task'));
    }

    public function updateTask(Request $request, Project $project, Task $task)
    {
        $incomingData = $request->validate([
            'description' => 'required',
            'due_date' => ['nullable', 'date'],
        ]);

        $incomingData['description'] = strip_tags($incomingData['description']);
        $incomingData['due_date'] = $incomingData['due_date'] ?? null;
        $task->update($incomingData);

        return redirect()->route('tasks.index', $project)->with('success', 'Task updated successfully!');
    }

    public function destroyTask(Project $project, Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index', $project)->with('success', 'Task deleted successfully.');
    }

    public function archiveTask(Project $project, Task $task)
    {
        $task->update(['is_archived' => true]);
        return redirect()->route('tasks.index', $project)->with('success', 'Task archived successfully.');
    }

    public function completeTask(Project $project, Task $task)
    {
        $task->update(['is_completed' => true]);
        return redirect()->route('tasks.index', $project)->with('success', 'Task completed successfully.');
    }
}
