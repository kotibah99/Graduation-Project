@extends('layouts.admin')

@section('main')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-right alert alert-primary "> طلب اعتراض    </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('attends.store') }}" enctype="multipart/form-data">
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
                                <input id="dad" type="text" class="form-control " name="dad" value="{{ old('dad') }}"
                                autocomplete="dad">
                                <div> {{$errors->first('dad')}} </div>
                            </div>
                            <label for="dad" class="col-md-2 col-form-label text-md-right">اسم الاب  </label>
                        </div>


                        <div class="form-group row">
                            
                            <div class="col-md-8 ml-4">
                                <input id="date" type="text" class="form-control "
                                name="date">
                                <div> {{$errors->first('date')}} </div>
                            </div>
                            <label for="date" class="col-md-2 col-form-label text-md-right"> عام الدوام والفصل </label>
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
