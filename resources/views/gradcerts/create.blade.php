@extends('layouts.admin')

@section('main')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-right alert alert-primary ">   مصدقة تخرج </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('gradcerts.store') }}" enctype="multipart/form-data">
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
                                <input id="mom" type="text" class="form-control "
                                name="mom">
                                <div> {{$errors->first('mom')}} </div>
                            </div>
                            <label for="mom" class="col-md-2 col-form-label text-md-right"> اسم الام</label>
                        </div>


                        <div class="form-group row">
                            
                            <div class="col-md-8 ml-4">
                                <input id="date" type="text" class="form-control "
                                name="date">
                                <div> {{$errors->first('date')}} </div>
                            </div>
                            <label for="date" class="col-md-2 col-form-label text-md-right"> العام الدراسي</label>
                        </div>
                        
                        <div class="form-group row">
                            
                            <div class="col-md-8 ml-4">
                                <input id="gradeseason" type="text" class="form-control "
                                name="gradeseason">
                                <div> {{$errors->first('gradeseason')}} </div>
                            </div>
                            <label for="gradeseason" class="col-md-2 col-form-label text-md-right"> دورة التخرج</label>
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
