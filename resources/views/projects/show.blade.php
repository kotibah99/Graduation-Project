@extends('layouts.admin')

@section('main')
    <div class="row m-1">
        <div class="card col-12 my-1 p-0">
            <div class="card-header">
                {{ $project->name }}
                <span class="badge badge-info"> {{ $project->num }} </span>
                <span class="badge badge-primary"> in site : {{ $project->site }} </span>
                @if ($primaries->pluck('percent')->sum()> 70)
                <span class="btn btn-sm btn-success float-right mx-2"> Resulte : {{$primaries->pluck('percent')->sum()}}  </span>
                @else
                <span class="btn btn-sm btn-danger float-right mx-2"> Resulte : {{$primaries->pluck('percent')->sum()}}  </span>
                @endif
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-sm btn-warning float-right" data-toggle="modal"
                    data-target="#exampleModal">
                    <i class="fa fa-vial"></i> test
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            @if ($primaries->pluck('percent')->sum() > 70)
                            <div class="modal-header">
                                <h2 class="modal-title text-green" id="exampleModalLabel">
                                    <i class="fa fa-clipboard-check"></i> approved !
                                </h2>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-success">
                                    you should do it becuase it  {{$primaries->pluck('percent')->sum()}} the percentage 70%
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                            </div>
                            @else
                            <div class="modal-header">
                                <h2 class="modal-title text-danger" id="exampleModalLabel">
                                    <i class="fa fa-exclamation-triangle"></i>  it's dangerous !!
                                </h2>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-danger">
                                    you should not do it becuase it under the percentage
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h2>All primary keys</h2>



                <div class="row justify-content-center">

                    @forelse ($primaries as $item)
                        <div class="card col-2  m-1 p-0">
                            <div class="card-header text-center">
                                <p>{{ $item->name }}</p>
                                <span class="btn btn-sm btn-success">

                                    @if ($item->percent)
                                        {{ $item->percent }}
                                    @else
                                        -
                                    @endif
                                </span>
                            </div>
                            <div class="card-body text-center">
                                <p>test</p>
                                <a class="btn btn-sm btn-success" href=" {{ route('primaries.show', $item->id) }} ">
                                    add
                                </a>
                            </div>
                        </div>
                    @empty
                        there is no data
                    @endforelse

                </div>
                {{-- <div class="col-2">
                    <form class="text-center" action=" {{route("primaries.store")}} " method="post">
                        @csrf
                        <label>Add Primary key</label>
                        <input type="hidden" value=" {{$project->id}} " name="project_id" >
                        <input type="text" class="form-control my-1" name="name" placeholder=" primary key name" id="">
                        <input type="number" step="0.0000001" class="form-control my-1" name="key" placeholder=" your key here" id="">
                        <button type="submit" class="form-control btn btn-primary">ADD<i class="fas fa-plus mx-2"></i></button>
                    </form>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
