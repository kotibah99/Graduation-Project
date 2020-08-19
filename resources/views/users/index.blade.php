@extends('layouts.admin')
@section('main')
<div class="container">
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="row py-4">
            <div class="col-10">
                <h2>
                    All Users
                </h2>
            </div>
            <div class="col-2">
               <a href=" {{route('users.create')}} " class="btn btn-success"><i class="fa fa-user-plus mx-2"></i></a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <th scope="row"> {{$user->id}} </th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td> {{ implode(',',$user->roles()->get()->pluck('name')->toArray()) }} </td>
                    <td>
                        <a href="{{route('users.edit',$user->id)}}" class="btn btn-sm btn-warning float-left">Edit</a>
                        <form action=" {{route('users.destroy',$user)}} " method="post" class="float-left mx-3">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                        {{-- <a href="{{route('imperosnate',$user->id)}}" class="btn btn-sm btn-primary float-left">impersonate</a> --}}

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
@endsection

