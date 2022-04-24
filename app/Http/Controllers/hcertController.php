<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\hcert;
use Gate;

class hcertController extends Controller
{
    public function index()
    {
        $hcerts = hcert::orderBy('id')->paginate(6);
        return view('hcerts.index', compact('hcerts'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:3',
            'birth' => 'required',
            'nation' => 'required',
            'uniId' => 'required',
            'year' => 'required',
            'date' => 'required',
            'season' => 'required',
        ]);

        $item = Hcert::create([
            'name' => $request->name,
            'birth' => $request->birth,
            'antion' => $request->antion,
            'uniId' => $request->uniId,
            'year' => $request->year,
            'date' => $request->date,
            'season' => $request->season,
            'user_id'=> Auth::user()->id,
        ]);
        toast('Your hcert was Added successfully !', 'success');
        return redirect(route('hcerts.index'));
    }

    public function create()
    {
        return view('hcerts.create');
    }

    public function show(hcert $hcert)
    {
        return view('hcerts.show', compact('hcert'));
    }

    public function edit(hcert $hcert)
    {
        return view('hcerts.edit', compact('hcert'));
    }


    public function update(Request $request, hcert $hcert)
    {
        $vali = $request->validate([
            'name' => 'required|min:3',
        ]);

        $data = $request->only(['name']);
        $hcert->update($data);
        toast('Your hcert was Updated successfully !', 'success');
        return redirect(route('hcerts.index'));
    }

    public function destroy( hcert $hcert)
    {
        $hcert->delete();
        toast('Your hcert was Deleted !', 'warning');
        return redirect(route('hcerts.index'));
    }
}
