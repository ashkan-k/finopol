@extends('layout.auth-master')

@section('Content')
     <!-- Register -->
    <div class="login-wrapper">
        <div class="login-inner">
            <div class="title">
                <div class="logo">
                    <img src="assets/images/logo.svg" alt="logo">
                </div>
                <h1>ثبت نام کاربر جدید</h1>
                <p class="text-muted mt-1">به منظور عضویت، کلیه اطلاعات را به صورت صحیح وارد کنید</p>
            </div>

            <div class="forms-group">
                <div class="input-group">
                    <input type="text" class="input" placeholder="نام">
                </div>
                <div class="input-group">
                    <input type="text" class="input" placeholder="نام خانوادگی">
                </div>
                <div class="input-group">
                    <input type="text" class="input" placeholder="کد ملی">
                </div>
                <div class="input-group">
                    <input type="text" class="input" placeholder="شماره موبایل">
                </div>
                <div class="input-group">
                    <input type="text" class="input" placeholder="آدرس ایمیل">
                </div>
                <div class="input-group">
                    <input type="password" class="input" placeholder="کلمه عبور">
                </div>
                <div class="input-group">
                    <input type="password" class="input" placeholder="تکرار کلمه عبور">
                </div>
                <div class="input-group">
                    <input type="text" class="input" placeholder="کد معرف">
                </div>

                <div class="input-group" style="display:flex;align-items:center;gap:8px;">
                    <input type="checkbox" id="accept_terms">
                    <label for="accept_terms" style="margin:0;">
                        کلیه <a href="#">شرایط و قوانین</a> را مطالعه نموده و می‌پذیرم.
                    </label>
                </div>
            </div>

            <div class="login-button">
                <a href="#" class="btn btn-primary">ثبت اطلاعات و عضویت</a>
            </div>

            <div class="auth-links mt-3">
                <span>قبلاً ثبت نام کرده اید ؟ <a href="/login">وارد شوید</a></span>
            </div>
        </div>
    </div>
@endsection