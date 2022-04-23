<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Termen;
use Gate;

class TermenController extends Controller
{
    public function index()
    {
        $termens = Termen::orderBy('id')->paginate(6);
        return view('termens.index', compact('termens'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:3',
            'dad' => 'required',
            'birth' => 'required',
            'uniId' => 'required',
            'location' => 'required',
            'nation' => 'required',
            'year' => 'required',
            'date' => 'required',
            'why' => 'required',
            'pId' => 'required',
            'idCred' => 'required',
        ]);

        $termen = Termen::create([
            'name' => $request->name,
            'dad' => $request->dad,
            'birth' => $request->birth,
            'uniId' => $request->uniId,
            'location' => $request->location,
            'nation' => $request->nation,
            'year' => $request->year,
            'date' => $request->date,
            'why' => $request->why,
            'pId' => $request->pId,
            'idCred' => $request->idCred,
            'user_id'=> Auth::user()->id,
        ]);
        toast('Your Termen was Added successfully !', 'success');
        return redirect(route('termens.index'));
    }

    public function create()
    {
        return view('termens.create');
    }

    public function show(Termen $termen)
    {
        return view('termens.show', compact('termen'));
    }

    public function edit(Termen $termen)
    {
        return view('termens.edit', compact('termen'));
    }


    public function update(Request $request, Termen $termen)
    {
        $vali = $request->validate([
            'name' => 'required|min:3',
        ]);

        $data = $request->only(['name']);
        $termen->update($data);
        toast('Your termen was Updated successfully !', 'success');
        return redirect(route('termens.index'));
    }

    public function destroy( Termen $termen)
    {
        $termen->delete();
        toast('Your termen was Deleted !', 'warning');
        return redirect(route('termens.index'));
    }
}
