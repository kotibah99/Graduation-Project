<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\second;
use Gate;

class secondController extends Controller
{
    public function index()
    {
        $seconds = second::orderBy('id')->paginate(6);
        return view('seconds.index', compact('seconds'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:3',
            'year' => 'required',
            'section' => 'required',
            'uniId' => 'required',
            'dad' => 'required',
        ]);

        $mark = Second::create([
            'name' => $request->name,
            'year' => $request->year,
            'dad' => $request->dad,
            'section' => $request->section,
            'uniId' => $request->uniId,
            'user_id'=> Auth::user()->id,
        ]);
        toast('Your second was Added successfully !', 'success');
        return redirect(route('seconds.index'));
    }

    public function create()
    {
        return view('seconds.create');
    }

    public function show(second $second)
    {
        return view('seconds.show', compact('second'));
    }

    public function edit(second $second)
    {
        return view('seconds.edit', compact('second'));
    }


    public function update(Request $request, second $second)
    {
        $vali = $request->validate([
            'name' => 'required|min:3',
        ]);

        $data = $request->only(['name']);
        $second->update($data);
        toast('Your second was Updated successfully !', 'success');
        return redirect(route('seconds.index'));
    }

    public function destroy( second $second)
    {
        $second->delete();
        toast('Your second was Deleted !', 'warning');
        return redirect(route('seconds.index'));
    }
}
