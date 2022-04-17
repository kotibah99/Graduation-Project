@extends('layouts.admin')

@section('main')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-right alert alert-primary ">انشاء مستخدم جديد</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            
                            <div class="col-md-8 ml-4 ml-4">
                                <input id="name" type="text" class="form-control " name="name" value="{{ old('name') }}"
                                autocomplete="name">
                                <div> {{$errors->first('name')}} </div>
                            </div>
                            <label for="name" class="col-md-2 col-form-label text-md-right">الاسم</label>
                        </div>

                        <div class="form-group row">
                            
                            <div class="col-md-8 ml-4">
                                <input id="email" type="email" class="form-control " name="email"
                                value="{{ old('email') }}" autocomplete="email">
                                <div> {{$errors->first('email')}} </div>
                            </div>
                            <label for="email" class="col-md-2 col-form-label text-md-right">الايميل</label>
                        </div>
                        <div class="form-group row">
                            
                            <div class="col-md-8 ml-4">
                                <input id="mom" type="text" class="form-control "
                                name="mom">
                                <div> {{$errors->first('mom')}} </div>
                            </div>
                            <label for="mom" class="col-md-2 col-form-label text-md-right">اسم الأم</label>
                        </div>

                        <div class="form-group row">
                            
                            <div class="col-md-8 ml-4">
                                <input id="dad" type="text" class="form-control "
                                name="dad">
                                <div> {{$errors->first('dad')}} </div>
                            </div>
                            <label for="dad" class="col-md-2 col-form-label text-md-right">اسم الأب</label>
                        </div>

                        <div class="form-group row">
                            
                            <div class="col-md-8 ml-4">
                                <input id="uniID" type="text" class="form-control "
                                name="uniID">
                                <div> {{$errors->first('uniID')}} </div>
                            </div>
                            <label for="uniID" class="col-md-2 col-form-label text-md-right">الرقم الجامعي</label>
                        </div>

                        <div class="form-group row">
                            
                            <div class="col-md-8 ml-4">
                                <input id="year" type="text" class="form-control "
                                name="year">
                                <div> {{$errors->first('year')}} </div>
                            </div>
                            <label for="year" class="col-md-2 col-form-label text-md-right">السنة الجامعية</label>
                        </div>


                        <div class="form-group row">
                            
                            <div class="col-md-8 ml-4">
                                <input id="specialize" type="text" class="form-control "
                                name="specialize">
                                <div> {{$errors->first('specialize')}} </div>
                            </div>
                            <label for="specialize" class="col-md-2 col-form-label text-md-right">التخصص الجامعي</label>
                        </div>



                        
                        <div class="form-group row">
                            <div class="col-md-10 ml-4">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image">
                                    <label class="custom-file-label" for="image"> الصورة الشخصية</label>
                                    <small id="emailHelp" class="form-text ">Please make sure to have 1 MB
                                        image.</small>
                                    </div>
                                    {{-- <label for="image" class="col-md-2 col-form-label text-md-right"></label> --}}
                                <div> {{$errors->first('image')}} </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-10 ml-4">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="idImage">
                                    <label class="custom-file-label" for="idImage">الهوية الشخصية</label>
                                    <small id="emailHelp" class="form-text ">Please make sure to have 1 MB
                                        idImage.</small>
                                </div>
                                    {{-- <label for="idImage" class="col-md-2 col-form-label text-md-right"></label> --}}
                                <div> {{$errors->first('idImage')}} </div>
                            </div>
                        </div>


                        <div class="form-group row">
                            
                            <div class="col-md-8 ml-4">
                                <input id="password" type="password" class="form-control " name="password"
                                autocomplete="new-password">
                            </div>
                            <label for="password" class="col-md-2 col-form-label text-md-right">كلمة السر</label>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 ml-4 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
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
