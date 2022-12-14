@extends('web.layout.layout')
@section('content')
<!--form-->
<div class="form">
    <div class="container">
        <div class="path">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page">تسجيل الدخول</li>
                </ol>
            </nav>
        </div>
        <div class="signin-form">
            <form action="{{ route('client.handleLogin') }}" method="post">
                @csrf
                @include('inc.errors')
                <div class="logo">
                    <img src={{ asset('img/logo.png') }}>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="الجوال" name="phone">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="كلمة المرور" name="password">
                </div>
                <div class="row options">
                    <div class="col-md-6 remember">
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remmember_me">
                            <label class="form-check-label" for="exampleCheck1">تذكرنى</label>
                        </div>
                    </div>
                    <div class="col-md-6 forgot">
                        <img style="width:20px;height:25px" src={{ asset('img\complain.png') }}>
                        <a href="#">هل نسيت كلمة المرور</a>
                    </div>
                </div>
                <div class="row buttons">
                    <div class="col-md-6 right">
                        <button type="submit" class="btn btn-info">دخول</Button>
                    </div>
                    <div class="col-md-6 left">
                        <a href="{{ route('client.register') }}" class="btn btn-success">انشاء حساب جديد</a>
                    </div>
                </div>
            </form>
        </br></br></br></br></br></br></br></br></br>
        </div>
    </div>
</div>
@endsection
