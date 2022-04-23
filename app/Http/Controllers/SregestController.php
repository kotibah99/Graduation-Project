<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Sregest;
use Gate;

class SregestController extends Controller
{
    public function index()
    {
        $sregests = Sregest::orderBy('id')->paginate(6);
        return view('sregests.index', compact('sregests'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:3',
            'dad' => 'required',
            'section' => 'required',
            'year' => 'required',
            'uniId' => 'required',
            'date' => 'required',
            'nation' => 'required',
            'pId' => 'required',
            'stopseason' => 'required',
        ]);

        $mark = Sregest::create([
            'name' => $request->name,
            'dad' => $request->dad,
            'section' => $request->section,
            'year' => $request->year,
            'uniId' => $request->uniId,
            'date' => $request->date,
            'nation' => $request->nation,
            'pId' => $request->pId,
            'stopseason' => $request->stopseason,
            'user_id'=> Auth::user()->id,
        ]);
        toast('Your Sregest was Added successfully !', 'success');
        return redirect(route('sregests.index'));
    }

    public function create()
    {
        return view('sregests.create');
    }

    public function show(Sregest $sregest)
    {
        return view('sregests.show', compact('sregest'));
    }

    public function edit(Sregest $sregest)
    {
        return view('sregests.edit', compact('sregest'));
    }


    public function update(Request $request, Sregest $sregest)
    {
        $vali = $request->validate([
            'name' => 'required|min:3',
        ]);

        $data = $request->only(['name']);
        $sregest->update($data);
        toast('Your sregest was Updated successfully !', 'success');
        return redirect(route('sregests.index'));
    }

    public function destroy( Sregest $sregest)
    {
        $sregest->delete();
        toast('Your sregest was Deleted !', 'warning');
        return redirect(route('sregests.index'));
    }
}
