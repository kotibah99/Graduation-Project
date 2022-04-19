<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Item;
use Gate;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::orderBy('id')->paginate(6);
        return view('items.index', compact('items'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:3',
            'section' => 'required',
            'dad' => 'required',
            'year' => 'required',
            'items' => 'required',
        ]);

        $item = Item::create([
            'name' => $request->name,
            'year' => $request->year,
            'dad' => $request->dad,
            'section' => $request->section,
            'items' => $request->items,
            'user_id'=> Auth::user()->id,
        ]);
        toast('Your Item was Added successfully !', 'success');
        return redirect(route('items.index'));
    }

    public function create()
    {
        return view('items.create');
    }

    public function show(Item $item)
    {
        return view('items.show', compact('item'));
    }

    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }


    public function update(Request $request, Item $item)
    {
        $vali = $request->validate([
            'name' => 'required|min:3',
        ]);

        $data = $request->only(['name']);
        $item->update($data);
        toast('Your item was Updated successfully !', 'success');
        return redirect(route('items.index'));
    }

    public function destroy( Item $item)
    {
        $item->delete();
        toast('Your item was Deleted !', 'warning');
        return redirect(route('items.index'));
    }
}
