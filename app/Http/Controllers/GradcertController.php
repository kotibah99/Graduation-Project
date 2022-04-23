<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Gradcert;
use Gate;

class GradcertController extends Controller
{
    public function index()
    {
        $gradcerts = Gradcert::orderBy('id')->paginate(6);
        return view('gradcerts.index', compact('gradcerts'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:3',
            'dad' => 'required',
            'mom' => 'required',
            'uniId' => 'required',
            'year' => 'required',
            'gradeseason' => 'required',
            'date' => 'required',
        ]);

        $gradcert = Gradcert::create([
            'name' => $request->name,
            'dad' => $request->dad,
            'uniId' => $request->uniId,
            'year' => $request->year,
            'date' => $request->date,
            'mom' => $request->mom,
            'gradeseason' => $request->gradeseason,
            'user_id'=> Auth::user()->id,
        ]);
        toast('Your Gradcert was Added successfully !', 'success');
        return redirect(route('gradcerts.index'));
    }

    public function create()
    {
        return view('gradcerts.create');
    }

    public function show(Gradcert $gradcert)
    {
        return view('gradcerts.show', compact('gradcert'));
    }

    public function edit(Gradcert $gradcert)
    {
        return view('gradcerts.edit', compact('gradcert'));
    }


    public function update(Request $request, Gradcert $gradcert)
    {
        $vali = $request->validate([
            'name' => 'required|min:3',
        ]);

        $data = $request->only(['name']);
        $gradcert->update($data);
        toast('Your gradcert was Updated successfully !', 'success');
        return redirect(route('gradcerts.index'));
    }

    public function destroy( Gradcert $gradcert)
    {
        $gradcert->delete();
        toast('Your gradcert was Deleted !', 'warning');
        return redirect(route('gradcerts.index'));
    }
}
