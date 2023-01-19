@extends('layouts.admin')
@section('main')
    <div class="container">
        <div class="row">
            {{-- <div class="card col-2 m-2"> --}}
            @foreach ($erejects as $item)
                <div class="card col-3 p-2 m-2">
                    <div class="card-title text-center ">
                        طلب اعتراض عملي
                    </div>
                    <div class="bg-gray rounded-sm p-1 m-1">اسم المقرر : {{$item->item}}</div>
                    <div class="bg-gray rounded-sm p-1 m-1">سنة المقرر : {{$item->ityear}}</div>
                    <div class="bg-gray rounded-sm p-1 m-1">فصل المقرر : {{$item->itseason}}</div>
                    <div class="bg-gray rounded-sm p-1 m-1">مدرس النظري: {{$item->ninstract}}</div>
                    <div class="bg-gray rounded-sm p-1 m-1">مدرس العملي : {{$item->einstract}}</div>
                    <div class="bg-gray rounded-sm p-1 m-1">العلامة المعلنة : {{$item->mark}}</div>

                    @if ($item->st == 'pendding')
                        <div class="bg-warning rounded-sm p-1 m-1">status  :{{$item->st}}</div>
                        <form action="{{route('erejects.update',$item->id)}}" method="post">
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
