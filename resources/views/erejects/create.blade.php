@extends('layouts.admin')

@section('main')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-right alert alert-primary ">   طلب اعتراض عملي </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('erejects.store') }}" enctype="multipart/form-data">
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
                                <input id="section" type="text" class="form-control " name="section" value="{{ old('section') }}"
                                autocomplete="section">
                                <div> {{$errors->first('section')}} </div>
                            </div>
                            <label for="section" class="col-md-2 col-form-label text-md-right">القسم </label>
                        </div>
                 
                        <div class="form-group row">
                            
                            <div class="col-md-8 ml-4 ml-4">
                                <input id="uniId" type="text" class="form-control " name="uniId" value="{{ old('uniId') }}"
                                autocomplete="uniId">
                                <div> {{$errors->first('uniId')}} </div>
                            </div>
                            <label for="uniId" class="col-md-2 col-form-label text-md-right">الرقم الجامعي   </label>
                        </div>


                        <div class="form-group row">
                            
                            <div class="col-md-8 ml-4">
                                <input id="item" type="text" class="form-control "
                                name="item">
                                <div> {{$errors->first('item')}} </div>
                            </div>
                            <label for="item" class="col-md-2 col-form-label text-md-right"> اسم المقرر </label>
                        </div>

                        <div class="form-group row">
                            
                            <div class="col-md-8 ml-4">
                                <input id="ityear" type="text" class="form-control "
                                name="ityear">
                                <div> {{$errors->first('ityear')}} </div>
                            </div>
                            <label for="ityear" class="col-md-2 col-form-label text-md-right">  سنة المقرر</label>
                        </div>

                        <div class="form-group row">
                            
                            <div class="col-md-8 ml-4">
                                <input id="itseason" type="text" class="form-control "
                                name="itseason">
                                <div> {{$errors->first('itseason')}} </div>
                            </div>
                            <label for="itseason" class="col-md-2 col-form-label text-md-right">  فصل المقرر</label>
                        </div>
                        
                        <div class="form-group row">
                            
                            <div class="col-md-8 ml-4">
                                <input id="ninstract" type="text" class="form-control "
                                name="ninstract">
                                <div> {{$errors->first('ninstract')}} </div>
                            </div>
                            <label for="ninstract" class="col-md-2 col-form-label text-md-right">   مدرس النظري</label>
                        </div>
                       
                        <div class="form-group row">
                            
                            <div class="col-md-8 ml-4">
                                <input id="einstract" type="text" class="form-control "
                                name="einstract">
                                <div> {{$errors->first('einstract')}} </div>
                            </div>
                            <label for="einstract" class="col-md-2 col-form-label text-md-right">   مدرس العملي</label>
                        </div>

                        <div class="form-group row">
                            
                            <div class="col-md-8 ml-4">
                                <input id="mark" type="text" class="form-control "
                                name="mark">
                                <div> {{$errors->first('mark')}} </div>
                            </div>
                            <label for="mark" class="col-md-2 col-form-label text-md-right">    العلامة المعلنة</label>
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
