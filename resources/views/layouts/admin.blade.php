<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Boilerplate</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/css/app.css">

</head>

<body class="hold-transition sidebar-mini  ">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                                                                                                 document.getElementById('logout-form').submit();">
                                <i class="fa fa-power-off"></i> {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <a href=" {{ route('users.index') }} " class="dropdown-item"><i class="fa fa-users-cog"></i>
                                User Managment</a>
                            @if (Auth::user()->isImpersonating())
                                <a href="{{ route('stopImper') }}" class="dropdown-item"> <i
                                        class="fa fa-user-slash"></i>
                                    Stop Impersonate</a>
                            @endif
                        </div>
                    </li>
                @endguest

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary  elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                {{-- <img src="/img/settings.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8"> --}}
                
            </a>

            <!-- Sidebar -->
            <div class="sidebar ">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        @if (!Auth::user()->image)
                            <img src="/img/user.svg" class="img-circle elevation-2" alt="User Image">
                        @else
                            <img src=" {{ asset('storage/' . Auth::user()->image) }} " class="img-circle elevation-2"
                                alt="User Image">
                        @endif
                    </div>
                    <div class="info">
                        <a href=" {{ route('users.show', Auth::user()) }} "
                            class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                      
                        <li class="nav-item">
                            <a href="{{ route('marks.create') }}" class="nav-link ">
                                <i class=" fa fa-address-book nav-icon"></i>
                                <p>كشف علامات</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('exam1s.create') }}" class="nav-link ">
                                <i class=" fa fa-address-book nav-icon"></i>
                                <p>التقدم لدورة التكميلي ماستر</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('unilives.create') }}" class="nav-link ">
                                <i class=" fa fa-address-book nav-icon"></i>
                                <p> حياة جامعية لطلاب الماجستير</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('certms.create') }}" class="nav-link ">
                                <i class=" fa fa-address-book nav-icon"></i>
                                <p>وثيقة دوام ماستر</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('erejects.create') }}" class="nav-link ">
                                <i class=" fa fa-address-book nav-icon"></i>
                                <p>اعتراض عملي  </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('gradcerts.create') }}" class="nav-link ">
                                <i class=" fa fa-address-book nav-icon"></i>
                                <p> مصدقة تخرج  </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('manuals.create') }}" class="nav-link ">
                                <i class=" fa fa-address-book nav-icon"></i>
                                <p>  طلب يدوي  </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('rejects.create') }}" class="nav-link ">
                                <i class=" fa fa-address-book nav-icon"></i>
                                <p>   طلب اعتراض  </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('sregests.create') }}" class="nav-link ">
                                <i class=" fa fa-address-book nav-icon"></i>
                                <p>  استرداد ايقاف تسجيل  </p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{ route('bloods.create') }}" class="nav-link ">
                                <i class=" fa fa-address-book nav-icon"></i>
                                <p>طلب اعفاء من سحب الدم</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('fund1s.create') }}" class="nav-link ">
                                <i class=" fa fa-address-book nav-icon"></i>
                                <p>تقسيط رسوم التسجيل </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('grads.create') }}" class="nav-link ">
                                <i class=" fa fa-address-book nav-icon"></i>
                                <p>اشعار تخرج </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('items.create') }}" class="nav-link ">
                                <i class=" fa fa-address-book nav-icon"></i>
                                <p>توصيف مقررات  </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('seconds.create') }}" class="nav-link ">
                                <i class=" fa fa-address-book nav-icon"></i>
                                <p>طلب وثيقة ثانوية  </p>
                            </a>
                        </li>
                       
                        <li class="nav-item">
                            <a href="{{ route('termens.create') }}" class="nav-link ">
                                <i class=" fa fa-address-book nav-icon"></i>
                                <p> طلب ترقين القيد </p>
                            </a>
                        </li>
                       
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="content">
                @yield('main')
            </div>
            <!-- /.content -->
        </div>
    </div>
    <!-- ./wrapper -->


    <script src="/js/app.js"></script>
    @include('sweetalert::alert')
</body>

</html>
