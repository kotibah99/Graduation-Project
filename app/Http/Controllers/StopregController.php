<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Stopreg;
use Gate;

class StopregController extends Controller
{
    public function index()
    {
        $stopregs = Stopreg::orderBy('id')->paginate(6);
        return view('stopregs.index', compact('stopregs'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:3',
            'description' => 'required',
        ]);

        $stopreg = Stopreg::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        toast('Your Stopreg was Added successfully !', 'success');
        return redirect(route('stopregs.index'));
    }

    public function create()
    {
        return view('stopregs.create');
    }

    public function show(Stopreg $stopreg)
    {
        return view('stopregs.show', compact('stopreg'));
    }

    public function edit(Stopreg $stopreg)
    {
        return view('stopregs.edit', compact('stopreg'));
    }


    public function update(Request $request, Stopreg $stopreg)
    {
        $vali = $request->validate([
            'name' => 'required|min:3',
        ]);

        $data = $request->only(['name']);
        $stopreg->update($data);
        toast('Your stopreg was Updated successfully !', 'success');
        return redirect(route('stopregs.index'));
    }

    public function destroy( Stopreg $stopreg)
    {
        $stopreg->delete();
        toast('Your stopreg was Deleted !', 'warning');
        return redirect(route('stopregs.index'));
    }
}
