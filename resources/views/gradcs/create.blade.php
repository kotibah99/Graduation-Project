@extends('layouts.admin')

@section('main')
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-right alert alert-primary "> فرز المهندسين الخريجين   </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('gradcs.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">

                                <div class="col-md-8 ml-4 ml-4">
                                    <input id="name" type="text" class="form-control " name="name"
                                        value="{{ Auth::user()->name }}" autocomplete="name">
                                    <div> {{ $errors->first('name') }} </div>
                                </div>
                                <label for="name" class="col-md-2 col-form-label text-md-right">الاسم الثلاثي</label>
                            </div>
                            <div class="form-group row">
                            
                                <div class="col-md-8 ml-4 ml-4">
                                    <input id="section" type="text" class="form-control " name="section" value="{{ Auth::user()->specialize }}"
                                    autocomplete="section">
                                    <div> {{$errors->first('section')}} </div>
                                </div>
                                <label for="section" class="col-md-2 col-form-label text-md-right">القسم </label>
                            </div>

                            <div class="form-group row">
                            
                                <div class="col-md-8 ml-4 ml-4">
                                    <input id="uniId" type="text" class="form-control " name="uniId" value="{{ Auth::user()->uniID }}"
                                    autocomplete="uniId">
                                    <div> {{$errors->first('uniId')}} </div>
                                </div>
                                <label for="uniId" class="col-md-2 col-form-label text-md-right">الرقم الجامعي </label>
                            </div>
                     
                            <div class="form-group row">
                                
                                <div class="col-md-8 ml-4">
                                    <input id="items" type="text" class="form-control "
                                    name="items">
                                    <div> {{$errors->first('items')}} </div>
                                </div>
                                <label for="items" class="col-md-2 col-form-label text-md-right"> المقررات</label>
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
