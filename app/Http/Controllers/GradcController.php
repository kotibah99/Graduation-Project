<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Gradc;
use Gate;

class GradcController extends Controller
{
    public function index()
    {
        $gradcs = Gradc::orderBy('id')->paginate(6);
        return view('gradcs.index', compact('gradcs'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:3',
            'section' => 'required',
            'uniId' => 'required',
            'items' => 'required',
        ]);

        $gradc = Gradc::create([
            'name' => $request->name,
            'section' => $request->section,
            'uniId' => $request->uniId,
            'items' => $request->items,
            'user_id'=> Auth::user()->id,
        ]);
        toast('Your Gradc was Added successfully !', 'success');
        return redirect(route('gradcs.index'));
    }

    public function create()
    {
        return view('gradcs.create');
    }

    public function show(Gradc $gradc)
    {
        return view('gradcs.show', compact('gradc'));
    }

    public function edit(Gradc $gradc)
    {
        return view('gradcs.edit', compact('gradc'));
    }


    public function update(Request $request, Gradc $gradc)
    {
        $vali = $request->validate([
            'name' => 'required|min:3',
        ]);

        $data = $request->only(['name']);
        $gradc->update($data);
        toast('Your gradc was Updated successfully !', 'success');
        return redirect(route('gradcs.index'));
    }

    public function destroy( Gradc $gradc)
    {
        $gradc->delete();
        toast('Your gradc was Deleted !', 'warning');
        return redirect(route('gradcs.index'));
    }
}
