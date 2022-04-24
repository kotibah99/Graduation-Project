<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Attend;
use Gate;

class AttendController extends Controller
{
    public function index()
    {
        $attends = Attend::orderBy('id')->paginate(6);
        return view('attends.index', compact('attends'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:3',
            'dad' => 'required',
            'section' => 'required',
            'year' => 'required',
            'date' => 'required',
        ]);

        $attend = Attend::create([
            'name' => $request->name,
            'dad' => $request->dad,
            'section' => $request->section,
            'year' => $request->year,
            'date' => $request->date,
            'user_id'=> Auth::user()->id,
        ]);
        toast('Your Attend was Added successfully !', 'success');
        return redirect(route('attends.index'));
    }

    public function create()
    {
        return view('attends.create');
    }

    public function show(Attend $attend)
    {
        return view('attends.show', compact('attend'));
    }

    public function edit(Attend $attend)
    {
        return view('attends.edit', compact('attend'));
    }


    public function update(Request $request, Attend $attend)
    {
        $vali = $request->validate([
            'name' => 'required|min:3',
        ]);

        $data = $request->only(['name']);
        $attend->update($data);
        toast('Your attend was Updated successfully !', 'success');
        return redirect(route('attends.index'));
    }

    public function destroy( Attend $attend)
    {
        $attend->delete();
        toast('Your attend was Deleted !', 'warning');
        return redirect(route('attends.index'));
    }
}
