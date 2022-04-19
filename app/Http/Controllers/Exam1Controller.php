<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Exam1;
use Gate;

class Exam1Controller extends Controller
{
    public function index()
    {
        $exam1s = Exam1::orderBy('id')->paginate(6);
        return view('exam1s.index', compact('exam1s'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:3',
            'section' => 'required',
            'uniId' => 'required',
            'number' => 'required',
            'itemsnames' => 'required',
            'year' => 'required',
            // 'status' => 'required',
        ]);

        $exam1 = Exam1::create([
            'name' => $request->name,
            'section' => $request->section,
            'uniId' => $request->uniId,
            'number' => $request->number,
            'itemsnames' => $request->itemsnames,
            'year' => $request->year,
            // 'status' => $request->status,
            'user_id' => Auth::user()->id,
        ]);
        toast('Your Exam1 was Added successfully !', 'success');
        return redirect(route('exam1s.index'));
    }

    public function create()
    {
        return view('exam1s.create');
    }

    public function show(Exam1 $exam1)
    {
        return view('exam1s.show', compact('exam1'));
    }

    public function edit(Exam1 $exam1)
    {
        return view('exam1s.edit', compact('exam1'));
    }


    public function update(Request $request, Exam1 $exam1)
    {
        $vali = $request->validate([
            'name' => 'required|min:3',
            'section' => 'required',
            'uniId' => 'required',
            'number' => 'required',
            'itemsnames' => 'required',
            'year' => 'required',
            'status' => 'required',
        ]);

        $data = $request->only(['name']);
        $exam1->update($data);
        toast('Your exam1 was Updated successfully !', 'success');
        return redirect(route('exam1s.index'));
    }

    public function destroy( Exam1 $exam1)
    {
        $exam1->delete();
        toast('Your exam1 was Deleted !', 'warning');
        return redirect(route('exam1s.index'));
    }
}
