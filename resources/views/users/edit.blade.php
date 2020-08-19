@extends('layouts.admin')
@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header">Edit {{$user->name}} Account</div>
                <div class="card-body">
                    <form action=" {{route('users.update',$user)}} " method="post">
                        @method('PUT')
                        @csrf
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
