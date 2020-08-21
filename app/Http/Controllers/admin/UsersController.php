<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::denies('edit')) {
            alert()->error('premission Denied', 'You Don\'t have any premissions to access  Because you are not Admin');
            return redirect('/admin');
        }
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $vali = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:App\User',
            'bio' => 'required|max:255',
            'image' => 'required|image',
            'points' => 'required|integer',
            'section' => 'required|min:3',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'bio' => $request->bio,
            'points' => $request->points,
            'section' => $request->section,
            'password' => Hash::make($request->password),
            'image' => $request->image->store('images', 'public'),
        ]);
        $role = Role::select('id')->where('name', 'user')->first();
        $user->roles()->attach($role);

        alert()->success('successfully', 'the new user was registered');
        return redirect(route('users.index'));
    }

    public function edit(User $user)
    {
        if (Gate::allows('edit')) {
            $roles = Role::all();
            return view('users.edit', compact('user', 'roles'));
        } else {
            if (!(Auth::user()->id === $user->id)) {
                alert()->error('error', 'you can not edit users becuase you are not admin');
                return redirect(route("users.index"));
            }
            $roles = Role::all();
            return view('users.edit', compact('user', 'roles'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $vali = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'bio' => 'required|max:255',
            'points' => 'required|integer',
            'section' => 'required|min:3',
            'password' => 'required|min:5'
        ]);
        $data = $request->except(['image', 'roles','password']);
        $pass = Hash::make($request->password) ;
        $data['password']=$pass;
        if ($request->hasFile('image')) {
            $image = $request->image->store('images', 'public');
            Storage::disk('public')->delete($user->image);
            $data['image'] = $image;
        }
        if ($request->roles) {
            $user->roles()->sync($request->roles);
        }
        $user->update($data);
        toast('this user was Updated successfully', 'info');
        return redirect()->route('users.show',$user);
    }
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        Storage::disk('public')->delete($user->image);
        $user->roles()->detach();
        $user->delete();
        toast('this user was deleted !', 'warning');
        return redirect()->route('users.index');
    }
    public function impersonate($id)
    {
        if (Gate::denies('edit')) {
            alert()->error('Operation Not Allowed', 'You Don\'t have any premissions to impersonating users  Because you are not ADMIN');
            return redirect()->route('users.index');
        }
        $user = User::find($id);
        Auth::user()->setImpersonating($user->id);
        return redirect(route('users.show',$user));
    }

    public function stopImper()
    {

        Auth::user()->stopImpersonating();
        alert()->success('Imperonating Finished', 'You have finished your impersonating session successfully');

        return redirect(route('users.index'));
    }
}
