@extends('layout.master')

@section('Page_Title')
    ویرایش کاربر
@endsection

@section('Content')
    <div class="main-header">
        <div class="inner">
            <div class="title">
                <h1><i class="fi fi-rs-edit"></i>ویرایش کاربر</h1>
                <div class="breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb-list mb-0">
                            <li class="breadcrumb-item"><a href="/dashboard">داشبورد</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.users.index') }}">کاربران</a></li>
                            <li class="breadcrumb-item active" aria-current="page">ویرایش</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="main-inner">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{ route('dashboard.users.update', $user) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                 <div class="input-group no-icon"><label>نام</label><input name="name"
                                                                                           value="{{ old('name', $user->name) }}"
                                                                                           class="input">@error('name')<div class="text-alert error">{{ $message }}</div>@enderror</div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                 <div class="input-group no-icon"><label>موبایل</label><input name="phone"
                                                                                              value="{{ old('phone', $user->phone) }}"
                                                                                              class="input" required>@error('phone')<div class="text-alert error">{{ $message }}</div>@enderror
                                 </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                 <div class="input-group no-icon"><label>ایمیل</label><input name="email"
                                                                                             value="{{ old('email', $user->email) }}"
                                                                                             class="input">@error('email')<div class="text-alert error">{{ $message }}</div>@enderror</div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                 <div class="input-group no-icon"><label>رمز عبور (اختیاری)</label><input type="password"
                                                                                                          name="password"
                                                                                                          class="input">@error('password')<div class="text-alert error">{{ $message }}</div>@enderror
                                 </div>
                            </div>
                        </div>
                        <div class="form-actions" style="justify-content:flex-end; gap:10px;">
                            <a href="{{ route('dashboard.users.index') }}" class="btn btn-primary-outline icon-right"><i
                                    class="fi fi-rs-cross"></i>انصراف</a>
                            <button class="btn btn-primary icon-right"><i class="fi fi-rs-check"></i>ثبت تغییرات
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


