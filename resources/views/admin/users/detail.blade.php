@extends('layout.master')

@section('Page_Title')
    جزئیات کاربر
@endsection

@section('Content')
    <div class="main-header">
        <div class="inner">
            <div class="title">
                <h1><i class="fi fi-rs-user"></i>جزئیات کاربر</h1>
                <div class="breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb-list mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">داشبورد</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.users.index') }}">کاربران</a></li>
                            <li class="breadcrumb-item active" aria-current="page">جزئیات</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="main-inner">
        <div class="row">
            <!-- اطلاعات شخصی -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">اطلاعات شخصی</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>نام:</label>
                                    <p>{{ $user->name ?: '-' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>نام خانوادگی:</label>
                                    <p>{{ $user->last_name ?: '-' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>کد ملی:</label>
                                    <p>{{ $user->national_code ?: '-' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>تاریخ تولد:</label>
                                    <p>{{ $user->birth_date ? \Hekmatinasser\Verta\Verta::instance($user->birth_date)->format('Y/m/d') : '-' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>نام پدر:</label>
                                    <p>{{ $user->father_name ?: '-' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>شماره موبایل:</label>
                                    <p dir="ltr">{{ $user->phone ?: '-' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>ایمیل:</label>
                                    <p dir="ltr">{{ $user->email ?: '-' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>وب‌سایت:</label>
                                    <p dir="ltr">{{ $user->website ?: '-' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- اطلاعات بانکی -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">اطلاعات بانکی</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>شماره کارت:</label>
                                    <p dir="ltr">{{ $user->bank_card_number ?: '-' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>شماره حساب:</label>
                                    <p dir="ltr">{{ $user->bank_account_number ?: '-' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>نام بانک:</label>
                                    <p>{{ $user->bank_name ?: '-' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>شعبه:</label>
                                    <p>{{ $user->bank_branch ?: '-' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- اطلاعات آدرس -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">اطلاعات آدرس</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>آدرس:</label>
                                    <p>{{ $user->address ?: '-' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>کد پستی:</label>
                                    <p dir="ltr">{{ $user->postal_code ?: '-' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- اطلاعات تماس اضطراری -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">اطلاعات تماس اضطراری</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>نام:</label>
                                    <p>{{ $user->emergency_contact_name ?: '-' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>شماره تماس:</label>
                                    <p dir="ltr">{{ $user->emergency_contact_phone ?: '-' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- اطلاعات شرکتی -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">اطلاعات شرکتی</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>نام شرکت:</label>
                                    <p>{{ $user->company_name ?: '-' }}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>کد اقتصادی:</label>
                                    <p dir="ltr">{{ $user->economic_code ?: '-' }}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>شماره ثبت:</label>
                                    <p dir="ltr">{{ $user->registration_number ?: '-' }}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>تاریخ ثبت:</label>
                                    <p>{{ $user->registration_date ?: '-' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- وضعیت‌ها -->
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">وضعیت‌ها</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>وضعیت کاربر:</label>
                                    <p><span class="status color-{{ $user->get_status_class() }}">{{ $user->get_status() }}</span></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>وضعیت استعلام شاهکار:</label>
                                    <p><span class="status color-{{ $user->get_shahkar_inquiry_status_class() }}">{{ $user->get_shahkar_inquiry_status() }}</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- توضیحات -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">توضیحات</h5>
                    </div>
                    <div class="card-body">
                        <p>{{ $user->description ?: 'توضیحاتی وجود ندارد.' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- تصاویر -->
        @if($user->national_card_image || $user->image_of_the_statute || $user->newspaper_image || $user->CEO_id_card_image || $user->CEO_national_id_card_image || $user->cover_letter_image)
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">تصاویر</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @if($user->national_card_image)
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>تصویر کارت ملی:</label>
                                    <img src="{{ asset($user->national_card_image) }}" alt="کارت ملی" class="img-fluid" style="max-width: 200px;">
                                </div>
                            </div>
                            @endif
                            @if($user->image_of_the_statute)
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>تصویر اساسنامه:</label>
                                    <img src="{{ asset($user->image_of_the_statute) }}" alt="اساسنامه" class="img-fluid" style="max-width: 200px;">
                                </div>
                            </div>
                            @endif
                            @if($user->newspaper_image)
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>تصویر روزنامه:</label>
                                    <img src="{{ asset($user->newspaper_image) }}" alt="روزنامه" class="img-fluid" style="max-width: 200px;">
                                </div>
                            </div>
                            @endif
                            @if($user->CEO_id_card_image)
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>تصویر کارت مدیرعامل:</label>
                                    <img src="{{ asset($user->CEO_id_card_image) }}" alt="کارت مدیرعامل" class="img-fluid" style="max-width: 200px;">
                                </div>
                            </div>
                            @endif
                            @if($user->CEO_national_id_card_image)
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>تصویر کارت ملی مدیرعامل:</label>
                                    <img src="{{ asset($user->CEO_national_id_card_image) }}" alt="کارت ملی مدیرعامل" class="img-fluid" style="max-width: 200px;">
                                </div>
                            </div>
                            @endif
                            @if($user->cover_letter_image)
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>تصویر نامه معرفی:</label>
                                    <img src="{{ asset($user->cover_letter_image) }}" alt="نامه معرفی" class="img-fluid" style="max-width: 200px;">
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- فرم تغییر وضعیت -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card" style="border: 3px solid #e6e8ef; border-radius: 16px; box-shadow: 0 8px 25px rgba(14,79,199,0.1); background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);">
                    <div class="card-header" style="background: linear-gradient(135deg, #0e4fc7 0%, #3b82f6 50%, #60a5fa 100%); color: white; border-bottom: none; border-radius: 13px 13px 0 0; padding: 20px;">
                        <h5 class="card-title mb-0" style="font-weight: 700;"><i class="fi fi-rs-edit" style="margin-left: 8px;"></i> تغییر وضعیت کاربر</h5>
                    </div>
                    <div class="card-body" style="background: #fefefe; padding: 30px;">
                        <form method="post" action="{{ route('dashboard.users.update-status', $user) }}">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <label for="status" style="font-weight: 600; color: #0b1024; font-size: 15px; margin-bottom: 8px; display: block;">وضعیت کاربر:</label>
                                        <select name="status" id="status" class="select" style="width: 100%; padding: 14px; border: 2px solid #e2e8f0; border-radius: 10px; background: white; font-size: 14px; transition: all 0.3s ease; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
                                            @foreach(\App\Enums\EnumHelpers::$UserStatusEnum as $key => $value)
                                                <option value="{{ $key }}" {{ $user->status == $key ? 'selected' : '' }}>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <label for="shahkar_inquiry_status" style="font-weight: 600; color: #0b1024; font-size: 15px; margin-bottom: 8px; display: block;">وضعیت استعلام شاهکار:</label>
                                        <select name="shahkar_inquiry_status" id="shahkar_inquiry_status" class="select" style="width: 100%; padding: 14px; border: 2px solid #e2e8f0; border-radius: 10px; background: white; font-size: 14px; transition: all 0.3s ease; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
                                            @foreach(\App\Enums\EnumHelpers::$ShahkarInquiryStatusEnum as $key => $value)
                                                <option value="{{ $key }}" {{ $user->shahkar_inquiry_status == $key ? 'selected' : '' }}>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions mt-4 text-center">
                                <button type="submit" class="btn btn-primary" style="padding: 14px 50px; font-size: 16px; font-weight: 700; border-radius: 12px; box-shadow: 0 4px 15px rgba(14,79,199,0.4); background: linear-gradient(135deg, #0e4fc7, #3b82f6); border: none; transition: all 0.3s ease;">
                                    <i class="fi fi-rs-check" style="margin-left: 8px;"></i> بروزرسانی وضعیت
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- دکمه بازگشت -->
        <div class="row mt-4">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body text-center">
                        <a href="{{ route('dashboard.users.index') }}" class="btn btn-secondary btn-lg" style="padding: 12px 30px;">
                            <i class="fi fi-rs-arrow-left"></i> بازگشت به لیست کاربران
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
