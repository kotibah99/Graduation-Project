@extends('layouts.admin')
@section('main')
    <div class="container">
        <div class="row">
            {{-- <div class="card col-2 m-2"> --}}
            @foreach ($hcerts as $item)
                <div class="card col-3 p-2 m-2">
                    <div class="card-title text-center ">
                        طلب توصيف مقررات
                    </div>
                    <div class="bg-gray rounded-sm p-1 m-1">الاسم : {{$item->name}}</div>
 
                    @if ($item->st == 'pendding')
                        <div class="bg-warning rounded-sm p-1 m-1">status  :{{$item->st}}</div>
                    @elseif ($item->st == 'done')
                        <div class="bg-success rounded-sm p-1 m-1"> status :{{$item->st}}</div>
                   @endif
                </div>
            @endforeach
            {{-- </div> --}}
        </div>
    </div>
@endsection
