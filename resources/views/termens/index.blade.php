@extends('layouts.admin')
@section('main')
    <div class="container">
        <div class="row">
            {{-- <div class="card col-2 m-2"> --}}
            @foreach ($termens as $item)
                <div class="card col-3 p-2 m-2">
                    <div class="card-title text-center ">
                        طلب ترقين قيد
                    </div>
                    <div class="bg-gray rounded-sm p-1 m-1">الجنسية : {{$item->nation}}</div>
                    <div class="bg-gray rounded-sm p-1 m-1">مكان الولادة : {{$item->location}}</div>
                    <div class="bg-gray rounded-sm p-1 m-1">تاريخ الولادة : {{$item->birth}}</div>
                    <div class="bg-gray rounded-sm p-1 m-1">السبب : {{$item->why}}</div>
                    <div class="bg-gray rounded-sm p-1 m-1">مكان الولادة : {{$item->location}}</div>
                    <div class="bg-gray rounded-sm p-1 m-1">رقم الهوية : {{$item->pId}}</div>
                    <div class="bg-gray rounded-sm p-1 m-1">مصدر البطاقة وتاريخ اصدارها: {{$item->idCred}}</div>
 
                    @if ($item->st == 'pendding')
                        <div class="bg-warning rounded-sm p-1 m-1">status  :{{$item->st}}</div>
                        <form action="{{route('termens.update',$item->id)}}" method="post">
                            @csrf
                            @method('patch')
                        <button class="btn btn-sm btn-danger ml-4" >change status</button>
                    </form>
                    <a class="btn btn-sm btn-secondary m-4" href="{{route('users.show',$item->user_id)}}" >check the profile</a>    
                    @elseif ($item->st == 'done')
                    <div class="bg-success rounded-sm p-1 m-1"> status :{{$item->st}}</div>
                    <form action="{{route('exam1s.update',$item->id)}}" method="post">
                        @csrf
                        @method('patch')
                        <button class="btn btn-sm btn-danger ml-4" >change status</button>
                    </form>
                    <a class="btn btn-sm btn-secondary m-4" href="{{route('users.show',$item->user_id)}}" >check the profile</a>    
                    @endif
                </div>
            @endforeach
            {{-- </div> --}}
        </div>
    </div>
@endsection
