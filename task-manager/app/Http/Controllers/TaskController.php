<?php
namespace App\Http\Controllers;
use App\Models\task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        return view('tasks.add');
    } 
    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'status' => 'required|in:pending,completed',
        ]);

        // Create a new task associated with the authenticated user
        task::create([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? '',
            'status' => $validated['status'],
            'user_id' => Auth::id(),
        ]);

        // Redirect to a specific page with a success message
        // return redirect()->route('home')->with('success', 'Task added successfully!');            
        // return response()->json(['message' => 'Task added successfully!'], 201);
        return redirect()->back()->with('success', 'Task added successfully!');     
    }
    public function display()
    {
        $tasks = task::where('user_id', Auth::id())->get(); 
        return view('tasks.view', compact('tasks'));
    }
    public function destroy(task $id)
    {
        $id->delete();
        return redirect()->back()->with('success', 'Task deleted successfully.');
    }
    public function edit(Request $request, $id)
    {
        $task = task::findOrFail($id);
        return view('tasks.add', compact('task'));
    }
    public function update(Request $request, task $id)
    {
        // Validate the request data
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'status' => 'required|in:pending,completed',
        ]);

        // Update the task with the validated data
        $id->update([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? '',
            'status' => $validated['status'],
            'user_id' => Auth::id(),
        ]);
        // Redirect to a specific page with a success message
        return redirect()->route('tasks.list')->with('success', 'Task updated successfully!');
    }
}   
