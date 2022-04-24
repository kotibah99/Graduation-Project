<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Markn;
use Gate;

class MarknController extends Controller
{
    public function index()
    {
        $markns = Markn::orderBy('id')->paginate(6);
        return view('markns.index', compact('markns'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:3',
            'section' => 'required',
            'uniId' => 'required',
            'dad' => 'required',
            'mom' => 'required',
            'date' => 'required',
            'firstreg' => 'required',
        ]);

        $mark = Markn::create([
            'name' => $request->name,
            'dad' => $request->dad,
            'section' => $request->section,
            'uniId' => $request->uniId,
            'mom' => $request->mom,
            'firstreg' => $request->firstreg,
            'date' => $request->date,
            'user_id'=> Auth::user()->id,
        ]);
        toast('Your Markn was Added successfully !', 'success');
        return redirect(route('markns.index'));
    }

    public function create()
    {
        return view('markns.create');
    }

    public function show(Markn $markn)
    {
        return view('markns.show', compact('markn'));
    }

    public function edit(Markn $markn)
    {
        return view('markns.edit', compact('markn'));
    }


    public function update(Request $request, Markn $markn)
    {
        $vali = $request->validate([
            'name' => 'required|min:3',
        ]);

        $data = $request->only(['name']);
        $markn->update($data);
        toast('Your markn was Updated successfully !', 'success');
        return redirect(route('markns.index'));
    }

    public function destroy( Markn $markn)
    {
        $markn->delete();
        toast('Your markn was Deleted !', 'warning');
        return redirect(route('markns.index'));
    }
}
