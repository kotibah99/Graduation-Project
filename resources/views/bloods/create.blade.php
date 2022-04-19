@extends('layouts.admin')

@section('main')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-right alert alert-primary ">    طلب اعفاء من التبرع لبنك الدم  </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('bloods.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            
                            <div class="col-md-8 ml-4 ml-4">
                                <input id="name" type="text" class="form-control " name="name" value="{{ old('name') }}"
                                autocomplete="name">
                                <div> {{$errors->first('name')}} </div>
                            </div>
                            <label for="name" class="col-md-2 col-form-label text-md-right">اسم مقدم الطلب</label>
                        </div>

                        <div class="form-group row">
                            
                            <div class="col-md-8 ml-4 ml-4">
                                <input id="year" type="text" class="form-control " name="year" value="{{ old('year') }}"
                                autocomplete="year">
                                <div> {{$errors->first('year')}} </div>
                            </div>
                            <label for="year" class="col-md-2 col-form-label text-md-right">السنة </label>
                        </div>

                 
                        <div class="form-group row">
                            
                            <div class="col-md-8 ml-4">
                                <input id="nId" type="text" class="form-control "
                                name="nId">
                                <div> {{$errors->first('nId')}} </div>
                            </div>
                            <label for="nId" class="col-md-2 col-form-label text-md-right"> الرقم الوطني</label>
                        </div>

                        <div class="form-group row">
                            
                            <div class="col-md-8 ml-4">
                                <input id="bank" type="text" class="form-control "
                                name="bank">
                                <div> {{$errors->first('bank')}} </div>
                            </div>
                            <label for="bank" class="col-md-2 col-form-label text-md-right"> البنك</label>
                        </div>
                        
                       
                        <div class="form-group row mb-0">
                            <div class="col-md-8 ml-4 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    ارسال الطلب
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
