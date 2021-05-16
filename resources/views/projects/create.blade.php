@extends('layouts.admin')

@section('main')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New User</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('projects.store') }}" >
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
                            <label for="num"
                                class="col-md-4 col-form-label text-md-right">number</label>

                            <div class="col-md-6">
                                <input id="num" type="text" class="form-control " name="num"
                                    value="{{ old('num') }}" autocomplete="num">
                                    <div> {{$errors->first('num')}} </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="site" class="col-md-4 col-form-label text-md-right">site</label>

                            <div class="col-md-6">
                                <input id="site" type="text" class="form-control"
                                    name="site" value="{{ old('site') }}">
                                    <div> {{$errors->first('site')}} </div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Add
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
