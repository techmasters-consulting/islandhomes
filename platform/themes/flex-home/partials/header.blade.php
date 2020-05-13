<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="_token" content="{{csrf_token()}}" />
    <link rel="canonical" href="{{ url('/') }}">
    <meta http-equiv="content-language" content="en">

{!! Theme::header() !!}

<!-- Fonts-->
    <link
        href="https://fonts.googleapis.com/css?family={{ theme_option('primary_font', 'Nunito Sans') }}:300,600,700,800"
        rel="stylesheet" type="text/css">

    <!-- Fonts-->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.0/css/ionicons.css"
        rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <!-- CSS Library-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <style>
        :root {
            --primary-color: {{ theme_option('primary_color', '#1d5f6f') }};
            --primary-color-hover: {{ theme_option('primary_color_hover', '#063a5d') }};
        }
        body {
            font-family: '{{ theme_option('primary_font', 'Nunito Sans') }}', sans-serif !important;
        }
    </style>
    <style>

        .background_bg {
            background-position: center center;
            background-size: cover;
        }
        .modal {
            padding-right: 0 !important;
        }
        .subscribe_popup .modal-body {
            padding: 0;
        }
        .subscribe_popup .modal-content {
            border: 0;
            border-radius: 0;
        }
        .popup_content {
            padding: 50px;
            text-align: center;
        }
        .subscribe_popup .close {
            position: absolute;
            right: 0;
            top: 0;
            z-index: 9;
            opacity: 1;
            text-shadow: none;
            width: 40px;
            height: 40px;
        }
        .subscribe_popup .close i {
            font-size: 40px;
        }
        .modal {
            z-index: 99999;
        }
        .modal-backdrop {
            z-index: 9999;
        }

        .btn-fill-out {
            background-color: transparent;
            border: 1px solid rgb(29, 95, 111);
            color: #fff;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }
        .btn-fill-out::before,
        .btn-fill-out::after {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            background-color: rgb(29, 95, 111);
            z-index: -1;
            transition: all 0.3s ease-in-out;
            width: 51%;
        }
        .btn-fill-out::after {
            right: 0;
            left: auto;
        }
        .btn-fill-out:hover:before,
        .btn-fill-out:hover:after {
            width: 0;
        }
        .btn-fill-out:hover {
            color: rgb(29, 95, 111) !important;
        }
        .btn-fill-line {
            background-color: transparent;
            border: 1px solid #333;
            overflow: hidden;
            position: relative;
            color: #fff !important;
            transition: all 0.8s ease 0s;
            z-index: 1;
        }
        .btn-fill-line:before, .btn-fill-line:after {
            position: absolute;
            content: '';
            left: 0;
            top: 0;
            bottom: 0;
            background-color: #333;
            z-index: -1;
            transition: all 0.3s ease-in-out;
            width: 50%;
        }
        .btn-fill-line::after {
            right: 0;
            left: auto;
        }
        .btn-fill-line:hover:before,
        .btn-fill-line:hover:after {
            width: 0;
        }
        .btn-fill-line:hover {
            color: #333 !important;
        }
        .btn-border-fill {
            border: 1px solid rgb(29, 95, 111);
            color: rgb(29, 95, 111);
            position: relative;
            overflow: hidden;
            z-index: 1;
        }
        .btn-border-fill::before,
        .btn-border-fill::after {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            background-color: rgb(29, 95, 111);
            z-index: -1;
            transition: all 0.3s ease-in-out;
            width: 0;
        }
        .btn-border-fill::after {
            right: 0;
            left: auto;
        }
        .btn-border-fill:hover:before,
        .btn-border-fill:hover:after {
            width: 50%;
        }
        .btn-border-fill:hover {
            color: #fff !important;
        }
        .btn-white {
            background-color: transparent;
            border: 1px solid #fff;
            color: #292b2c !important;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }
        .btn-white::before,
        .btn-white::after {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            background-color: #fff;
            z-index: -1;
            transition: all 0.5s ease-in-out;
            width: 50%;
        }
        .btn-white::after {
            right: 0;
            left: auto;
        }
        .btn-white:hover:before,
        .btn-white:hover:after {
            width: 0;
        }
        .btn-white:hover {
            color: #fff !important;
        }

        .btn-fill-out-dark {
            background-color: transparent;
            border: 1px solid #333;
            color: #fff !important;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }
        .btn-fill-out-dark:hover {
            color: #333 !important;
        }
        .btn-fill-out-dark::before {
            display: block;
            position: absolute;
            top: 0px;
            left: 0px;
            height: 100%;
            width: 100%;
            z-index: -1;
            content: '';
            background-color: #333;
            transition: all 0.4s cubic-bezier(0.42, 0, 0.58, 1);
        }
        .btn-line-fill {
            border: 1px solid #333;
            overflow: hidden;
            position: relative;
            color: #333 !important;
            transition: all 0.8s ease 0s;
            z-index: 1;
        }
        .btn-line-fill:hover {
            color: #fff !important;
        }
        @keyframes criss-cross-left {
            0% {
                left: -20px;
            }
            50% {
                left: 50%;
                width: 20px;
                height: 20px;
            }
            100% {
                left: 50%;
                width: 450px;
                height: 450px;
            }
        }
        @keyframes criss-cross-right {
            0% {
                right: -20px;
            }
            50% {
                right: 50%;
                width: 20px;
                height: 20px;
            }
            100% {
                right: 50%;
                width: 450px;
                height: 450px;
            }
        }
        .btn-line-fill:before, .btn-line-fill:after {
            position: absolute;
            top: 50%;
            content: '';
            width: 20px;
            height: 20px;
            background-color: #333;
            border-radius: 50%;
            z-index: -1;
        }
        .btn-line-fill:before {
            left: -20px;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }
        .btn-line-fill:after {
            right: -20px;
            -webkit-transform: translate(50%, -50%);
            transform: translate(50%, -50%);
        }
        .btn-line-fill:hover:before {
            -webkit-animation: criss-cross-left 0.7s both;
            animation: criss-cross-left 0.7s both;
            -webkit-animation-direction: alternate;
            animation-direction: alternate;
        }
        .btn-line-fill:hover:after {
            -webkit-animation: criss-cross-right 0.7s both;
            animation: criss-cross-right 0.7s both;
            -webkit-animation-direction: alternate;
            animation-direction: alternate;
        }
        .btn-line-white {
            border: 1px solid #fff;
            color: #fff !important;
        }
        .btn-line-white:hover {
            color: #333 !important;
        }
        .btn-line-fill.btn-line-white:before, .btn-line-fill.btn-line-white:after {
            background-color: #fff;
        }
        .btn-tran-light {
            background-color: rgba(255,255,255,0.2);
            color: #fff;
        }
        .btn-tran-light:hover {
            background-color: #fff;
        }
        .form-control {
            color: #000;
            box-shadow: none;
            height: 50px;
            background-color: white;
            padding: 8px 15px;
        }
        .form-control:focus,
        .custom-file-input:focus ~ .custom-file-label {
            color: #000;
            box-shadow: none;
            height: 50px;
        }
        .custome-checkbox .form-check-label {
            position: relative;
            cursor: pointer;
            color: #687188;
            padding: 0;
            vertical-align: middle;
        }
        .custome-checkbox .form-check-input {
            display: none;
        }
        .custome-checkbox .form-check-label span {
            vertical-align: middle;
        }
        .custome-checkbox .form-check-label::before {
            content: "";
            border: 2px solid #ced4da;
            height: 17px;
            width: 17px;
            margin: 0px 8px 0 0;
            display: inline-block;
            vertical-align: middle;
        }
        .custome-checkbox input[type="checkbox"]:checked + .form-check-label::after {
            opacity: 1;
        }
        .custome-checkbox input[type="checkbox"] + .form-check-label::after {
            content: "";
            width: 11px;
            position: absolute;
            top: 50%;
            left: 3px;
            opacity: 0;
            height: 6px;
            border-left: 2px solid #fff;
            border-bottom: 2px solid #fff;
            -moz-transform: translateY(-65%) rotate(-45deg);
            -webkit-transform: translateY(-65%) rotate(-45deg);
            transform: translateY(-65%) rotate(-45deg);
        }
        .custome-checkbox input[type="checkbox"]:checked + .form-check-label::before {
            background-color: rgb(29, 95, 111);
            border-color: rgb(29, 95, 111);
        }

        /*footer newsletter*/
        .bg_default {
            background-color: rgb(29, 95, 111) !important;
        }
        .section {
            padding: 100px 0;
            position:relative;
        }
        .section.small_pb, .footer_top.small_pb {
            padding-bottom: 50px;
        }
        .section.small_pt, .footer_top.small_pt {
            padding-top: 50px;
        }
        .section {
            padding: 100px 0;
            padding-top: 100px;
            padding-bottom: 100px;
            position: relative;
        }

        .custom-container {
            max-width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }
        .newsletter_small {
            padding: 70px 0;
        }
        .newsletter_form form,
        .newsletter_form2 form {
            position: relative;
        }
        .rounded-input {
            border-radius: 50px;
        }
        .newsletter_form input,
        .newsletter_form input:focus,
        .newsletter_form2 input,
        .newsletter_form2 input:focus {
            border: 0;
        }
        .newsletter_form input.form-control-sm {
            height: 50px;
            padding: 10px 140px 10px 20px;
        }
        .newsletter_form button {
            position: absolute;
            right: 0px;
            top: 50%;
            -moz-transform: translateY(-50%);
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
        }
        .newsletter_form2 input,
        .newsletter_form2 input:focus {
            height: 59px;
            padding: 10px 140px 10px 20px;
        }
        .newsletter_form2 button {
            position: absolute;
            right: 5px;
            top: 4px;
        }
        .newsletter_box {
            padding: 70px 50px;
            background-color: #fff;
            position: relative;
        }
        .newsletter_box::before {
            content: "";
            position: absolute;
            left: 10px;
            right: 0px;
            bottom: 0px;
            top: 10px;
            box-shadow: 10px 10px 0px rgba(0,0,0,0.1);
            z-index: 0;
        }
        .newsletter_wrap {
            position: relative;
            margin: 30px 0;
        }
        .newsletter_wrap::before {
            content: "";
            position: absolute;
            left: 15px;
            right: 15px;
            bottom: -15px;
            top: -15px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            z-index: -1;
            background-color: #fff;
        }
        .newsletter_wrap::after {
            content: "";
            position: absolute;
            left: 30px;
            right: 30px;
            bottom: -30px;
            top: -30px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            z-index: -2;
            background-color: #fff;
        }
        .newsletter_form .btn-send {
            background-color: rgb(29, 95, 111);
            color: #fff;
            font-size: 20px;
            right: 5px;
            border: 0;
            border-radius: 100%;
            width: 40px;
            height: 40px;
            padding: 0;
            line-height: 40px;
        }
        .newsletter_form .btn-send2 {
            background-color: transparent;
            color: rgb(29, 95, 111);
            font-size: 20px;
            right: 5px;
            width: 50px;
            height: 40px;
            line-height: 40px;
            border-left: 1px solid #ddd;
            border-top: 0;
            border-bottom: 0;
            border-right: 0;
            padding: 0 0 0 5px;
        }
        .input_tran_white input, .input_tran_white input:focus {
            background-color: rgba(255,255,255,0.1);
            color: #fff;
            box-shadow: none;
        }
        .input_tran_white input::-webkit-input-placeholder {
            color:#ffffff;
            opacity:1
        }
        .input_tran_white input::-moz-placeholder {
            color:#ffffff;
            opacity:1
        }
        .input_tran_white input:-ms-input-placeholder {
            color:#ffffff;
            opacity:1
        }
        .input_tran_white input::-ms-input-placeholder {
            color:#ffffff;
            opacity:1
        }
        .input_tran_white input::placeholder {
            color:#ffffff;
            opacity:1
        }
        .newsletter_text {
            position: relative;
            padding-left: 50px;
        }
        .newsletter_text p:last-child {
            margin: 0;
        }

        .rounded_input .form-control,
        .rounded_input input {
            border-radius: 30px;
            padding: 10px 20px;
        }
        .btn-radius {
            border-radius: 40px;
        }
        .btnt {
            border-width: 1px;
            cursor: pointer;
            line-height: normal;
            padding: 12px 35px;
            text-transform: capitalize;
            transition: all 0.3s ease-in-out;
        }
        .text_white * {
            color: #fff;
        }
    </style>
    <!-- Load Facebook SDK for JavaScript -->
     <div id="fb-root"></div>
     <script>
       window.fbAsyncInit = function() {
         FB.init({
           xfbml           : true,
           version         : 'v6.0'
         });
       };

       (function(d, s, id) {
       var js, fjs = d.getElementsByTagName(s)[0];
       if (d.getElementById(id)) return;
       js = d.createElement(s); js.id = id;
       js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
       fjs.parentNode.insertBefore(js, fjs);
     }(document, 'script', 'facebook-jssdk'));</script>

     <!-- Your customer chat code -->
     <div class="fb-customerchat"
       attribution=setup_tool
       page_id="535560266890298"
 theme_color="#44bec7">
     </div>
</head>
<body>

<div class="bravo_topbar">
    <div class="container-fluid w90">
        <div class="row">
            <div class="col-12">
                <div class="content">
                    <div class="topbar-left d-none d-sm-block">
                        <div class="top-socials">
                            <a href="{{ theme_option('facebook') }}" target="_blank" title="Facebook" class="fab fa-facebook-f"></a>
                            <a href="{{ theme_option('instagram') }}" target="_blank" title="Instagram" class="fab fa-instagram"></a>

                        </div>
                        <span class="line"></span>
                        <a href="mailto:{{ theme_option('email') }}">{{ theme_option('email') }}</a>
                    </div>
                    <div class="topbar-right">
                        {!! Theme::partial('language-switcher') !!}
                        @if (is_plugin_active('vendor'))
                            <ul class="topbar-items">
                                @if (Auth::guard('vendor')->check())
                                    <li class="login-item"><a href="{{ route('public.vendor.dashboard') }}" rel="nofollow"><i class="fas fa-user"></i> <span>{{ Auth::guard('vendor')->user()->getFullName() }}</span></a></li>
                                    <li class="login-item"><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" rel="nofollow"><i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}</a></li>
                                @else
                                    <li class="login-item">
                                        <a href="{{ route('public.vendor.login') }}"><i class="fas fa-sign-in-alt"></i>  {{ __('Login') }}</a>
                                    </li>
                                    <li class="login-item">
                                        <a href="{{ route('public.vendor.register') }}"><i class="fas fa-user-plus"></i> {{ __('Register') }}</a>
                                    </li>
                                @endif
                            </ul>
                            @endif
                            @auth('vendor')
                                <form id="logout-form" action="{{ route('public.vendor.logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<header class="topmenu bg-light">
    <div class="container-fluid w90">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    @if (theme_option('logo'))
                        <a class="navbar-brand" href="{{ route('public.single') }}">
                            <img src="{{ get_image_url(theme_option('logo')) }}"
                                 class="logo" height="40" alt="{{ theme_option('site_name') }}">
                        </a>
                    @endif
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="fas fa-bars"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        {!!
                            Menu::renderMenuLocation('main-menu', [
                                'options' => ['class' => 'navbar-nav justify-content-end'],
                                'view'    => 'main-menu',
                            ])
                        !!}
                        @if (is_plugin_active('vendor'))
                            <a class="btn btn-primary add-property"
                               href="{{ route('public.vendor.properties.index') }}">
                                <i class="fas fa-plus-circle"></i> {{ __('Add Property') }}
                            </a>
                        @endif
                    </div>
                </nav>
            </div>
        </div>
    </div>
    @if (url()->current() == route('public.single'))

            <div id="carouselExampleIndicators" class="home_banner carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="home_banner carousel-item active">
                        <img class="d-block w-100 h-100" src="{{asset('storage/banner/slide.jpg') }}" alt="First slide">


                    </div>
                    <div class="home_banner carousel-item">
                        <img class="d-block w-100 h-100"  src="{{asset('storage/banner/banner.jpg') }}" >

                    </div>
                    <div class="home_banner carousel-item">
                        <img class="d-block w-100 h-100" src="{{asset('storage/banner/slider.jpg')}}" alt="Third slide">

                    </div>
                </div>
                 <div class="topsearch " >
                    @if (theme_option('home_banner_description'))<h1 class="text-center text-white mb-4"
                                                                     style="font-size: 36px; font-weight: 600;">{{ theme_option('home_banner_description') }}</h1>@endif
                    <form action="{{ route('public.projects') }}" method="GET" id="frmhomesearch">
                        <div class="typesearch" id="hometypesearch">
                            <a href="javascript:void(0)" class="active" rel="project"
                               data-url="{{ route('public.projects') }}">{{ __('Projects') }}</a>
                            <a href="javascript:void(0)" rel="sale"
                               data-url="{{ route('public.properties') }}">{{ __('Sale') }}</a>
                            <a href="javascript:void(0)" rel="rent"
                               data-url="{{ route('public.properties') }}">{{ __('Rent') }}</a>
                        </div>
                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><img
                                    src="{{ Theme::asset()->url('images/search_icon.png') }}" alt="search"></span>
                            </div>
                            <input type="hidden" name="type" value="project" id="txttypesearch">
                            <input type="text" class="form-control" name="k"
                                   placeholder="{{ __('Enter keyword...') }}" id="txtkey" autocomplete="off">
                            <div class="input-group-append">
                                <button class="btn btn-orange" type="submit">{{ __('Search') }}</button>
                            </div>
                        </div>
                        <div class="listsuggest stylebar">

                        </div>
                    </form>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>

            </div>



    @endif
</header>
