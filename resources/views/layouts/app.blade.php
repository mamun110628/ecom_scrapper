<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
        <title>Price Scrapper </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
        <link rel="apple-touch-icon" href="{{asset('pages/ico/60.png')}}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{asset('pages/ico/76.png')}}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{asset('pages/ico/120.png')}}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{asset('pages/ico/152.png')}}">
        <link rel="icon" type="image/x-icon" href="{{asset('favicon.ico')}}" />
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="default">
        <link href="{{asset('assets/plugins/pace/pace-theme-flash.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="{{asset('assets/plugins/jquery-scrollbar/jquery.scrollbar.css')}}" rel="stylesheet" type="text/css" media="screen" />
        <link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" media="screen" />
        <link rel="stylesheet" href="{{asset('assets/lib/toastr/toastr.min.css')}}">
        <link class="main-stylesheet" href="{{asset('pages/css/pages.css')}}" rel="stylesheet" type="text/css" />
        <!-- Please remove the file below for production: Contains demo classes -->
        <link class="main-stylesheet" href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css" />

    </head>
    <body class="windows desktop js-focus-visible pace-done sidebar-visible menu-pin fixed-header">

        <nav class="page-sidebar" data-pages="sidebar">

            <div class="sidebar-header">
                <img src="assets/img/logo_white.png" alt="logo" class="brand" data-src="assets/img/logo_white.png" data-src-retina="assets/img/logo_white_2x.png" width="78" height="22">

            </div>
            @include('layouts.sidebar')
        </nav>

        <div class="page-container ">
            <!-- START HEADER -->
            <div class="header ">
                <!-- START MOBILE SIDEBAR TOGGLE -->
                <a href="#" class="btn-link toggle-sidebar d-lg-none pg-icon btn-icon-link" data-toggle="sidebar">
                    menu</a>
                <!-- END MOBILE SIDEBAR TOGGLE -->
                <div class="">
                    <div class="brand inline   ">
                        <img src="assets/img/logo.png" alt="logo" data-src="assets/img/logo.png" data-src-retina="assets/img/logo_2x.png" width="78" height="22">
                    </div>

                </div>
                <div class="d-flex align-items-center">
                    <!-- START User Info-->
                    <div class="dropdown pull-right d-lg-block d-none">
                        <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="profile dropdown">
                            <span class="thumbnail-wrapper d32 circular inline">
                                <img src="assets/img/profiles/avatar.jpg" alt="" data-src="assets/img/profiles/avatar.jpg"
                                     data-src-retina="assets/img/profiles/avatar_small2x.jpg" width="32" height="32">
                            </span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
                            <a href="#" class="dropdown-item"><span>Signed in as <br /><b>{{Auth::user()->name}}</b></span></a>
                            <div class="dropdown-divider"></div>
                            <a href="{{route('admin.profile')}}" class="dropdown-item">Your Profile</a>
                            <a href="javascript::void(0);" class="dropdown-item" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}</a>
                            <div class="dropdown-divider"></div>

                        </div>
                    </div>
                    <!-- END User Info-->
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
            <!-- END HEADER -->
            <!-- START PAGE CONTENT WRAPPER -->
            <div class="page-content-wrapper ">
                <!-- START PAGE CONTENT -->
                <div class="content ">
                    <!-- START JUMBOTRON -->
                    <div class="jumbotron" data-pages="parallax">
                        <div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
                            <div class="inner">
                                <!-- START BREADCRUMB -->
                                <!--                <ol class="breadcrumb">
                                                  <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                                  <li class="breadcrumb-item active">Blank template</li>
                                                </ol>-->
                                @yield('breadcump')
                                <!-- END BREADCRUMB -->
                            </div>
                        </div>
                    </div>

                    <div class=" container-fluid   container-fixed-lg">
                        @yield('content')
                    </div>
                    <!-- END CONTAINER FLUID -->
                </div>

                <div class=" container-fluid  container-fixed-lg footer">
                    <div class="copyright sm-text-center">
                        <p class="small-text no-margin pull-left sm-pull-reset">
                            ©{{date('Y')}} All Rights Reserved. 

                        </p>
                        <p class="small no-margin pull-right sm-pull-reset">
                            Developed <span class="hint-text">&amp; By Mamun</span>
                        </p>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <!-- END COPYRIGHT -->
            </div>
            <!-- END PAGE CONTENT WRAPPER -->
        </div>



        <script src="{{asset('assets/plugins/pace/pace.min.js')}}" type="text/javascript"></script>
        <!--  A polyfill for browsers that don't support ligatures: remove liga.js if not needed-->
        <script src="{{asset('assets/plugins/liga.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/plugins/jquery/jquery-3.2.1.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/plugins/modernizr.custom.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/plugins/jquery-ui/jquery-ui.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/plugins/popper/umd/popper.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/plugins/jquery/jquery-easy.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/plugins/jquery-unveil/jquery.unveil.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/plugins/jquery-ios-list/jquery.ioslist.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/plugins/jquery-actual/jquery.actual.min.js')}}"></script>
        <script src="{{asset('assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/plugins/classie/classie.js')}}"></script>
        <script src="{{asset('assets/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/lib/toastr/toastr.min.js')}}"></script>
        <!-- END VENDOR JS -->
        <script src="{{asset('pages/js/pages.min.js')}}"></script>
        <script>
        @if(!empty($errors->all()))
       
            toastr.error('{{ implode(' | ',$errors->all()) }}');
        @elseif(\Session::has('success'))
        toastr.success('{{ session('success') }}');
        @elseif(\Session::has('error'))
        toastr.error('{{ session('error') }}');
                @endif
        </script>
    </body>
</html>
