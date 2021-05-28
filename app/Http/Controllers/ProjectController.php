<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Project;
use App\Primary;
use Gate;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('id')->paginate(7);
        return view('projects.index', compact('projects'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:3',
            'num' => 'required',
            'site' => 'required',
        ]);

        $proj = Project::create([
            'name' => $request->name,
            'num' => $request->num,
            'site' => $request->site,
        ]);
        $project = Project::orderBy('id', 'DESC')->first();
        $prime = Primary::where('id',$project->id)->insert([
            ['name' => 'الجهات المعنية بالمشروع',
            'key' => 0.076 ,
            'project_id' => $project->id],
            ['name' => 'وثائق المشروع ',
            'key' => 0.210 ,
            'project_id' => $project->id],
            ['name' => 'الموقع الجغرافي ',
            'key' => 0.112 ,
            'project_id' => $project->id],
            ['name' => 'العوامل البيئية والمجتمعية للمشروع ',
            'key' => 0.116 ,
            'project_id' => $project->id],
            ['name' => 'المعيار الاقتصادي للمشروع',
            'key' => 0.184 ,
            'project_id' => $project->id],
            ['name' => 'المعيار الفني للمشروع ',
            'key' => 0.085 ,
            'project_id' => $project->id],
            ['name' => 'المعيار القانوني للمشروع ',
            'key' => 0.217 ,
            'project_id' => $project->id]
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
        $primaries = $project->primaries;
        // $primePercent = Secondary::where('primary_id',$secondary->primary_id)->pluck('percent')->sum();

        return view('projects.show', compact('project', 'primaries'));
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

    public function destroy(Project $project)
    {
        $project->delete();
        toast('Your project was Deleted !', 'warning');
        return redirect(route('projects.index'));
    }
}
