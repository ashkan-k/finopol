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
            <form method="post" action="{{ url('/login') }}">
                @csrf
                <div class="row">
                <div class="forms-group">
                    <div class="input-group">
                        <label>شماره موبایل</label>
                        <input name="phone" value="{{ old('phone') }}" type="text" class="input" required>
                        <div class="icon"><i class="fi fi-rs-user"></i></div>
                        @error('phone')<div class="text-alert error">{{ $message }}</div>@enderror
                    </div>
                    <div class="input-group">
                        <label>کلمه عبور</label>
                        <input name="password" type="password" class="input" required>
                        <div class="icon"><i class="fi fi-rs-lock"></i></div>
                        @error('password')<div class="text-alert error">{{ $message }}</div>@enderror
                    </div>
                </div>
            </div>
            <div class="login-button">
                <button class="btn btn-primary">ورود</button>
            </div>
            </form>

            <div class="auth-links mt-3">
                <span>اکانت ندارید؟ <a href="/register">ثبت نام کنید</a></span>
                <br>
                <span>کلمه عبور خود را فراموش کرده‌اید ؟  <a href="/reset-password">بازیابی کلمه عبور</a></span>
            </div>
        </div>
    </div>
@endsection