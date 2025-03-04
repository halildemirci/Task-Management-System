<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('tasks')->paginate(5);

        if (request()->expectsJson()) {
            return response()->json($users);
        }

        return view('users.index', compact('users'));
    }

    public function profile($id)
    {
        $tasks = Task::where('user_id', $id)->paginate(5);

        if (request()->expectsJson()) {
            return response()->json($tasks);
        }

        return view('users.profile', compact('tasks'));
    }
}
