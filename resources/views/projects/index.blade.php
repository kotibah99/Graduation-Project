@extends('layouts.admin')
@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row py-4">
                <div class="col-10">
                    <h2>
                        All Projects
                    </h2>
                </div>
                <div class="col-2">
                    <a href=" {{route('projects.create')}} " class="btn btn-success"><i
                            class="fa fa-folder-plus mx-2"></i></a>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Number</th>
                        <th scope="col">Site</th>
                        <th scope="col">Operations</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                    <tr>
                        <th scope="row"> {{$project->name}} </th>
                        <td>{{$project->num}}</td>
                        <td>{{$project->site}}</td>
                        <td>
                            <a href="{{route('projects.show',$project->id)}}"
                                class="btn btn-sm btn-warning float-left"> <i class="fa fa-user-edit"></i></a>
                            <form action=" {{route('projects.destroy',$project)}} " method="post" class="float-left mx-3">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger"> <i class=" fa fa-user-minus"></i></button>
                            </form>
                            </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
