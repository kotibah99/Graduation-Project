<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Blood;
use Gate;

class BloodController extends Controller
{
    public function index()
    {
        $bloods = Blood::orderBy('id')->paginate(6);
        return view('bloods.index', compact('bloods'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:3',
            'year' => 'required',
            'bank' => 'required',
            'nId' => 'required',
        ]);

        $blood = Blood::create([
            'name' => $request->name,
            'year' => $request->year,
            'bank' => $request->bank,
            'nId' => $request->nId,
        ]);
        toast('Your Blood was Added successfully !', 'success');
        return redirect(route('bloods.index'));
    }

    public function create()
    {
        return view('bloods.create');
    }

    public function show(Blood $blood)
    {
        return view('bloods.show', compact('blood'));
    }

    public function edit(Blood $blood)
    {
        return view('bloods.edit', compact('blood'));
    }


    public function update(Request $request, Blood $blood)
    {
        $vali = $request->validate([
            'name' => 'required|min:3',
        ]);

        $data = $request->only(['name']);
        $blood->update($data);
        toast('Your blood was Updated successfully !', 'success');
        return redirect(route('bloods.index'));
    }

    public function destroy( Blood $blood)
    {
        $blood->delete();
        toast('Your blood was Deleted !', 'warning');
        return redirect(route('bloods.index'));
    }
}
