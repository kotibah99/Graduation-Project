<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Unilife;
use Gate;

class UnilifeController extends Controller
{
    public function index()
    {
        $unilives = Unilife::orderBy('id')->paginate(6);
        return view('unilives.index', compact('unilives'));
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

        $unilife = Unilife::create([
            'name' => $request->name,
            'year' => $request->year,
            'section' => $request->section,
            'uniId' => $request->uniId,
            'dad' => $request->dad,
            'user_id'=> Auth::user()->id,
        ]);
        toast('Your Unilife was Added successfully !', 'success');
        return redirect(route('unilives.index'));
    }

    public function create()
    {
        return view('unilives.create');
    }

    public function show(Unilife $unilife)
    {
        return view('unilives.show', compact('unilife'));
    }

    public function edit(Unilife $unilife)
    {
        return view('unilives.edit', compact('unilife'));
    }


    public function update(Request $request, Unilife $unilife)
    {
        $vali = $request->validate([
            'name' => 'required|min:3',
        ]);

        $data = $request->only(['name']);
        $unilife->update($data);
        toast('Your unilife was Updated successfully !', 'success');
        return redirect(route('unilives.index'));
    }

    public function destroy( Unilife $unilife)
    {
        $unilife->delete();
        toast('Your unilife was Deleted !', 'warning');
        return redirect(route('unilives.index'));
    }
}
