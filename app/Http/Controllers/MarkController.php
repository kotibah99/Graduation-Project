<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Mark;
use Gate;

class MarkController extends Controller
{
    public function index()
    {
        $marks = Mark::orderBy('id')->paginate(6);
        return view('marks.index', compact('marks'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:3',
            'year' => 'required',
            'section' => 'required',
            'uniId' => 'required',
            'dad' => 'required',
            'mom' => 'required',
            'date' => 'required',
            'ststatus' => 'required',
        ]);

        $mark = Mark::create([
            'name' => $request->name,
            'year' => $request->year,
            'dad' => $request->dad,
            'section' => $request->section,
            'uniId' => $request->uniId,
            'mom' => $request->mom,
            'ststatus' => $request->ststatus,
            'date' => $request->date,
            'user_id'=> Auth::user()->id,
        ]);
        toast('Your Mark was Added successfully !', 'success');
        return redirect(route('marks.index'));
    }

    public function create()
    {
        return view('marks.create');
    }

    public function show(Mark $mark)
    {
        return view('marks.show', compact('mark'));
    }

    public function edit(Mark $mark)
    {
        return view('marks.edit', compact('mark'));
    }


    public function update(Request $request, Mark $mark)
    {
        $vali = $request->validate([
            'name' => 'required|min:3',
        ]);

        $data = $request->only(['name']);
        $mark->update($data);
        toast('Your mark was Updated successfully !', 'success');
        return redirect(route('marks.index'));
    }

    public function destroy( Mark $mark)
    {
        $mark->delete();
        toast('Your mark was Deleted !', 'warning');
        return redirect(route('marks.index'));
    }
}
