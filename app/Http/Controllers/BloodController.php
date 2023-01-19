<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Blood;
use Gate;

class BloodController extends Controller
{
    public function index()
    {
        $bloods = Blood::orderBy('id')->paginate(6);
        // dd($bloods->user());
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
            'user_id'=> Auth::user()->id,
        ]);
        toast('Your Blood was Added successfully !', 'success');
        return redirect(route('admin'));
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
        // dd($blood);
        $blood->update(['st'=>'done']);
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
