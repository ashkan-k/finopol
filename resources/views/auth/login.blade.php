@extends('layout.auth-master')

@section('Content')
          <!-- Login -->
    <div class="login-wrapper">
        <div class="login-inner">
            <div class="title">
                <div class="logo">
                    <img src="assets/images/logo.svg" alt="logo">
                </div>
                <h1>ورود به پنل فینوپی</h1>
            </div>
            <div class="row">
                <div class="forms-group">
                    <div class="input-group">
                        <label>آدرس ایمیل / شماره موبایل / کد ملی</label>
                        <input type="text" class="input">
                        <div class="icon"><i class="fi fi-rs-user"></i></div>
                        <div class="text-alert error">نام کاربری اشتباه است</div>
                    </div>
                    <div class="input-group">
                        <label>کلمه عبور</label>
                        <input type="password" class="input">
                        <div class="icon"><i class="fi fi-rs-lock"></i></div>
                    </div>
                </div>
            </div>
            <span class="msg-content error text-center">نام کاربری یا رمز عبور اشتباه است</span>
            <span class="msg-content success">نام کاربری یا رمز عبور اشتباه است</span>
            <span class="msg-content info text-left">نام کاربری یا رمز عبور اشتباه است</span>
            <span class="msg-content warning text-center">نام کاربری یا رمز عبور اشتباه است</span>
            <div class="login-button">
                <a href="index.html" class="btn btn-primary">ورود</a>
            </div>

            <div class="auth-links mt-3">
                <span>اکانت ندارید؟ <a href="/register">ثبت نام کنید</a></span>
                <br>
                <span>کلمه عبور خود را فراموش کرده‌اید ؟  <a href="/reset-password">بازیابی کلمه عبور</a></span>
            </div>
        </div>
    </div>
@endsection