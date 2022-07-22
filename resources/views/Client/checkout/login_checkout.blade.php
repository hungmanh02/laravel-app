@extends('Client.layouts.app')
@section('title','Login')
@section('content')

<!--form-->
<section id="form">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Đăng nhập tài khoản</h2>
                    <form action="{{ route('login-customer') }}" method="POST">
                        @csrf
                        <input type="email" placeholder="tài khoản" name="customer_email"/>
                        <input type="password" placeholder="Mật khẩu" name="customer_password"/>
                        <span>
                            <input type="checkbox" class="checkbox"> 
                            Ghi nhớ đăng nhập
                        </span>
                        <button type="submit" class="btn btn-default">Đăng nhập</button>
                    </form>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">Hoặc</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2>Đăng ký tài khoản</h2>
                    <form action="{{ route('add-customer') }}" method="POST">
                        @csrf
                        <input type="text" placeholder="Tên" name="name"/>
                        <input type="email" placeholder="Địa chỉ Email" name="email"/>
                        <input type="password" placeholder="Mật khẩu" name="password"/>
                        {{-- <input type="password_confirm" placeholder="Nhập mật khẩu"/> --}}
                        <button type="submit" class="btn btn-default">Đăng ký</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section>
<!--/form-->

@endsection