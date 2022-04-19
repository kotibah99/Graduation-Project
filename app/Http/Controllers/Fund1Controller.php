<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Fund1;
use Gate;

class Fund1Controller extends Controller
{
    public function index()
    {
        $fund1s = Fund1::orderBy('id')->paginate(6);
        return view('fund1s.index', compact('fund1s'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:3',
            'year' => 'required',
            'section' => 'required',
            'uniId' => 'required',
            'type' => 'required',
        ]);

        $fund1 = Fund1::create([
            'name' => $request->name,
            'year' => $request->year,
            'section' => $request->section,
            'uniId' => $request->uniId,
            'type' => $request->type,
            'user_id'=> Auth::user()->id,
        ]);
        toast('Your Fund1 was Added successfully !', 'success');
        return redirect(route('fund1s.index'));
    }

    public function create()
    {
        return view('fund1s.create');
    }

    public function show(Fund1 $fund1)
    {
        return view('fund1s.show', compact('fund1'));
    }

    public function edit(Fund1 $fund1)
    {
        return view('fund1s.edit', compact('fund1'));
    }


    public function update(Request $request, Fund1 $fund1)
    {
        $vali = $request->validate([
            'name' => 'required|min:3',
        ]);

        $data = $request->only(['name']);
        $fund1->update($data);
        toast('Your fund1 was Updated successfully !', 'success');
        return redirect(route('fund1s.index'));
    }

    public function destroy( Fund1 $fund1)
    {
        $fund1->delete();
        toast('Your fund1 was Deleted !', 'warning');
        return redirect(route('fund1s.index'));
    }
}
