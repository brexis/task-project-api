<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProjectStoreRequest;
use App\Project;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $projects = Project::where('user_id', $user->id)->with('tasks')->get();

        return response()->json($projects);
    }

    public function store(ProjectStoreRequest $request)
    {
        $user = $request->user();
        $project = new Project($request->all());
        $project->user_id = $user->id;
        $project->save();

        return response()->json($project);
    }

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $project->fill($request->all());
        $project->save();

        return response()->json($project);
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return response()->json([]);
    }
}
