<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Primary;
use App\Secondary;
use Gate;

class PrimaryController extends Controller
{
    public function index()
    {
        $primaries = Primary::orderBy('id')->paginate(12);
        return view('primaries.index', compact('primaries'));
    }

    public function seconda(Primary $primary){
        $seconda = Secondary::where('id',$primary->id)->insert([
            ['name' => 'دور وزارة النفط في تأمين الوقود بشكل ودون انقطاع وبكافة الظروف ',
            'key' => 0.01558 ,
            'primary_id' => $primary->id],
            ['name' => 'دور وزارة المالية في تأمين الضمانات والإعفاءات اللازمة ',
            'key' => 0.012616 ,
            'primary_id' => $primary->id],
            ['name' => 'دور وزارة النفط في تأمين الوقود بشكل ودون انقطاع وبكافة الظروف',
            'key' => 0.00798 ,
            'primary_id' => $primary->id],
            ['name' => 'دور وزارة النفط في تأمين الوقود بشكل ودون انقطاع وبكافة الظروف',
            'key' => 0.012312 ,
            'primary_id' => $primary->id],
            ['name' => 'دور وزارة النفط في تأمين الوقود بشكل ودون انقطاع وبكافة الظروف',
            'key' => 0.008284 ,
            'primary_id' => $primary->id],
            ['name' => 'دور وزارة النفط في تأمين الوقود بشكل ودون انقطاع وبكافة الظروف',
            'key' => 0.006916 ,
            'primary_id' => $primary->id],
            ['name' => 'دور وزارة النفط في تأمين الوقود بشكل ودون انقطاع وبكافة الظروف',
            'key' => 0.162 ,
            'primary_id' => $primary->id]
        ]);
        return redirect(route('primaries.show',$primary));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:3',
            'key' => 'required',
            'project_id' => 'required',
        ]);

        $primary = Primary::create([
            'name' => $request->name,
            'key' => $request->key,
            'project_id' => $request->project_id,
        ]);
        toast('Your Primary key was Added successfully !', 'success');
        return redirect(route('projects.show' , $request->project_id));
    }

    // public function create()
    // {
    //     return view('primaries.create');
    // }

    public function show(Primary $primary)
    {
        $secondaries = $primary->secondaries;
        return view('primaries.show', compact('primary','secondaries'));
    }

    // public function edit(Primary $primary)
    // {
    //     return view('primaries.edit', compact('primary'));
    // }


    // public function update(Request $request, Primary $primary)
    // {
    //     $vali = $request->validate([
    //         'name' => 'required|min:3',
    //     ]);

    //     $data = $request->only(['name']);
    //     $primary->update($data);
    //     toast('Your primary was Updated successfully !', 'success');
    //     return redirect(route('primaries.index'));
    // }

    public function destroy( Primary $primary)
    {
        $primary->delete();
        toast('Your primary was Deleted !', 'warning');
        return redirect(route('primaries.index'));
    }
}
