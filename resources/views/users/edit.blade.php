@extends('layouts.admin')
@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header">Edit {{$user->name}} Account</div>
                <div class="card-body">
                    <form action=" {{route('users.update',$user->id)}} " method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control " name="name" value="{{$user->name}}" autocomplete="name">
                                <div> {{$errors->first('name')}} </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control " name="email" value="{{$user->email}}"
                                    autocomplete="email">
                                <div> {{$errors->first('email')}} </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bio" class="col-md-4 col-form-label text-md-right">Bio</label>

                            <div class="col-md-6">
                                <textarea id="bio" type="text" class="form-control " name="bio">{{$user->bio}}</textarea>
                                <div> {{$errors->first('bio')}} </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="section" class="col-md-4 col-form-label text-md-right">section</label>

                            <div class="col-md-6">
                                <input id="section" type="text" class="form-control " name="section" value="{{$user->section}}">
                                <div> {{$errors->first('section')}} </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="points" class="col-md-4 col-form-label text-md-right">points</label>

                            <div class="col-md-6">
                                <input id="points" type="number" class="form-control " name="points" value="{{$user->points}}">
                                <div> {{$errors->first('points')}} </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">User image</label>
                            <div class="col-md-6">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image" value="{{$user->image}}">
                                    <label class="custom-file-label" for="image">Choose file...</label>
                                    <small id="emailHelp" class="form-text ">Please make sure to have 1 MB
                                        image.</small>
                                </div>
                                <div> {{$errors->first('image')}} </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control " name="password" value=" {{$user->password}} " autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group my-3 row">
                            @foreach ($roles as $role)
                            <div class="form-check">
                                <input type="checkbox" name="roles[]" value="{{$role->id}}"
                                    @if($user->roles->pluck('id')->contains($role->id))
                                checked
                                @endif
                                >
                                <label> {{$role->name}} </label>
                            </div>
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-sm btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
