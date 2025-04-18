@php
    // $logos = asset(Storage::url('uploads/logo/'));
    
    $company_favicon = \App\Models\Utility::getValByName('company_favicon');
    $footer_text = \App\Models\Utility::getValByName('footer_text');
    
    // $logo = asset(Storage::url('uploads/logo/'));
    $logos = \App\Models\Utility::get_file('uploads/logo');
    $SITE_RTL = \App\Models\Utility::getValByName('SITE_RTL');
    $company_logo = \App\Models\Utility::GetLogo();
    $company_logo_landing = \App\Models\Utility::GetLogolanding();
    $setting = \App\Models\Utility::colorset();
    $color = !empty($setting['theme_color']) ? $setting['theme_color'] : 'theme-3';
    
    $getseo = App\Models\Utility::getSeoSetting();
    $metatitle = isset($getseo['meta_title']) ? $getseo['meta_title'] : '';
    $metadesc = isset($getseo['meta_description']) ? $getseo['meta_description'] : '';
    $meta_image = \App\Models\Utility::get_file('uploads/meta/');
    $meta_logo = isset($getseo['meta_image']) ? $getseo['meta_image'] : '';
    $enable_cookie = \App\Models\Utility::getCookieSetting('enable_cookie');
@endphp

<!DOCTYPE html>
<html lang="en">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ $SITE_RTL == 'on' ? 'rtl' : '' }}">

<head>
    {{-- <title>{{ __('HRMGO SaaS') }}</title> --}}
    <title>
        {{ \App\Models\Utility::getValByName('title_text') ? \App\Models\Utility::getValByName('title_text') : config('app.name', 'HRMGO SaaS') }}
    </title>

    <!-- SEO META -->
    <meta name="title" content="{{ $metatitle }}">
    <meta name="description" content="{{ $metadesc }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ env('APP_URL') }}">
    <meta property="og:title" content="{{ $metatitle }}">
    <meta property="og:description" content="{{ $metadesc }}">
    <meta property="og:image"
        content="{{ isset($meta_logo) && !empty(asset('storage/uploads/meta/' . $meta_logo)) ? asset('storage/uploads/meta/' . $meta_logo) : 'hrmgo.png' }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ env('APP_URL') }}">
    <meta property="twitter:title" content="{{ $metatitle }}">
    <meta property="twitter:description" content="{{ $metadesc }}">
    <meta property="twitter:image"
        content="{{ isset($meta_logo) && !empty(asset('storage/uploads/meta/' . $meta_logo)) ? asset('storage/uploads/meta/' . $meta_logo) : 'hrmgo.png' }}">


    <!-- Meta -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Dashboard Template Description" />
    <meta name="keywords" content="Dashboard Template" />
    <meta name="author" content="Rajodiya Infotech" />

    <!-- Favicon icon -->
    <link rel="icon" href="{{ $logos . '/favicon.png' }}" type="image/x-icon" />

    <link rel="stylesheet" href="{{ asset('assets/css/plugins/animate.min.css') }}" />
    <!-- font css -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/material.css') }}">



    @if ($setting['SITE_RTL'] == 'on')
        <link rel="stylesheet" href="{{ asset('assets/css/style-rtl.css') }}">
    @endif
    @if ($setting['cust_darklayout'] == 'on')
        <link rel="stylesheet" href="{{ asset('assets/css/style-dark.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="main-style-link">
    @endif

    @if (isset($setting['cust_darklayout']) && $setting['cust_darklayout'] == 'on')
        <link rel="stylesheet" href="{{ asset('assets/css/custom-dark.css') }}">
    @endif

    <link rel="stylesheet" href="{{ asset('assets/css/customizer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}" />


</head>
<body class="{{ $color }}">
    <!-- [ Nav ] start -->
    <nav class="navbar navbar-expand-md navbar-dark default top-nav-collapse">
        <div class="container">
            <a class="navbar-brand bg-transparent" href="#">
                {{-- <img src="{{$logo}}" alt="logo" /> --}}
                <img src="{{ $logos . '/' . '2_light_logo.png' }}" alt="{{ config('app.name', 'HRMGO') }}"
                    alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01" style="flex-grow: 0;">
                <ul class="navbar-nav align-items-center ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#layouts">Layouts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimonial">Testimonial</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#pricing">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#faq">Faq</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-light ms-2 me-1" href="{{ route('login') }}">Login</a>
                    </li>
                    @if (\App\Models\Utility::getValByName('disable_signup_button') == 'on')
                        <li class="nav-item">
                            <a class="btn btn-light ms-2 me-1"
                                href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <!-- [ Nav ] start -->
    <!-- [ Header ] start -->
    <header id="home" class="bg-primary">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-sm-5">
                    <h1 class="text-white mb-sm-4 wow animate__fadeInLeft" data-wow-delay="0.2s">
                        {{ __('EMS Saas') }}
                    </h1>
                    <h2 class="text-white mb-sm-4 wow animate__fadeInLeft" data-wow-delay="0.4s">
                        HRM and Payroll Tool
                    </h2>
                    <p class="mb-sm-4 wow animate__fadeInLeft" data-wow-delay="0.6s">
                        Use these awesome forms to login or create new account in your
                        project for free.
                    </p>
                    <div class="my-4 wow animate__fadeInLeft" data-wow-delay="0.8s">
                        <a href="{{ route('login') }}" class="btn btn-light me-2"><i
                                class="far fa-eye me-2"></i>Live
                            Demo</a>
                        <a href="https://codecanyon.net/item/hrmgo-saas-hrm-and-payroll-tool/25982934"
                            class="btn btn-outline-light" target="_blank"><i
                                class="fas fa-shopping-cart me-2"></i>Buy
                            now</a>
                    </div>
                </div>
                <div class="col-sm-5">
                    <img src="{{ asset('assets/images/front/header-mokeup.svg') }}" alt="Datta Able Admin Template"
                        class="img-fluid header-img wow animate__fadeInRight" data-wow-delay="0.2s" />
                </div>
            </div>
        </div>
    </header>
    <!-- [ Header ] End -->
    <!-- [ client ] Start -->
    <section id="dashboard" class="theme-alt-bg dashboard-block">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-9 title">
                    <h2><span>Happy clients use Dashboard</span></h2>
                </div>
            </div>
            <div class="row align-items-center justify-content-center mb-5 mobile-screen">
                <div class="col-auto">
                    <div class="wow animate__fadeInRight mobile-widget" data-wow-delay="0.2s">
                        {{-- <img src="{{ asset(Storage::url('uploads/logo/logo-dark.png')) }}" alt=""
                            class="img-fluid" /> --}}
                        <img src="{{ $logos . '/' . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo-dark.png') }}"
                            alt="" class="img-fluid" />
                    </div>
                </div>
                <div class="col-auto">
                    <div class="wow animate__fadeInRight mobile-widget" data-wow-delay="0.4s">
                        {{-- <img src="{{ asset(Storage::url('uploads/logo/logo-dark.png')) }}" alt=""
                            class="img-fluid" /> --}}
                        <img src="{{ $logos . '/' . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo-dark.png') }}"
                            alt="" class="img-fluid" />
                    </div>
                </div>
                <div class="col-auto">
                    <div class="wow animate__fadeInRight mobile-widget" data-wow-delay="0.6s">
                        {{-- <img src="{{ asset(Storage::url('uploads/logo/logo-dark.png')) }}" alt=""
                            class="img-fluid" /> --}}
                        <img src="{{ $logos . '/' . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo-dark.png') }}"
                            alt="" class="img-fluid" />
                    </div>
                </div>
                <div class="col-auto">
                    <div class="wow animate__fadeInRight mobile-widget" data-wow-delay="0.8s">
                        {{-- <img src="{{ asset(Storage::url('uploads/logo/logo-dark.png')) }}" alt=""
                            class="img-fluid" /> --}}
                        <img src="{{ $logos . '/' . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo-dark.png') }}"
                            alt="" class="img-fluid" />
                    </div>
                </div>
                <div class="col-auto">
                    <div class="wow animate__fadeInRight mobile-widget" data-wow-delay="1s">
                        {{-- <img src="{{ asset(Storage::url('uploads/logo/logo-dark.png')) }}" alt=""
                            class="img-fluid" /> --}}
                        <img src="{{ $logos . '/' . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo-dark.png') }}"
                            alt="" class="img-fluid" />
                    </div>
                </div>
            </div>
            <img src="{{ asset('landing/hrmgo-saas-pic-1.png') }}" alt=""
                class="img-fluid img-dashboard wow animate__fadeInUp" data-wow-delay="0.2s"
                style="border-radius: 15px;" />
        </div>
    </section>
    <!-- [ client ] End -->
    <!-- [ dashboard ] start -->
    <section class="">
        <div class="container">
            <div class="row align-items-center justify-content-end mb-5">
                <div class="col-sm-4">
                    <h1 class="mb-sm-4 f-w-600 wow animate__fadeInLeft" data-wow-delay="0.2s">
                        HRMGo Saas
                    </h1>
                    <h2 class="mb-sm-4 wow animate__fadeInLeft" data-wow-delay="0.4s">
                        HRM and Payroll Tool
                    </h2>
                    <p class="mb-sm-4 wow animate__fadeInLeft" data-wow-delay="0.6s">
                        Use these awesome forms to login or create new account in your
                        project for free.
                    </p>
                    <div class="my-4 wow animate__fadeInLeft" data-wow-delay="0.8s">
                        <a href="#" class="btn btn-primary" target="_blank"><i
                                class="fas fa-shopping-cart me-2"></i>Buy
                            now</a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <img src="{{ asset('landing/hrmgo-saas-pic-1.png') }}" alt="Datta Able Admin Template"
                        class="img-fluid header-img wow animate__fadeInRight" data-wow-delay="0.2s" />
                </div>
            </div>
            <div class="row align-items-center justify-content-start">
                <div class="col-sm-6">
                    <img src="{{ asset('landing/hrmgo-saas-pic-1.png') }}" alt="Datta Able Admin Template"
                        class="img-fluid header-img wow animate__fadeInLeft" data-wow-delay="0.2s" />
                </div>
                <div class="col-sm-4">
                    <h1 class="mb-sm-4 f-w-600 wow animate__fadeInRight" data-wow-delay="0.2s">
                        HRMGo Saas
                    </h1>
                    <h2 class="mb-sm-4 wow animate__fadeInRight" data-wow-delay="0.4s">
                        HRM and Payroll Tool
                    </h2>
                    <p class="mb-sm-4 wow animate__fadeInRight" data-wow-delay="0.6s">
                        Use these awesome forms to login or create new account in your
                        project for free.
                    </p>
                    <div class="my-4 wow animate__fadeInRight" data-wow-delay="0.8s">
                        <a href="#" class="btn btn-primary" target="_blank"><i
                                class="fas fa-shopping-cart me-2"></i>Buy
                            now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- [ dashboard ] End -->
    <!-- [ feature ] start -->
    <section id="feature" class="feature">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-9 title">
                    <h2>
                        <span class="d-block mb-3">Features</span> All in one place HRMGo SaaS
                        system
                    </h2>
                    <p class="m-0">
                        Use these awesome forms to login or create new account in your
                        project for free.
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6">
                    <div class="card wow animate__fadeInUp" data-wow-delay="0.2s"
                        style="
                visibility: visible;
                animation-delay: 0.2s;
                animation-name: fadeInUp;
              ">
                        <div class="card-body">
                            <div class="theme-avtar bg-primary">
                                <i class="ti ti-home"></i>
                            </div>
                            <h6 class="text-muted mt-4">ABOUT</h6>
                            <h4 class="my-3 f-w-600">Feature</h4>
                            <p class="mb-0">
                                Use these awesome forms to login or create new account in your
                                project for free.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card wow animate__fadeInUp" data-wow-delay="0.4s"
                        style="
                visibility: visible;
                animation-delay: 0.2s;
                animation-name: fadeInUp;
              ">
                        <div class="card-body">
                            <div class="theme-avtar bg-success">
                                <i class="ti ti-user-plus"></i>
                            </div>
                            <h6 class="text-muted mt-4">ABOUT</h6>
                            <h4 class="my-3 f-w-600">Feature</h4>
                            <p class="mb-0">
                                Use these awesome forms to login or create new account in your
                                project for free.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card wow animate__fadeInUp" data-wow-delay="0.6s"
                        style="
                visibility: visible;
                animation-delay: 0.2s;
                animation-name: fadeInUp;
              ">
                        <div class="card-body">
                            <div class="theme-avtar bg-warning">
                                <i class="ti ti-users"></i>
                            </div>
                            <h6 class="text-muted mt-4">ABOUT</h6>
                            <h4 class="my-3 f-w-600">Feature</h4>
                            <p class="mb-0">
                                Use these awesome forms to login or create new account in your
                                project for free.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card wow animate__fadeInUp" data-wow-delay="0.8s"
                        style="
                visibility: visible;
                animation-delay: 0.2s;
                animation-name: fadeInUp;
              ">
                        <div class="card-body">
                            <div class="theme-avtar bg-danger">
                                <i class="ti ti-report-money"></i>
                            </div>
                            <h6 class="text-muted mt-4">ABOUT</h6>
                            <h4 class="my-3 f-w-600">Feature</h4>
                            <p class="mb-0">
                                Use these awesome forms to login or create new account in your
                                project for free.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center pt-sm-5 feature-mobile-screen">
                <button class="btn px-sm-5 btn-primary me-sm-3">Buy Now</button>
                <button class="btn px-sm-5 btn-outline-primary">
                    View documentation
                </button>
            </div>
        </div>
    </section>
    <!-- [ feature ] End -->
    <!-- [ dashboard ] start -->
    <section class="">
        <div class="container">
            <div class="row align-items-center justify-content-end mb-5">
                <div class="col-sm-4">
                    <h1 class="mb-sm-4 f-w-600 wow animate__fadeInLeft" data-wow-delay="0.2s">
                        HRMGo Saas
                    </h1>
                    <h2 class="mb-sm-4 wow animate__fadeInLeft" data-wow-delay="0.4s">
                        HRM and Payroll Tool
                    </h2>
                    <p class="mb-sm-4 wow animate__fadeInLeft" data-wow-delay="0.6s">
                        Use these awesome forms to login or create new account in your
                        project for free.
                    </p>
                    <div class="my-4 wow animate__fadeInLeft" data-wow-delay="0.8s">
                        <a href="#" class="btn btn-primary" target="_blank"><i
                                class="fas fa-shopping-cart me-2"></i>Buy now</a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <img src="{{ asset('assets/images/front/img-crm-dash-3.svg') }}" alt="Datta Able Admin Template"
                        class="img-fluid header-img wow animate__fadeInRight" data-wow-delay="0.2s" />
                </div>
            </div>
            <div class="row align-items-center justify-content-start">
                <div class="col-sm-6">
                    <img src="{{ asset('assets/images/front/img-crm-dash-4.svg') }}" alt="Datta Able Admin Template"
                        class="img-fluid header-img wow animate__fadeInLeft" data-wow-delay="0.2s" />
                </div>
                <div class="col-sm-4">
                    <h1 class="mb-sm-4 f-w-600 wow animate__fadeInRight" data-wow-delay="0.2s">
                        HRMGo Saas
                    </h1>
                    <h2 class="mb-sm-4 wow animate__fadeInRight" data-wow-delay="0.4s">
                        HRM and Payroll Tool
                    </h2>
                    <p class="mb-sm-4 wow animate__fadeInRight" data-wow-delay="0.6s">
                        Use these awesome forms to login or create new account in your
                        project for free.
                    </p>
                    <div class="my-4 wow animate__fadeInRight" data-wow-delay="0.8s">
                        <a href="#" class="btn btn-primary" target="_blank"><i
                                class="fas fa-shopping-cart me-2"></i>Buy now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- [ dashboard ] End -->
    <!-- [ price ] start -->
    <section id="price" class="price-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-9 title">
                    <h2>
                        <span class="d-block mb-3">Price</span> All in one place HRMGo SaaS
                        system
                    </h2>
                    <p class="m-0">
                        Use these awesome forms to login or create new account in your
                        project for free.
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="card price-card price-1 wow animate__fadeInUp" data-wow-delay="0.2s"
                        style="
                visibility: visible;
                animation-delay: 0.2s;
                animation-name: fadeInUp;
              ">
                        <div class="card-body">
                            <span class="price-badge bg-primary">STARTER</span>
                            <span class="mb-4 f-w-600 p-price">$59<small class="text-sm">/month</small></span>
                            <p class="mb-0">
                                You have Free Unlimited Updates and <br />
                                Premium Support on each package.
                            </p>
                            <ul class="list-unstyled my-5">
                                <li>
                                    <span class="theme-avtar">
                                        <i class="text-primary ti ti-circle-plus"></i></span>
                                    2 team members
                                </li>
                                <li>
                                    <span class="theme-avtar">
                                        <i class="text-primary ti ti-circle-plus"></i></span>
                                    20GB Cloud storage
                                </li>
                                <li>
                                    <span class="theme-avtar">
                                        <i class="text-primary ti ti-circle-plus"></i></span>
                                    Integration help
                                </li>
                            </ul>
                            <div class="d-grid text-center">
                                <button
                                    class="btn mb-3 btn-primary d-flex justify-content-center align-items-center mx-sm-5">
                                    Start with Standard plan
                                    <i class="ti ti-chevron-right ms-2"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card price-card price-2 bg-primary wow animate__fadeInUp" data-wow-delay="0.4s"
                        style="
                visibility: visible;
                animation-delay: 0.2s;
                animation-name: fadeInUp;
              ">
                        <div class="card-body">
                            <span class="price-badge">STARTER</span>
                            <span class="mb-4 f-w-600 p-price">$59<small class="text-sm">/month</small></span>
                            <p class="mb-0">
                                You have Free Unlimited Updates and <br />
                                Premium Support on each package.
                            </p>
                            <ul class="list-unstyled my-5">
                                <li>
                                    <span class="theme-avtar">
                                        <i class="text-primary ti ti-circle-plus"></i></span>
                                    2 team members
                                </li>
                                <li>
                                    <span class="theme-avtar">
                                        <i class="text-primary ti ti-circle-plus"></i></span>
                                    20GB Cloud storage
                                </li>
                                <li>
                                    <span class="theme-avtar">
                                        <i class="text-primary ti ti-circle-plus"></i></span>
                                    Integration help
                                </li>
                                <li>
                                    <span class="theme-avtar">
                                        <i class="text-primary ti ti-circle-plus"></i></span>
                                    Sketch Files
                                </li>
                            </ul>
                            <div class="d-grid text-center">
                                <button
                                    class="btn mb-3 btn-light d-flex justify-content-center align-items-center mx-sm-5">
                                    Start with Standard plan
                                    <i class="ti ti-chevron-right ms-2"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card price-card price-3 wow animate__fadeInUp" data-wow-delay="0.6s"
                        style="
                visibility: visible;
                animation-delay: 0.2s;
                animation-name: fadeInUp;
              ">
                        <div class="card-body">
                            <span class="price-badge bg-primary">STARTER</span>
                            <span class="mb-4 f-w-600 p-price">$119<small class="text-sm">/month</small></span>
                            <p class="mb-0">
                                You have Free Unlimited Updates and <br />
                                Premium Support on each package.
                            </p>
                            <ul class="list-unstyled my-5">
                                <li>
                                    <span class="theme-avtar">
                                        <i class="text-primary ti ti-circle-plus"></i></span>
                                    2 team members
                                </li>
                                <li>
                                    <span class="theme-avtar">
                                        <i class="text-primary ti ti-circle-plus"></i></span>
                                    20GB Cloud storage
                                </li>
                                <li>
                                    <span class="theme-avtar">
                                        <i class="text-primary ti ti-circle-plus"></i></span>
                                    Integration help
                                </li>
                                <li>
                                    <span class="theme-avtar">
                                        <i class="text-primary ti ti-circle-plus"></i></span>
                                    2 team members
                                </li>
                                <li>
                                    <span class="theme-avtar">
                                        <i class="text-primary ti ti-circle-plus"></i></span>
                                    20GB Cloud storage
                                </li>
                                <li>
                                    <span class="theme-avtar">
                                        <i class="text-primary ti ti-circle-plus"></i></span>
                                    Integration help
                                </li>
                            </ul>
                            <div class="d-grid text-center">
                                <button
                                    class="btn mb-3 btn-primary d-flex justify-content-center align-items-center mx-sm-5">
                                    Start with Standard plan
                                    <i class="ti ti-chevron-right ms-2"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- [ price ] End -->
    <!-- [ faq ] start -->
    <section class="faq">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-9 title">
                    <h2><span>Frequently Asked Questions</span></h2>
                    <p class="m-0">
                        Use these awesome forms to login or create new account in your
                        project for free.
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-10 col-xxl-8">
                    <div class="accordion accordion-flush" id="accordionExample">
                        <div class="accordion-item card">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <span class="d-flex align-items-center">
                                        <i class="ti ti-info-circle text-primary"></i> How do I
                                        order?
                                    </span>
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show"
                                aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>This is the first item's accordion body.</strong> It
                                    is shown by default, until the collapse plugin adds the
                                    appropriate classes that we use to style each element. These
                                    classes control the overall appearance, as well as the
                                    showing and hiding via CSS transitions. You can modify any
                                    of this with custom CSS or overriding our default variables.
                                    It's also worth noting that just about any HTML can go
                                    within the <code>.accordion-body</code>, though the
                                    transition does limit overflow.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item card">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <span class="d-flex align-items-center">
                                        <i class="ti ti-info-circle text-primary"></i> How do I
                                        order?
                                    </span>
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>This is the second item's accordion body.</strong>
                                    It is hidden by default, until the collapse plugin adds the
                                    appropriate classes that we use to style each element. These
                                    classes control the overall appearance, as well as the
                                    showing and hiding via CSS transitions. You can modify any
                                    of this with custom CSS or overriding our default variables.
                                    It's also worth noting that just about any HTML can go
                                    within the <code>.accordion-body</code>, though the
                                    transition does limit overflow.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item card">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                    <span class="d-flex align-items-center">
                                        <i class="ti ti-info-circle text-primary"></i> How do I
                                        order?
                                    </span>
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse"
                                aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>This is the third item's accordion body.</strong> It
                                    is hidden by default, until the collapse plugin adds the
                                    appropriate classes that we use to style each element. These
                                    classes control the overall appearance, as well as the
                                    showing and hiding via CSS transitions. You can modify any
                                    of this with custom CSS or overriding our default variables.
                                    It's also worth noting that just about any HTML can go
                                    within the <code>.accordion-body</code>, though the
                                    transition does limit overflow.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- [ faq ] End -->
    <!-- [ dashboard ] start -->
    <section class="side-feature">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                    <h1 class="mb-sm-4 f-w-600 wow animate__fadeInLeft" data-wow-delay="0.2s">
                        HRMGo Saas
                    </h1>
                    <h2 class="mb-sm-4 wow animate__fadeInLeft" data-wow-delay="0.4s">
                        HRM and Payroll Tool
                    </h2>
                    <p class="mb-sm-4 wow animate__fadeInLeft" data-wow-delay="0.6s">
                        Use these awesome forms to login or create new account in your
                        project for free.
                    </p>
                    <div class="my-4 wow animate__fadeInLeft" data-wow-delay="0.8s">
                        <a href="#" class="btn btn-primary" target="_blank"><i
                                class="fas fa-shopping-cart me-2"></i>Buy now</a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                    <div class="row feature-img-row m-auto">
                        <div class="col-lg-3 col-sm-6">
                            <img src="{{ asset('landing/hrmgo-saas-pic-1.png') }}"
                                class="img-fluid header-img wow animate__fadeInRight mt-5" data-wow-delay="0.2s"
                                alt="Admin" />
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <img src="{{ asset('landing/hrmgo-saas-pic-2.png') }}"
                                class="img-fluid header-img wow animate__fadeInRight mt-5" data-wow-delay="0.4s"
                                alt="Admin" />
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <img src="{{ asset('landing/hrmgo-saas-pic-6.png') }}"
                                class="img-fluid header-img wow animate__fadeInRight mt-5" data-wow-delay="0.6s"
                                alt="Admin" />
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <img src="{{ asset('landing/hrmgo-saas-pic-3.png') }}"
                                class="img-fluid header-img wow animate__fadeInRight mt-5" data-wow-delay="0.8s"
                                alt="Admin" />
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <img src="{{ asset('landing/hrmgo-saas-pic-11.png') }}"
                                class="img-fluid header-img wow animate__fadeInRight mt-5" data-wow-delay="0.3s"
                                alt="Admin" />
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <img src="{{ asset('landing/hrmgo-saas-pic-12.png') }}"
                                class="img-fluid header-img wow animate__fadeInRight mt-5" data-wow-delay="0.5s"
                                alt="Admin" />
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <img src="{{ asset('landing/hrmgo-saas-pic-10.png') }}"
                                class="img-fluid header-img wow animate__fadeInRight mt-5" data-wow-delay="0.7s"
                                alt="Admin" />
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <img src="{{ asset('landing/hrmgo-saas-pic-14.png') }}"
                                class="img-fluid header-img wow animate__fadeInRight mt-5" data-wow-delay="0.9s"
                                alt="Admin" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- [ dashboard ] End -->

    </section>
    <section class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    {{-- <img src="{{ asset(Storage::url('uploads/logo/logo-dark.png')) }}" alt="logo" /> --}}
                    <img src="{{ $logos . '/' . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo-dark.png') }}"
                        alt="" class="img-fluid" />
                </div>
                <div class="col-lg-6 col-sm-12 text-end">

                    {{-- <p class="text-body"> {{ __('Copyright') }} &copy;
                        {{ \App\Models\Utility::getValByName('footer_text') ? \App\Models\Utility::getValByName('footer_text') : config('app.name', 'HRMGO') }}
                        {{ date('Y') }} </p> --}}
                    <p class="text-body">&copy;{{ __('Copyright') }}
                        {{ \App\Models\Utility::getValByName('footer_text') ? \App\Models\Utility::getValByName('footer_text') : config('app.name', 'HRMGo SaaS') }}
                        {{ date('Y') }} | Design By HRMGo </p>
                </div>
            </div>
        </div>

    </section>
    <!-- [ dashboard ] End -->
    <!-- Required Js -->
    <script src="{{ asset('assets/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/wow.min.js') }}"></script>
    <script>
        // Start [ Menu hide/show on scroll ]
        let ost = 0;
        document.addEventListener("scroll", function() {
            let cOst = document.documentElement.scrollTop;
            if (cOst == 0) {
                document.querySelector(".navbar").classList.add("top-nav-collapse");
            } else if (cOst > ost) {
                document.querySelector(".navbar").classList.add("top-nav-collapse");
                document.querySelector(".navbar").classList.remove("default");
            } else {
                document.querySelector(".navbar").classList.add("default");
                document
                    .querySelector(".navbar")
                    .classList.remove("top-nav-collapse");
            }
            ost = cOst;
        });
        // End [ Menu hide/show on scroll ]
        var wow = new WOW({
            animateClass: "animate__animated", // animation css class (default is animated)
        });
        wow.init();
        var scrollSpy = new bootstrap.ScrollSpy(document.body, {
            target: "#navbar-example",
        });
    </script>

    @stack('custom-scripts')
    @if ($enable_cookie['enable_cookie'] == 'on')
        @include('layouts.cookie_consent')
    @endif

</body>

</html>
