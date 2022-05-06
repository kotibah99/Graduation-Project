@extends('layouts.admin')

@section('main')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-right alert alert-primary "> طلب تقسيط رسوم التسجيل </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('fund1s.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            
                            <div class="col-md-8 ml-4 ml-4">
                                <input id="name" type="text" class="form-control " name="name" value="{{Auth::user()->name}}"
                                autocomplete="name">
                                <div> {{$errors->first('name')}} </div>
                            </div>
                            <label for="name" class="col-md-2 col-form-label text-md-right">اسم مقدم الطلب</label>
                        </div>

                        <div class="form-group row">
                            
                            <div class="col-md-8 ml-4">
                                <input id="section" type="section" class="form-control " name="section"
                                value="{{ old('section') }}" autocomplete="section">
                                <div> {{$errors->first('section')}} </div>
                            </div>
                            <label for="section" class="col-md-2 col-form-label text-md-right">القسم</label>
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
                                <input id="type" type="text" class="form-control "
                                name="type">
                                <div> {{$errors->first('type')}} </div>
                            </div>
                            <label for="type" class="col-md-2 col-form-label text-md-right"> نوع التسجيل</label>
                        </div>
                      

                        <div class="form-group row">
                            
                            <div class="col-md-8 ml-4">
                                <input id="year" type="text" class="form-control "
                                name="year">
                                <div> {{$errors->first('year')}} </div>
                            </div>
                            <label for="year" class="col-md-2 col-form-label text-md-right">السنة الجامعية</label>
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
