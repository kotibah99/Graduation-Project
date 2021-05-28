<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Secondary;
use App\Primary;
use Gate;

class SecondaryController extends Controller
{
    public function index()
    {
        $secondaries = Secondary::orderBy('id')->paginate(6);
        return view('secondaries.index', compact('secondaries'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:3',
            'key' => 'required',
            'primary_id' => 'required',
        ]);
        $key = $request->multi * $request->key;
        $primary = Secondary::create([
            'name' => $request->name,
            'key' => $key,
            'primary_id' => $request->primary_id,
        ]);
        toast('Your Secondary key was Added successfully !', 'success');
        return redirect(route('primaries.show' , $request->primary_id));
    }

    public function create()
    {
        return view('secondaries.create');
    }

    public function show(Secondary $secondary)
    {
        return view('secondaries.show', compact('secondary'));
    }

    public function edit(Secondary $secondary)
    {
        return view('secondaries.edit', compact('secondary'));
    }


    public function update(Request $request, Secondary $secondary)
    {
        $vali = $request->validate([
            'percent' => 'required',
        ]);

        // $data = $request->only(['percent']);
        $data = $secondary->key * $request->percent * 10;
        
        $secondary->update([
            'percent' => $data
        ]);
        
        $primePercent = Secondary::where('primary_id',$secondary->primary_id)->pluck('percent')->sum();
        $primary = Primary::where('id',$secondary->primary_id)->update([
            'percent' => $primePercent
        ]);

        toast('Your secondary was Updated successfully !', 'success');
        return redirect(route('primaries.show',$secondary->primary_id));
    }

    public function destroy( Secondary $secondary)
    {
        $secondary->delete();
        toast('Your secondary was Deleted !', 'warning');
        return redirect(route('secondaries.index'));
    }
}
