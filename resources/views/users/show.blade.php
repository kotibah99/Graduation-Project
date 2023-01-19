@extends('layouts.admin')
@section('main')
    <div class="container">
        <div class="row my-2">
            <div class="col-lg-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="" data-target="#profile" data-toggle="tab" class="nav-link ">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a href="" data-target="#edit" data-toggle="tab" class="nav-link active"> Requests</a>
                    </li>
                </ul>
                <div class="tab-content py-4">
                    <div class="tab-pane active"  id="profile">
                        <h5 class="mb-3">{{ $user->name }} Profile
                            {{-- @can('edit') --}}
                            @if (Auth::user()->id === $user->id)
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-success ">Edit</a>
                            @endif
                            {{-- @endcan --}}
                        </h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <h4>About</h4>
                                <p>

                                </p>
                                <table class="table table-dark ">

                                    <tbody>
                                        <tr class="text-center">
                                            <th scope="col">User Name :</th>
                                            <th scope="col">{{ $user->name }}</th>
                                        </tr>

                                        <tr class="text-center">
                                            <th scope="col">Year :</th>
                                            <th scope="col">{{ $user->year }}</th>
                                        </tr>
                                        <tr class="text-center">
                                            <th scope="col"> Email :</th>
                                            <th scope="col">{{ $user->email }}</th>
                                        </tr>
                                        <tr class="text-center">
                                            <th scope="col">Section :</th>
                                            <th scope="col">{{ $user->specialize }}</th>
                                        </tr>
                                        <tr class="text-center">
                                            <th scope="col">University Id :</th>
                                            <th scope="col">{{ $user->uniID }}</th>
                                        </tr>
                                        <tr class="text-center">
                                            <th scope="col">Father name : </th>
                                            <th scope="col">{{ $user->dad }}</th>
                                        </tr>
                                        <tr class="text-center">
                                            <th scope="col">mother name : </th>
                                            <th scope="col">{{ $user->mom }}</th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--/row-->
                    </div>
                    <div class="tab-pane row  d-flex" id="edit">
                        @foreach ($user->Attends as $attend)
                            <div class="card col-3 pt-1 m-2">
                                <div class="card-title text-center ">
                                    وثيقة دوام
                                </div>
                                <div class="badge badge-warning m-2"> {{ $attend->st }}</div>
                            </div>
                        @endforeach

                        @foreach ($user->bloods as $blood)
                            <div class="card col-3 pt-1 m-2">
                                <div class="card-title text-center ">
                                طلب اعفاء
                                </div>
                                <div class="badge badge-warning m-2"> {{ $blood->st }}</div>
                            </div>
                        @endforeach

                        @foreach ($user->certms as $certm)
                            <div class="card col-3 pt-1 m-2">
                                <div class="card-title text-center ">
                                    وثيقة دوام ماجستير
                                </div>
                                <div class="badge badge-warning m-2"> {{ $certm->st }}</div>
                            </div>
                        @endforeach

                        @foreach ($user->erejects as $ereject)
                            <div class="card col-3 pt-1 m-2">
                                <div class="card-title text-center ">
                                    طلب اعتراض عملي
                                </div>
                                <div class="badge badge-warning m-2"> {{ $ereject->st }}</div>
                            </div>
                        @endforeach

                        @foreach ($user->exam1s as $exam1)
                            <div class="card col-3 pt-1 m-2">
                                <div class="card-title text-center ">
                                    التقدم للدورة التكميلية
                                </div>
                                <div class="badge badge-warning m-2"> {{ $exam1->st }}</div>
                            </div>
                        @endforeach

                        @foreach ($user->fund1s as $fund1)
                            <div class="card col-3 pt-1 m-2">
                                <div class="card-title text-center ">
                                    تقسيط رسوم تسجيل
                                </div>
                                <div class="badge badge-warning m-2"> {{ $fund1->st }}</div>
                            </div>
                        @endforeach

                        @foreach ($user->gradcerts as $gradcert)
                            <div class="card col-3 pt-1 m-2">
                                <div class="card-title text-center ">
                                    مصدقة تخرج
                                </div>
                                <div class="badge badge-warning m-2"> {{ $gradcert->st }}</div>
                            </div>
                        @endforeach

                        @foreach ($user->gradcs as $gradc)
                            <div class="card col-3 pt-1 m-2">
                                <div class="card-title text-center ">
                                    كشف علامات
                                </div>
                                <div class="badge badge-warning m-2"> {{ $gradc->st }}</div>
                            </div>
                        @endforeach


                        @foreach ($user->gradorders as $gradorder)
                            <div class="card col-3 pt-1 m-2">
                                <div class="card-title text-center ">
                                    فرز المهندسين الخريجين
                                </div>
                                <div class="badge badge-warning m-2"> {{ $gradorder->st }}</div>
                            </div>
                        @endforeach


                        @foreach ($user->grads as $grad)
                            <div class="card col-3 pt-1 m-2">
                                <div class="card-title text-center ">
                                    طلب اشعار تخرج
                                </div>
                                <div class="badge badge-warning m-2"> {{ $grad->st }}</div>
                            </div>
                        @endforeach

                        @foreach ($user->hcerts as $hcert)
                            <div class="card col-3 pt-1 m-2">
                                <div class="card-title text-center ">
                                    كشف علامات
                                </div>
                                <div class="badge badge-warning m-2"> {{ $hcert->st }}</div>
                            </div>
                        @endforeach

                        @foreach ($user->items as $item)
                            <div class="card col-3 pt-1 m-2">
                                <div class="card-title text-center ">
                                    طلب توصيف مقررات
                                </div>
                                <div class="badge badge-warning m-2"> {{ $item->st }}</div>
                            </div>
                        @endforeach

                        @foreach ($user->lifens as $lifen)
                            <div class="card col-3 pt-1 m-2">
                                <div class="card-title text-center ">
                                    طلب الحصول على حياة جامعية
                                </div>
                                <div class="badge badge-warning m-2"> {{ $lifen->st }}</div>
                            </div>
                        @endforeach


                        @foreach ($user->manuals as $manual)
                            <div class="card col-3 pt-1 m-2">
                                <div class="card-title text-center ">
                                    طلب يدوي
                                </div>
                                <div class="badge badge-warning m-2"> {{ $manual->st }}</div>
                            </div>
                        @endforeach


                        @foreach ($user->markns as $markn)
                            <div class="card col-3 pt-1 m-2">
                                <div class="card-title text-center ">
                                    كشف علامات
                                </div>
                                <div class="badge badge-warning m-2"> {{ $markn->st }}</div>
                            </div>
                        @endforeach

                        @foreach ($user->rejects as $reject)
                            <div class="card col-3 pt-1 m-2">
                                <div class="card-title text-center ">
                                    طلب اعتراض 
                                </div>
                                <div class="badge badge-warning m-2"> {{ $reject->st }}</div>
                            </div>
                        @endforeach

                        @foreach ($user->seconds as $second)
                            <div class="card col-3 pt-1 m-2">
                                <div class="card-title text-center ">
                                    طلب الوثيقة الثانوية
                                </div>
                                <div class="badge badge-warning m-2"> {{ $second->st }}</div>
                            </div>
                        @endforeach

                        @foreach ($user->sregests as $sregest)
                            <div class="card col-3 pt-1 m-2">
                                <div class="card-title text-center ">
                                    استرداد ايقاف التسجيل
                                </div>
                                <div class="badge badge-warning m-2"> {{ $sregest->st }}</div>
                            </div>
                        @endforeach

                        @foreach ($user->termens as $termen)
                            <div class="card col-3 pt-1 m-2">
                                <div class="card-title text-center ">
                                    طلب ترقين قيد
                                </div>
                                <div class="badge badge-warning m-2"> {{ $termen->st }}</div>
                            </div>
                        @endforeach

                        @foreach ($user->unilives as $unilive)
                            <div class="card col-3 pt-1 m-2">
                                <div class="card-title text-center ">
                                    طلب حياة جامعية
                                </div>
                                <div class="badge badge-warning m-2"> {{ $unilive->st }}</div>
                            </div>
                        @endforeach

                    </div>

                </div>
            </div>
            
        </div>
    </div>
@endsection
