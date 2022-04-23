@extends('layouts.admin')

@section('main')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-right alert alert-primary "> طلب ترقين القيد </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('termens.store') }}" enctype="multipart/form-data">
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
                            
                            <div class="col-md-8 ml-4 ml-4">
                                <input id="nation" type="text" class="form-control " name="nation" value="{{ old('nation') }}"
                                autocomplete="nation">
                                <div> {{$errors->first('nation')}} </div>
                            </div>
                            <label for="nation" class="col-md-2 col-form-label text-md-right">الجنسية </label>
                        </div>
                        

                        <div class="form-group row">
                            
                            <div class="col-md-8 ml-4 ml-4">
                                <input id="location" type="text" class="form-control " name="location" value="{{ old('location') }}"
                                autocomplete="location">
                                <div> {{$errors->first('location')}} </div>
                            </div>
                            <label for="location" class="col-md-2 col-form-label text-md-right">مكان الولادة </label>
                        </div>
                 
                        <div class="form-group row">
                            
                            <div class="col-md-8 ml-4">
                                <input id="uniId" type="text" class="form-control "
                                name="uniId">
                                <div> {{$errors->first('uniId')}} </div>
                            </div>
                            <label for="uniId" class="col-md-2 col-form-label text-md-right"> الرقم الجامعي</label>
                        </div>

                        <div class="form-group row">
                            
                            <div class="col-md-8 ml-4">
                                <input id="dad" type="text" class="form-control "
                                name="dad">
                                <div> {{$errors->first('dad')}} </div>
                            </div>
                            <label for="dad" class="col-md-2 col-form-label text-md-right"> اسم الاب</label>
                        </div>
                        
                        <div class="form-group row">
                            
                            <div class="col-md-8 ml-4">
                                <input id="birth" type="text" class="form-control "
                                name="birth">
                                <div> {{$errors->first('birth')}} </div>
                            </div>
                            <label for="birth" class="col-md-2 col-form-label text-md-right"> تاريخ الولادة</label>
                        </div>
                        
                        <div class="form-group row">
                            
                            <div class="col-md-8 ml-4">
                                <input id="why" type="text" class="form-control "
                                name="why">
                                <div> {{$errors->first('why')}} </div>
                            </div>
                            <label for="why" class="col-md-2 col-form-label text-md-right"> اسباب الترقين</label>
                        </div>

                        <div class="form-group row">
                            
                            <div class="col-md-8 ml-4">
                                <input id="date" type="text" class="form-control "
                                name="date">
                                <div> {{$errors->first('date')}} </div>
                            </div>
                            <label for="date" class="col-md-2 col-form-label text-md-right"> العامالدراسي</label>
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
