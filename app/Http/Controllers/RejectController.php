<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Reject;
use Gate;

class RejectController extends Controller
{
    public function index()
    {
        $rejects = Reject::orderBy('id')->paginate(6);
        return view('rejects.index', compact('rejects'));
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

        $mark = Reject::create([
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
        toast('Your Reject was Added successfully !', 'success');
        return redirect(route('rejects.index'));
    }

    public function create()
    {
        return view('rejects.create');
    }

    public function show(Reject $reject)
    {
        return view('rejects.show', compact('reject'));
    }

    public function edit(Reject $reject)
    {
        return view('rejects.edit', compact('reject'));
    }


    public function update(Request $request, Reject $reject)
    {
        $vali = $request->validate([
            'name' => 'required|min:3',
        ]);

        $data = $request->only(['name']);
        $reject->update($data);
        toast('Your reject was Updated successfully !', 'success');
        return redirect(route('rejects.index'));
    }

    public function destroy( Reject $reject)
    {
        $reject->delete();
        toast('Your reject was Deleted !', 'warning');
        return redirect(route('rejects.index'));
    }
}
