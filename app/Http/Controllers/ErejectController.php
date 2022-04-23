<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Ereject;
use Gate;

class ErejectController extends Controller
{
    public function index()
    {
        $erejects = Ereject::orderBy('id')->paginate(6);
        return view('erejects.index', compact('erejects'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:3',
            'uniId' => 'required',
            'section' => 'required',
            'year' => 'required',
            'item' => 'required',
            'ityear' => 'required',
            'itseason' => 'required',
            'ninstract' => 'required',
            'einstract' => 'required',
            'mark' => 'required',
        ]);

        $mark = Ereject::create([
            'name' => $request->name,
            'uniId' => $request->uniId,
            'section' => $request->section,
            'year' => $request->year,
            'item' => $request->item,
            'ityear' => $request->ityear,
            'itseason' => $request->itseason,
            'ninstract' => $request->ninstract,
            'einstract' => $request->einstract,
            'mark' => $request->mark,
            'user_id'=> Auth::user()->id,
        ]);
        toast('Your Ereject was Added successfully !', 'success');
        return redirect(route('erejects.index'));
    }

    public function create()
    {
        return view('erejects.create');
    }

    public function show(Ereject $ereject)
    {
        return view('erejects.show', compact('ereject'));
    }

    public function edit(Ereject $ereject)
    {
        return view('erejects.edit', compact('ereject'));
    }


    public function update(Request $request, Ereject $ereject)
    {
        $vali = $request->validate([
            'name' => 'required|min:3',
        ]);

        $data = $request->only(['name']);
        $ereject->update($data);
        toast('Your ereject was Updated successfully !', 'success');
        return redirect(route('erejects.index'));
    }

    public function destroy( Ereject $ereject)
    {
        $ereject->delete();
        toast('Your ereject was Deleted !', 'warning');
        return redirect(route('erejects.index'));
    }
}
