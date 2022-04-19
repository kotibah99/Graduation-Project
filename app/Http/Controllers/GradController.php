<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Grad;
use Gate;

class GradController extends Controller
{
    public function index()
    {
        $grads = Grad::orderBy('id')->paginate(6);
        return view('grads.index', compact('grads'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:3',
            'section' => 'required',
            'uniId' => 'required',
            'season' => 'required',

        ]);

        $grad = Grad::create([
            'name' => $request->name,
            'section' => $request->section,
            'uniId' => $request->uniId,
            'season' => $request->season,
        ]);
        toast('Your Grad was Added successfully !', 'success');
        return redirect(route('grads.index'));
    }

    public function create()
    {
        return view('grads.create');
    }

    public function show(Grad $grad)
    {
        return view('grads.show', compact('grad'));
    }

    public function edit(Grad $grad)
    {
        return view('grads.edit', compact('grad'));
    }


    public function update(Request $request, Grad $grad)
    {
        $vali = $request->validate([
            'name' => 'required|min:3',
        ]);

        $data = $request->only(['name']);
        $grad->update($data);
        toast('Your grad was Updated successfully !', 'success');
        return redirect(route('grads.index'));
    }

    public function destroy( Grad $grad)
    {
        $grad->delete();
        toast('Your grad was Deleted !', 'warning');
        return redirect(route('grads.index'));
    }
}
