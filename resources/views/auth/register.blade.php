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

            <form method="post" action="{{ url('/register') }}">
            @csrf
            <div class="forms-group">
                <div class="input-group">
                    <input type="text" name="name" class="input" placeholder="نام" value="{{ old('name') }}">
                    @error('name')<div class="text-alert error">{{ $message }}</div>@enderror
                </div>
                <div class="input-group">
                    <input type="text" name="phone" class="input" placeholder="شماره موبایل" value="{{ old('phone') }}" required>
                    @error('phone')<div class="text-alert error">{{ $message }}</div>@enderror
                </div>
                <div class="input-group">
                    <input type="text" name="email" class="input" placeholder="آدرس ایمیل" value="{{ old('email') }}">
                    @error('email')<div class="text-alert error">{{ $message }}</div>@enderror
                </div>
                <div class="input-group">
                    <input type="password" name="password" class="input" placeholder="کلمه عبور" required>
                    @error('password')<div class="text-alert error">{{ $message }}</div>@enderror
                </div>
                <div class="input-group">
                    <input type="password" name="password_confirmation" class="input" placeholder="تکرار کلمه عبور" required>
                    @error('password_confirmation')<div class="text-alert error">{{ $message }}</div>@enderror
                </div>

                <div class="input-group" style="display:flex;align-items:center;gap:8px;">
                    <input type="checkbox" id="accept_terms" required>
                    <label for="accept_terms" style="margin:0;">
                        کلیه <a href="#">شرایط و قوانین</a> را مطالعه نموده و می‌پذیرم.
                    </label>
                </div>
            </div>

            <div class="login-button">
                <button class="btn btn-primary">ثبت اطلاعات و عضویت</button>
            </div>

            <div class="auth-links mt-3">
                <span>قبلاً ثبت نام کرده اید ؟ <a href="/login">وارد شوید</a></span>
            </div>
            </form>
        </div>
    </div>
@endsection
