<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('task.index', compact('tasks'));
    }

    public function getData()
    {
        $data = Task::all();
        return response()->json($data);
    }

    public function create()
    {
        return view('task.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        Task::create([
            'title' => $request->title,
            'status' => 'not_started',
            'not_started_at' => now(),
        ]);

        return redirect('/tasks');
    }

    public function markAsPending(Task $task)
    {
        $task->status = 'pending';
        $task->pending_at = now();
        $task->save();

        return redirect()->back();
    }

    public function markAsFinished(Task $task)
    {
        $task->status = 'finished';
        $task->finished_at = now();
        $task->save();

        return redirect()->back();
    }

    public function markAsNotStarted(Task $task)
    {
        $task->status = 'started';
        $task->not_started_at = now();
        $task->save();

        return redirect()->back();
    }

    public function refreshFromPending(Task $task)
    {
        if ($task->status == 'pending') {
            $task->status = 'started';
            $task->not_started_at = now();
            $task->save();
        }

        return redirect()->back();
    }
}
