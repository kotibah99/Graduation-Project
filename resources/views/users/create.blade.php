@extends('layouts.admin')

@section('main')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New User</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control " name="name" value="{{ old('name') }}"
                                    autocomplete="name">
                                    <div> {{$errors->first('name')}} </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control " name="email"
                                    value="{{ old('email') }}" autocomplete="email">
                                    <div> {{$errors->first('email')}} </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bio" class="col-md-4 col-form-label text-md-right">Bio</label>

                            <div class="col-md-6">
                                <textarea id="bio" type="text" class="form-control "
                                    name="bio">{{ old('bio') }}</textarea>
                                    <div> {{$errors->first('bio')}} </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="section" class="col-md-4 col-form-label text-md-right">section</label>

                            <div class="col-md-6">
                                <input id="section" type="text" class="form-control " name="section"
                                value="{{ old('section') }}">
                                <div> {{$errors->first('section')}} </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="points" class="col-md-4 col-form-label text-md-right">points</label>

                            <div class="col-md-6">
                                <input id="points" type="number" class="form-control " name="points"
                                    value="{{ old('points') }}">
                                    <div> {{$errors->first('points')}} </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">User image</label>
                            <div class="col-md-6">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image">
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
                                <input id="password" type="password" class="form-control " name="password"
                                    autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
