@extends('layouts.admin')

@section('main')
    <div class="row m-1">
        <div class="card col-12 my-1 p-0">
            <div class="card-header">
                {{ $primary->name }}
                <span class="badge p-2 badge-success"> {{ $primary->key }} </span>
                <span class="badge p-2  badge-primary"> project id : {{ $primary->project_id }} </span>
            </div>
            <div class="card-body">
                <h2>All secondaries keys</h2>
               <div class="row">
                <div class="col-10 justify-content-center">
                    <div class="row">
                        {{-- @forelse ($primaries as $primary)
                        <div class="card col-2  m-1 p-0">
                            <div class="card-header text-center">
                                <p>{{ $primary->name }}</p>
                                <span class="btn btn-sm btn-success"> {{ $primary->key }} </span>
                            </div>
                            <div class="card-body text-center"> 
                                <p>test</p>
                                <a class="btn btn-sm btn-success"> add </a>
                             </div>
                        </div>
                        @empty
                        there is no data 
                        @endforelse --}}
                    </div>
                </div>
                <div class="col-2">
                    <form class="text-center" action=" {{route("primaries.store")}} " method="post">
                        @csrf
                        <label>Add secondary key</label>
                        <input type="hidden" value=" {{$primary->id}} " name="item_id" >
                        <input type="text" class="form-control my-1" name="name" placeholder=" primary key name" id="">
                        <input type="number" step="0.0000001" class="form-control my-1" name="key" placeholder=" your key here" id="">
                        <button type="submit" class="form-control btn btn-primary">ADD<i class="fas fa-plus mx-2"></i></button>
                    </form>
                </div>
               </div>
            </div>
        </div>
    </div>
@endsection
