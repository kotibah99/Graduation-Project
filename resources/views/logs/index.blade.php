@extends('layouts.admin')

@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row py-4">
                <div class="col-10">
                    <h2>
                        All Operations
                    </h2>
                </div>
                <div class="col-2">
                    <a href=" {{route('logs.delete')}} " class="btn btn-danger"><i class="fa fa-trash mx-2"></i></a>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logs as $log)
                    <tr>
                        <td>
                            <div class="badge badge-success">{{$log->log_name}} </div> {{$log->description}}
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
