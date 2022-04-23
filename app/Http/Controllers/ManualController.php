<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Manual;
use Gate;

class ManualController extends Controller
{
    public function index()
    {
        $manuals = Manual::orderBy('id')->paginate(6);
        return view('manuals.index', compact('manuals'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:3',
            'dad' => 'required',
            'section' => 'required',
            'year' => 'required',
            'reason' => 'required',
        ]);

        $mark = Manual::create([
            'name' => $request->name,
            'year' => $request->year,
            'dad' => $request->dad,
            'section' => $request->section,
            'reason' => $request->reason,
            'user_id'=> Auth::user()->id,
        ]);
        toast('Your Manual was Added successfully !', 'success');
        return redirect(route('manuals.index'));
    }

    public function create()
    {
        return view('manuals.create');
    }

    public function show(Manual $manual)
    {
        return view('manuals.show', compact('manual'));
    }

    public function edit(Manual $manual)
    {
        return view('manuals.edit', compact('manual'));
    }


    public function update(Request $request, Manual $manual)
    {
        $vali = $request->validate([
            'name' => 'required|min:3',
        ]);

        $data = $request->only(['name']);
        $manual->update($data);
        toast('Your manual was Updated successfully !', 'success');
        return redirect(route('manuals.index'));
    }

    public function destroy( Manual $manual)
    {
        $manual->delete();
        toast('Your manual was Deleted !', 'warning');
        return redirect(route('manuals.index'));
    }
}
