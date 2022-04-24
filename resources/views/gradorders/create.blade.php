@extends('layouts.admin')

@section('main')
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-right alert alert-primary "> فرز المهندسين الخريجين   </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('gradorders.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">

                                <div class="col-md-8 ml-4 ml-4">
                                    <input id="fullname" type="text" class="form-control " name="fullname"
                                        value="{{ old('fullname') }}" autocomplete="fullname">
                                    <div> {{ $errors->first('fullname') }} </div>
                                </div>
                                <label for="fullname" class="col-md-2 col-form-label text-md-right">الاسم الثلاثي</label>
                            </div>

                            <div class="form-group row">

                                <div class="col-md-8 ml-4">
                                    <input id="uni" type="uni" class="form-control " name="uni" value="{{ old('uni') }}"
                                        autocomplete="uni">
                                    <div> {{ $errors->first('uni') }} </div>
                                </div>
                                <label for="uni" class="col-md-2 col-form-label text-md-right">الجامعة</label>
                            </div>

                            <div class="form-group row">

                                <div class="col-md-8 ml-4">
                                    <input id="col" type="col" class="form-control " name="col" value="{{ old('col') }}"
                                        autocomplete="col">
                                    <div> {{ $errors->first('col') }} </div>
                                </div>
                                <label for="col" class="col-md-2 col-form-label text-md-right">الكلية</label>
                            </div>



                            <div class="form-group row">

                                <div class="col-md-8 ml-4">
                                    <input id="mom" type="mom" class="form-control " name="mom" value="{{ old('mom') }}"
                                        autocomplete="mom">
                                    <div> {{ $errors->first('mom') }} </div>
                                </div>
                                <label for="mom" class="col-md-2 col-form-label text-md-right">اسم الام</label>
                            </div>


                            <div class="form-group row">

                                <div class="col-md-8 ml-4">
                                    <input id="special" type="text" class="form-control " name="special">
                                    <div> {{ $errors->first('special') }} </div>
                                </div>
                                <label for="special" class="col-md-2 col-form-label text-md-right"> الاختصاص </label>
                            </div>


                            <div class="form-group row">

                                <div class="col-md-8 ml-4">
                                    <input id="order" type="text" class="form-control " name="order">
                                    <div> {{ $errors->first('order') }} </div>
                                </div>
                                <label for="order" class="col-md-2 col-form-label text-md-right"> تسلسل قرار التخرج</label>
                            </div>


                            <div class="form-group row">

                                <div class="col-md-8 ml-4">
                                    <input id="percent" type="text" class="form-control " name="percent">
                                    <div> {{ $errors->first('percent') }} </div>
                                </div>
                                <label for="percent" class="col-md-2 col-form-label text-md-right"> المعدل</label>
                            </div>
                           
                            <div class="form-group row">

                                <div class="col-md-8 ml-4">
                                    <input id="nation" type="text" class="form-control " name="nation">
                                    <div> {{ $errors->first('nation') }} </div>
                                </div>
                                <label for="nation" class="col-md-2 col-form-label text-md-right"> الجنسية</label>
                            </div>
                            <div class="form-group row">

                                <div class="col-md-8 ml-4">
                                    <input id="city" type="text" class="form-control " name="city">
                                    <div> {{ $errors->first('city') }} </div>
                                </div>
                                <label for="city" class="col-md-2 col-form-label text-md-right"> الاقامة</label>
                            </div>
                            <div class="form-group row">

                                <div class="col-md-8 ml-4">
                                    <input id="phone" type="text" class="form-control " name="phone">
                                    <div> {{ $errors->first('phone') }} </div>
                                </div>
                                <label for="phone" class="col-md-2 col-form-label text-md-right"> رقم الهاتتف</label>
                            </div>
                            <div class="form-group row">

                                <div class="col-md-8 ml-4">
                                    <input id="needs" type="text" class="form-control " name="needs">
                                    <div> {{ $errors->first('needs') }} </div>
                                </div>
                                <label for="needs" class="col-md-2 col-form-label text-md-right"> رغبات التعيين</label>
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
