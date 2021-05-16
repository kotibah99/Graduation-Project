<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Project;
use Gate;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('id')->paginate(6);
        return view('projects.index', compact('projects'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:3',
            'num' => 'required',
            'site' => 'required',
        ]);

        $project = Project::create([
            'name' => $request->name,
            'num' => $request->num,
            'site' => $request->site,
        ]);
        toast('Your Project was Added successfully !', 'success');
        return redirect(route('projects.index'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }


    public function update(Request $request, Project $project)
    {
        $vali = $request->validate([
            'name' => 'required|min:3',
            'num' => 'required',
            'site' => 'required',
        ]);

        $data = $request->only(['name','num','site']);
        $project->update($data);
        toast('Your project was Updated successfully !', 'success');
        return redirect(route('projects.index'));
    }

    public function destroy( Project $project)
    {
        $project->delete();
        toast('Your project was Deleted !', 'warning');
        return redirect(route('projects.index'));
    }
}
