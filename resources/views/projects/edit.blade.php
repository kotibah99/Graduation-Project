@extends('layouts.admin')

@section('main')
    <div class="row m-1">
        <div class="card col-12 my-1 p-0">
            <div class="card-header">
                {{ $project->name }}
                <span class="badge badge-success"> {{ $project->num }} </span>
                <span class="badge badge-primary"> in site : {{ $project->site }} </span>
            </div>
            <div class="card-body">
                <h2>All primary keys</h2>
                <div class="row justify-content-center">
                    <div class="card col-2  m-1 p-0">
                        <div class="card-header text-center">
                            {{ $project->name }}
                            <span class="badge badge-success"> {{ $project->num }} </span>
                        </div>
                        <div class="card-body"> {{ $project->name }} </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
