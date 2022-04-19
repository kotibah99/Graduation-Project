@extends('layouts.admin')
@section('main')
<div class="container">
    <div class="row my-2">
        <div class="col-lg-8 order-lg-2">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
                </li>
                <li class="nav-item">
                    <a href="" data-target="#edit" data-toggle="tab" class="nav-link">other info</a>
                </li>
            </ul>
            <div class="tab-content py-4">
                <div class="tab-pane active" id="profile">
                    <h5 class="mb-3">{{$user->name}} Profile
                        {{-- @can('edit') --}}
                        @if (Auth::user()->id === $user->id)
                            <a href="{{route('users.edit',$user->id)}}" class="btn btn-sm btn-success ">Edit</a>
                        @endif
                        {{-- @endcan --}}
                    </h5>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <h4>About</h4>
                            <p>
                                {{$user->exam1s[0]['status']}}
                            </p>
                            <table class="table table-dark ">

                                <tbody>
                                    <tr class="text-center">
                                        <th scope="col">User Name :</th>
                                        <th scope="col">{{$user->name}}</th>
                                    </tr>

                                    <tr class="text-center">
                                        <th scope="col">About {{$user->name}} :</th>
                                        <th scope="col">{{$user->bio}}</th>
                                    </tr>
                                    <tr class="text-center">
                                        <th scope="col"> Email :</th>
                                        <th scope="col">{{$user->email}}</th>
                                    </tr>
                                    <tr class="text-center">
                                        <th scope="col">Points :</th>
                                        <th scope="col">{{$user->points}}XP</th>
                                    </tr>
                                    <tr class="text-center">
                                        <th scope="col">Section :</th>
                                        <th scope="col">{{$user->section}}</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--/row-->
                </div>
                <div class="tab-pane" id="edit">
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">it will be soon</h4>
                        <p>Aww yeah, you successfully read this important alert message. This example text is going to
                            run a bit longer</p>
                        <hr>
                        <p class="mb-0">there is alot of features to add soon come in another time</p>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-4 order-lg-1 text-center">
            @if (!($user->image))
            <img src="/img/user.svg" class="img-circle elevation-2 my-3" alt="User Image">
            @else
            <img src=" {{asset('storage/'.Auth::user()->image)}} " class="img-circle elevation-2 w-100" alt="User Image">
            @endif
        </div>
    </div>
</div>
@endsection
