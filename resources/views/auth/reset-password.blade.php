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
                    <h4 class="form-title mb-3">بازیابی رمز عبور</h4>
                    <form method="post" action="{{ url('/reset-password/request') }}">
                        @csrf
                        <div class="forms-group">
                            <div class="input-group">
                                <input type="text" name="phone" class="input" placeholder="شماره موبایل" value="{{ session('phone') ?? old('phone') }}">
                                @error('phone')<div class="text-alert error">{{ $message }}</div>@enderror
                            </div>
                            <div class="login-button">
                                <button class="btn btn-primary">ارسال کد تایید</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            @php($step = session('step'))
            @if($step==='verify')
                <div class="card mt-3"><div class="card-body">
                    <h4 class="form-title mb-1">تایید کد</h4>
                    <form method="post" action="{{ url('/reset-password/verify') }}">
                        @csrf
                        <input type="hidden" name="phone" value="{{ session('phone') }}">
                        <div class="forms-group">
                            <div class="input-group">
                                <input type="text" name="code" class="input" placeholder="کد ۶ رقمی">
                                @error('code')<div class="text-alert error">{{ $message }}</div>@enderror
                            </div>
                            <div class="login-button">
                                <button class="btn btn-primary">تایید</button>
                            </div>
                        </div>
                    </form>
                </div></div>
            @endif

            @if($step==='set_password')
                <div class="card mt-3"><div class="card-body">
                    <h4 class="form-title mb-1">تنظیم رمز جدید</h4>
                    <form method="post" action="{{ url('/reset-password/complete') }}">
                        @csrf
                        <input type="hidden" name="phone" value="{{ session('phone') }}">
                        <div class="forms-group">
                            <div class="input-group"><input type="password" name="password" class="input" placeholder="رمز جدید">@error('password')<div class="text-alert error">{{ $message }}</div>@enderror</div>
                            <div class="input-group"><input type="password" name="password_confirmation" class="input" placeholder="تکرار رمز جدید"></div>
                        </div>
                        <div class="login-button"><button class="btn btn-primary">تغییر رمز</button></div>
                    </form>
                </div></div>
            @endif

            <div class="auth-links mt-3">
                <span>اکانت ندارید؟ <a href="/register">ثبت نام کنید</a></span>
                <br>
                <span>کلمه عبور خود را بخاطر دارید؟ <a href="/login">وارد شوید</a></span>
            </div>
        </div>
    </div>
@endsection