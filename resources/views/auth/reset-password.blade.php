@extends('layout.auth-master')

@section('Content')
     <!-- Reset Password -->
    <div class="login-wrapper">
        <div class="login-inner">
            <div class="title">
                <div class="logo">
                    <img src="assets/images/logo.svg" alt="logo">
                </div>
                <h1>نام سایت شما</h1>
            </div>

            <div class="card mb-3">
                <div class="card-body">
                    <h4 class="form-title mb-3">دریافت کلید بازیابی</h4>
                    <div class="forms-group">
                        <div class="input-group">
                            <input type="text" class="input" placeholder="آدرس ایمیل / شماره موبایل / کد ملی">
                        </div>
                        <div class="login-button">
                            <a href="#" class="btn btn-primary">ارسال کلید بازیابی</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-body">
                    <h4 class="form-title mb-1">تغییر کلمه عبور با استفاده از کلید بازیابی</h4>
                    <p class="text-muted mb-3">در صورتی که کلید بازیابی را دریافت نموده‌اید، با استفاده از فرم زیر می‌توانید کلمه عبور خود را تغییر دهید</p>

                    <div class="forms-group">
                        <div class="input-group">
                            <input type="text" class="input" placeholder="آدرس ایمیل / شماره موبایل / کد ملی">
                        </div>
                        <div class="input-group">
                            <input type="text" class="input" placeholder="کلید بازیابی">
                        </div>
                        <div class="input-group">
                            <input type="password" class="input" placeholder="کلمه عبور جدید">
                        </div>
                        <div class="input-group">
                            <input type="password" class="input" placeholder="تکرار کلمه عبور جدید">
                        </div>
                    </div>

                    <div class="login-button">
                        <a href="#" class="btn btn-primary">تغییر کلمه عبور</a>
                    </div>
                </div>
            </div>

            <div class="auth-links mt-3">
                <span>اکانت ندارید؟ <a href="/register">ثبت نام کنید</a></span>
                <br>
                <span>کلمه عبور خود را بخاطر دارید؟ <a href="/login">وارد شوید</a></span>
            </div>
        </div>
    </div>
@endsection