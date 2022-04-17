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
                    <a href=" {{route('users.create')}} " class="btn btn-success"><i
                            class="fa fa-user-plus mx-2"></i></a>
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
                            <a href="{{route('users.edit',$user->id)}}"
                                class="btn btn-sm btn-warning float-left"> <i class="fa fa-user-edit"></i></a>
                            <form action=" {{route('users.destroy',$user)}} " method="post" class="float-left mx-3">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger"> <i class=" fa fa-user-minus"></i></button>
                            </form>
                            <a href="{{route('imper',$user)}}" class="btn btn-sm btn-primary
                            mx-3"> <i class="fa fa-user-ninja"></i> impersonate</a>
                            <a href=" {{route("users.show",$user)}} " class="btn btn-sm btn-success float-left"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
