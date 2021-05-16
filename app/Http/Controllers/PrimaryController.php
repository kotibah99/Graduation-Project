<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Primary;
use Gate;

class PrimaryController extends Controller
{
    public function index()
    {
        $primaries = Primary::orderBy('id')->paginate(12);
        return view('primaries.index', compact('primaries'));
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
        return view('primaries.show', compact('primary'));
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
