@extends('layouts.admin')

@section('main')
    <div class="row m-1">
        <div class="card col-12 my-1 p-0">
            <div class="card-header">
                {{ $primary->name }}
                <span class="badge p-2 badge-secondary"> Primary key {{ $primary->key }} </span>
                <span class="badge p-2 badge-success"> total percent : {{ $primary->percent }} </span>
                <span class="badge p-2  badge-primary"> project id : {{ $primary->project_id }} </span>
                <a class="badge p-2 badge-warning float-right" href="{{ route('projects.show',$primary->project->id) }}" > 
                    
                    <i class="fa fa-arrow-circle-left m-1"></i> GO BACK </a>
            </div>
            <div class="card-body">
                <h2>All secondaries keys</h2>
                <div class="row">
                    <div class="col-10 justify-content-center">
                        <div class="row">
                            @forelse ($secondaries as $secondary)
                                <div class="card col-2  m-1 p-0">
                                    <div class="card-header text-center">
                                        <p>{{ $secondary->name }}</p>
                                        <span class="btn btn-sm btn-success"> {{ $secondary->percent }} </span>
                                    </div>
                                    <div class="card-body text-center">
                                        <form class="my-1" action="{{route("secondaries.update",$secondary)}}" method="post">
                                            @csrf
                                            @method('patch')
                                            <select class="form-control" name="percent" id="">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                            </select>
                                            <button type="submit" class="btn btn-success my-3">Add</button>
                                        </form>
                                    </div>
                                </div>
                            @empty
                                <div class="col-10">
                                    there is no data
                                </div>
                                <div class="col-2">
                                    <a href="{{route('seconda',$primary->id)}}" class="btn btn-primary"> start it </a>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
