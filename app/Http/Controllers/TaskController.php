<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TaskStoreRequest;
use App\Task;
use App\Assignment;
use Carbon\Carbon;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $tasks = Task::where('user_id', $user->id)->get();

        return response()->json($tasks);
    }

    public function store(TaskStoreRequest $request)
    {
        $project = Project::findOrFail($request->input('project_id'));

        if ($project->deadline->gt(Carbon::now())) {
            $task = new Task($request->all());
            $task->save();

            return response()->json($task);
        } else {
            return response()->json(['error' => 'Project deadline reached']);
        }
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        $task->fill($request->all());
        $task->save();

        return response()->json($task);
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return response()->json([]);
    }

    public function assign(Request $request)
    {
        $task_id = $request->input('task_id');
        $user_id = $request->input('user_id');

        $task = Task::findOrFail($task_id);
        $task->user_id = $user_id;
        $task->save();

        $assignment = new Assignment($request->all());
        $assignment->save();

        return response()->json($task);
    }
}
