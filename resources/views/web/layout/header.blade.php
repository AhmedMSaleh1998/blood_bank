<!doctype html>
<html lang="en" dir="rtl">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css" integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If" crossorigin="anonymous">

        <!--google fonts css-->
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">

        <!--font awesome css-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
        <link rel="icon" href={{ asset('img/Icon.png') }}>

        <!--owl-carousel css-->
        <link rel="stylesheet" href={{ asset('css/owl.carousel.min.css') }}>
        <link rel="stylesheet" href={{ asset('css/owl.theme.default.min.css') }}>

        <!--style css-->
        <link rel="stylesheet" href={{ asset('css/style.css') }}>

        <title>Blood Bank</title>
    </head>
    <body>
        <!--upper-bar-->
        <div class="upper-bar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="language">
                            <a href="index.html" class="ar active">عربى</a>
                            <a href="index-ltr.html" class="en inactive">EN</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="social">
                            <div class="icons">
                                <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="instagram"><i class="fab fa-instagram"></i></a>
                                <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="whatsapp"><i class="fab fa-whatsapp"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- not a member-->
                    <div class="col-lg-4">
                        <div class="info" dir="ltr">
                            <div class="phone">
                                <i class="fas fa-phone-alt"></i>
                                <p>+966506954964</p>
                            </div>
                            <div class="e-mail">
                                <i class="far fa-envelope"></i>
                                <p>name@name.com</p>
                            </div>
                        </div>
                        @auth('client')
                        <div class="member">
                            <p class="welcome">مرحباً بك</p>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                     {{ auth('client')->user()->name }}
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="index-1.html">
                                        <i class="fas fa-home"></i>
                                        الرئيسية
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="far fa-user"></i>
                                        معلوماتى
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="far fa-bell"></i>
                                        اعدادات الاشعارات
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="far fa-heart"></i>
                                        المفضلة
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="far fa-comments"></i>
                                        ابلاغ
                                    </a>
                                    <a class="dropdown-item" href="contact-us.html">
                                        <i class="fas fa-phone-alt"></i>
                                        تواصل معنا
                                    </a>
                                    <form action="{{ route('client.logout') }}" method="post">
                                        @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="fas fa-sign-out-alt"></i>
                                        تسجيل الخروج
                                    </button>
                                </form>
                                </div>
                            </div>
                        </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>


        <!--nav-->
        <div class="nav-bar">

            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <a class="navbar-brand" href="#">
                        <img src="{{ asset('img/logo.png') }}" class="d-inline-block align-top" alt=""/>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="index.html">الرئيسية <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">عن بنك الدم</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">المقالات</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="donation-requests.html">طلبات التبرع</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="who-are-us.html">من نحن</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact-us.html">اتصل بنا</a>
                            </li>
                        </ul>
                        @guest('client')
                        <div class="accounts">
                            <a href="{{ route('client.register') }}" class="create">إنشاء حساب جديد</a>
                            <a href="{{ route('client.login') }}" class="signin">الدخول</a>
                        </div>
                        @endguest
                        @auth('client')
                        <a href="#" class="donate">
                            <img src={{ asset('img/transfusion.svg') }}>
                            <p>طلب تبرع</p>
                        </a>
                        @endauth
                    </div>
                </div>
            </nav>
        </div>
