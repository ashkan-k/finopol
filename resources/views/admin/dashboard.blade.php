@extends('layout.master')


@section('Page_Title')

فینوپی - پنل مدیریت

@endsection

@section('Page_CSS')
<style>
.dashboard-section {
    margin-bottom: 2rem;
}

.section-title {
    color: #333;
    font-weight: 600;
    font-size: 1.25rem;
    border-bottom: 2px solid #e9ecef;
    padding-bottom: 0.5rem;
}

.card-report {
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    margin-bottom: 1rem;
    overflow: hidden;
}

.card-report .card-header {
    background: #f8f9fa;
    padding: 1rem;
    border-bottom: 1px solid #dee2e6;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.card-report .card-header h5 {
    margin: 0;
    font-size: 1rem;
    font-weight: 600;
    color: #495057;
}

.card-report .card-body {
    padding: 1rem;
}

.report-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.5rem 0;
    border-bottom: 1px solid #f8f9fa;
}

.report-item:last-child {
    border-bottom: none;
}

.report-item .label {
    color: #6c757d;
    font-size: 0.9rem;
}

.report-item .value {
    font-weight: 600;
    color: #495057;
    font-size: 1rem;
}

.badge {
    padding: 0.25rem 0.5rem;
    font-size: 0.75rem;
    border-radius: 0.25rem;
}

.badge-primary {
    background-color: #007bff;
    color: white;
}

.badge-success {
    background-color: #28a745;
    color: white;
}

.badge-info {
    background-color: #17a2b8;
    color: white;
}
</style>
@endsection



@section('Content')
<div class="main-header" style="margin-bottom:20px;">
    <div class="inner">
        <div class="title">
            <h1><i class="fi fi-rs-apps"></i>داشبورد</h1>
            <div class="breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb-list mb-0">
                        <li class="breadcrumb-item"><a href="index.html">داشبورد</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="main-inner">
    <!-- بخش پشتیبانی -->
    <h4 class="section-title mb-3">گزارش پشتیبانی</h4>
    <div class="dashboard-section mb-4">
        <div class="cards-status-list">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                    <div class="card-status type-1 color-red">
                        <a href="#" class="card-inner">
                            <div class="name">
                                <h6><span class="fi fi-rs-clock"></span>تیکت‌های در انتظار پاسخ مشتری</h6>
                                <div class="arrow"><i class="fi fi-rs-arrow-small-left"></i></div>
                            </div>
                            <div class="desc">
                                <h5 data-price="2"></h5>
                                <span>تیکت</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                    <div class="card-status type-1 color-orange">
                        <a href="#" class="card-inner">
                            <div class="name">
                                <h6><span class="fi fi-rs-loading"></span>تیکت‌های در دست بررسی</h6>
                                <div class="arrow"><i class="fi fi-rs-arrow-small-left"></i></div>
                            </div>
                            <div class="desc">
                                <h5 data-price="18"></h5>
                                <span>تیکت</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                    <div class="card-status type-1 color-blue">
                        <a href="#" class="card-inner">
                            <div class="name">
                                <h6><span class="fi fi-rs-user"></span>تیکت‌های اطلاعات کاربری و اکانتینگ</h6>
                                <div class="arrow"><i class="fi fi-rs-arrow-small-left"></i></div>
                            </div>
                            <div class="desc">
                                <h5 data-price="160"></h5>
                                <span>تیکت</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                    <div class="card-status type-1 color-green">
                        <a href="#" class="card-inner">
                            <div class="name">
                                <h6><span class="fi fi-rs-lifebuoy"></span>تیکت‌های در انتظار پاسخ</h6>
                                <div class="arrow"><i class="fi fi-rs-arrow-small-left"></i></div>
                            </div>
                            <div class="desc">
                                <h5 data-price="451"></h5>
                                <span>تیکت</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- بخش درخواست‌های در انتظار -->
    <div class="dashboard-section mb-4">
        <h4 class="section-title mb-3">درخواست‌های در انتظار</h4>
        <div class="cards-status-list">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                    <div class="card-status type-1 color-red">
                        <a href="#" class="card-inner">
                            <div class="name">
                                <h6><span class="fi fi-rs-bug"></span>گارد امنیتی: تراکنش‌های مشکوک بررسی نشده</h6>
                                <div class="arrow"><i class="fi fi-rs-arrow-small-left"></i></div>
                            </div>
                            <div class="desc">
                                <h5 data-price="2"></h5>
                                <span>تراکنش</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                    <div class="card-status type-1 color-orange">
                        <a href="#" class="card-inner">
                            <div class="name">
                                <h6><span class="fi fi-rs-credit-card"></span>حساب‌های بانکی در انتظار بررسی</h6>
                                <div class="arrow"><i class="fi fi-rs-arrow-small-left"></i></div>
                            </div>
                            <div class="desc">
                                <h5 data-price="18"></h5>
                                <span>حساب</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                    <div class="card-status type-1 color-blue">
                        <a href="#" class="card-inner">
                            <div class="name">
                                <h6><span class="fi fi-rs-menu"></span>درگاه‌های در انتظار بررسی</h6>
                                <div class="arrow"><i class="fi fi-rs-arrow-small-left"></i></div>
                            </div>
                            <div class="desc">
                                <h5 data-price="160"></h5>
                                <span>درگاه</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                    <div class="card-status type-1 color-green">
                        <a href="#" class="card-inner">
                            <div class="name">
                                <h6><span class="fi fi-rs-hourglass"></span>درخواست‌های تسویه حساب در انتظار</h6>
                                <div class="arrow"><i class="fi fi-rs-arrow-small-left"></i></div>
                            </div>
                            <div class="desc">
                                <h5 data-price="451"></h5>
                                <span>درخواست</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- بخش درخواست‌های در انتظار -->
    <div class="dashboard-section mb-4">
        <h4 class="section-title mb-3">آمار کمی</h4>
        <div class="cards-status-list">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                    <div class="card-status type-2 color-green">
                        <a href="#" class="card-inner">
                            <div class="name">
                                <h6><span class="fi fi-rs-users"></span>تعداد کاربران</h6>
                                <div class="arrow"><i class="fi fi-rs-arrow-small-left"></i></div>
                            </div>
                            <div class="desc">
                                <h5 data-price="18021"></h5>
                                <span>کاربر</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                    <div class="card-status type-2 color-blue">
                        <a href="#" class="card-inner">
                            <div class="name">
                                <h6><span class="fi fi-rs-credit-card"></span>تراکنش های امروز</h6>
                                <div class="arrow"><i class="fi fi-rs-arrow-small-left"></i></div>
                            </div>
                            <div class="desc">
                                <h5 data-price="4531000"></h5>
                                <span>تومان</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                    <div class="card-status type-2 color-red">
                        <a href="#" class="card-inner">
                            <div class="name">
                                <h6><span class="fi fi-rs-credit-card"></span>تراکنش های این هفته</h6>
                                <div class="arrow"><i class="fi fi-rs-arrow-small-left"></i></div>
                            </div>
                            <div class="desc">
                                <h5 data-price="15360000"></h5>
                                <span>تومان</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                    <div class="card-status type-2 color-orange">
                        <a href="#" class="card-inner">
                            <div class="name">
                                <h6><span class="fi fi-rs-credit-card"></span>تراکنش های این ماه</h6>
                                <div class="arrow"><i class="fi fi-rs-arrow-small-left"></i></div>
                            </div>
                            <div class="desc">
                                <h5 data-price="98000000"></h5>
                                <span>تومان</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- بخش آمار عددی -->
    <div class="dashboard-section">
        <h3 class="section-title mb-3">نمودار و گزارشات</h3>
        <div class="row">
            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="card-report">
                    <div class="card-header">
                        <h5>گزارش آماری درگاه‌های پرداخت</h5>
                        <span class="badge badge-primary">1 درگاه پرداخت</span>
                    </div>
                    <div class="card-body">
                        <div class="report-item">
                            <span class="label">منقضی شده:</span>
                            <span class="value">0</span>
                        </div>
                        <div class="report-item">
                            <span class="label">مسدود شده:</span>
                            <span class="value">0</span>
                        </div>
                        <div class="report-item">
                            <span class="label">در انتظار:</span>
                            <span class="value">0</span>
                        </div>
                        <div class="report-item">
                            <span class="label">فعال:</span>
                            <span class="value">1</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="card-report">
                    <div class="card-header">
                        <h5>گزارش آماری کاربران</h5>
                        <span class="badge badge-success">1 کاربر</span>
                    </div>
                    <div class="card-body">
                        <div class="report-item">
                            <span class="label">متخلف:</span>
                            <span class="value">0</span>
                        </div>
                        <div class="report-item">
                            <span class="label">در انتظار:</span>
                            <span class="value">0</span>
                        </div>
                        <div class="report-item">
                            <span class="label">فعال:</span>
                            <span class="value">1</span>
                        </div>
                        <div class="report-item">
                            <span class="label">غیر فعال:</span>
                            <span class="value">1</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="card-report">
                    <div class="card-header">
                        <h5>گزارش سیستم مالی</h5>
                        <span class="badge badge-info">1 تراکنش</span>
                    </div>
                    <div class="card-body">
                        <div class="report-item">
                            <span class="label">در انتظار:</span>
                            <span class="value">1</span>
                        </div>
                        <div class="report-item">
                            <span class="label">موفق:</span>
                            <span class="value">0</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection



@section('Page_JS')

@endsection

