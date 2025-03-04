<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $tasks = Task::paginate(5);

        if ($request->expectsJson()) {
            return response()->json($tasks);
        }

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $users = User::pluck('name', 'id');
        return view('tasks.create', compact('users'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'user_id' => 'required'
            ], [
                'name.required' => 'The name field is required.',
                'description.required' => 'The description field is required.',
                'user_id.required' => 'The user field is required.'
            ]);

            Task::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'user_id' => $request->input('user_id')
            ]);

            if ($request->expectsJson()) {
                return response()->json(['success' => true, 'message' => 'Task created successfully.']);
            }

            return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
        } catch (\Throwable $th) {
            if ($request->expectsJson()) {
                return response()->json(['error' => $th->getMessage()]);
            }

            return back()->with('error', $th->getMessage());
        }
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }

    public function update($id)
    {
        $task = Task::findOrFail($id);
        $task->name = request('name');
        $task->description = request('description');
        $task->save();

        if (request()->expectsJson()) {
            return response()->json(['success' => true, 'message' => 'Task updated successfully.']);
        }

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function taskCompleted($id)
    {
        $task = Task::findOrFail($id);
        $task->status = 'completed';
        $task->save();

        return response()->json(['success' => true, 'message' => 'Task completed successfully.']);
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return response()->json(['success' => true, 'message' => 'Task deleted successfully.']);
    }
}
