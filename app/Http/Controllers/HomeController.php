<?php

namespace App\Http\Controllers;


use App\Task;
use App\User;

class HomeController extends Controller
{
    public function index()
    {
        return view("home");
    }

    public function dashboard()
    {
        $users_count = User::count();
        $tasks_count = Task::count();
        $archived_tasks_count = Task::where('archived', 1)->count();
        $unarchived_tasks_count = Task::where('archived', 0)->count();
        $new_tasks = Task::orderBy('created', 'desc')->take(10)->get();
        
        return view('admin.index', compact('users_count', 'tasks_count', 'archived_tasks_count', 'unarchived_tasks_count', 'new_tasks'));
    }
}
