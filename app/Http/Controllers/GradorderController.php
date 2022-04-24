<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Gradorder;
use Gate;

class GradorderController extends Controller
{
    public function index()
    {
        $gradorders = Gradorder::orderBy('id')->paginate(6);
        return view('gradorders.index', compact('gradorders'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'col' => 'required|min:3',
            'uni' => 'required',
            'special' => 'required',
            'order' => 'required',
            'percent' => 'required',
            'fullname' => 'required',
            'mom' => 'required',
            'nation' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'needs' => 'required',
        ]);

        $gradorder = Gradorder::create([
            'col' => $request->col,
            'uni' => $request->uni,
            'special' => $request->special,
            'order' => $request->order,
            'percent' => $request->percent,
            'mom' => $request->mom,
            'fullname' => $request->fullname,
            'nation' => $request->nation,
            'city' => $request->city,
            'phone' => $request->phone,
            'needs' => $request->needs,
            'user_id'=> Auth::user()->id,
        ]);
        toast('Your Gradorder was Added successfully !', 'success');
        return redirect(route('gradorders.index'));
    }

    public function create()
    {
        return view('gradorders.create');
    }

    public function show(Gradorder $gradorder)
    {
        return view('gradorders.show', compact('gradorder'));
    }

    public function edit(Gradorder $gradorder)
    {
        return view('gradorders.edit', compact('gradorder'));
    }


    public function update(Request $request, Gradorder $gradorder)
    {
        $vali = $request->validate([
            'name' => 'required|min:3',
        ]);

        $data = $request->only(['name']);
        $gradorder->update($data);
        toast('Your gradorder was Updated successfully !', 'success');
        return redirect(route('gradorders.index'));
    }

    public function destroy( Gradorder $gradorder)
    {
        $gradorder->delete();
        toast('Your gradorder was Deleted !', 'warning');
        return redirect(route('gradorders.index'));
    }
}
