<?php

namespace App\Http\Controllers;

use App\Models\AndersenTask;
use Illuminate\Http\Request;

class AndersenTaskController extends Controller
{
    public function show()
    {
        return view('andersen-task', [
            'tasks' => AndersenTask::orderBy('created_date', 'DESC')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:andersen_tasks',
            'message' => 'required|min:6',
        ]);

        AndersenTask::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ]);

        return redirect()->back()
            ->with('success', 'AndersenTask created successfully!');
    }
}
