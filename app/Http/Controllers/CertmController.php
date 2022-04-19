<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Certm;
use Gate;

class CertmController extends Controller
{
    public function index()
    {
        $certms = Certm::orderBy('id')->paginate(6);
        return view('certms.index', compact('certms'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:3',
            'section' => 'required',
            'spicial' => 'required',
        ]);

        $certm = Certm::create([
            'name' => $request->name,
            'section' => $request->section,
            'spicail' => $request->spicail,
        ]);
        toast('Your Certm was Added successfully !', 'success');
        return redirect(route('certms.index'));
    }

    public function create()
    {
        return view('certms.create');
    }

    public function show(Certm $certm)
    {
        return view('certms.show', compact('certm'));
    }

    public function edit(Certm $certm)
    {
        return view('certms.edit', compact('certm'));
    }


    public function update(Request $request, Certm $certm)
    {
        $vali = $request->validate([
            'name' => 'required|min:3',
        ]);

        $data = $request->only(['name']);
        $certm->update($data);
        toast('Your certm was Updated successfully !', 'success');
        return redirect(route('certms.index'));
    }

    public function destroy( Certm $certm)
    {
        $certm->delete();
        toast('Your certm was Deleted !', 'warning');
        return redirect(route('certms.index'));
    }
}
