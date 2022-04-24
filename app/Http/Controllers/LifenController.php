<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Lifen;
use Gate;

class LifenController extends Controller
{
    public function index()
    {
        $lifens = Lifen::orderBy('id')->paginate(6);
        return view('lifens.index', compact('lifens'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:3',
            'year' => 'required',
            'section' => 'required',
            'uniId' => 'required',
            'dad' => 'required',
            'firstreg' => 'required',
        ]);

        $unilife = Lifen::create([
            'name' => $request->name,
            'year' => $request->year,
            'section' => $request->section,
            'uniId' => $request->uniId,
            'dad' => $request->dad,
            'firstreg' => $request->firstreg,
            'user_id'=> Auth::user()->id,
        ]);
        toast('Your Lifen was Added successfully !', 'success');
        return redirect(route('lifens.index'));
    }

    public function create()
    {
        return view('lifens.create');
    }

    public function show(Lifen $lifen)
    {
        return view('lifens.show', compact('lifen'));
    }

    public function edit(Lifen $lifen)
    {
        return view('lifens.edit', compact('lifen'));
    }


    public function update(Request $request, Lifen $lifen)
    {
        $vali = $request->validate([
            'name' => 'required|min:3',
        ]);

        $data = $request->only(['name']);
        $lifen->update($data);
        toast('Your lifen was Updated successfully !', 'success');
        return redirect(route('lifens.index'));
    }

    public function destroy( Lifen $lifen)
    {
        $lifen->delete();
        toast('Your lifen was Deleted !', 'warning');
        return redirect(route('lifens.index'));
    }
}
