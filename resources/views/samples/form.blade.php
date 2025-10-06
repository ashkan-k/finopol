@extends('layout.master')

@section('Page_Title')
فینوپی - لیست تغییرات و بروزرسانی‌ها
@endsection

@section('Page_CSS')
<style>
.changelog-grid { display: grid; grid-template-columns: 260px 1fr; gap: 20px; direction: ltr; }
.changelog-grid > * { direction: rtl; }

/* Sidebar table */
.system-analysis { background: #fff; border: 1px solid #e9ecef; border-radius: 8px; }
.system-analysis .panel-title { padding: 10px 12px; border-bottom: 1px solid #e9ecef; font-weight: 600; color: #495057; }
.system-analysis table { width: 100%; border-collapse: collapse; }
.system-analysis td { padding: 14px 12px; border-top: 1px solid #f1f3f5; }
.system-analysis td:first-child { width: 40%; text-align: center; color: #495057; }
.system-analysis td:last-child { color: #253046; font-weight: 600; }

/* Main card */
.changes-card .heading { display: flex; align-items: center; justify-content: space-between; padding: 10px 12px; border-bottom: 1px solid #e9ecef; }
.changes-card .title { font-weight: 700; color: #253046; }
.changes-card .sub { color: #6c757d; font-size: 12px; }
.version-line { margin: 12px 0 6px; color: #253046; }
.version-line .warn { color: #dc3545; font-weight: 700; }

/* List */
.change-list { list-style: none; padding: 0; margin: 10px 0 0; }
.change-list li { display: grid; grid-template-columns: 1fr auto; align-items: center; gap: 12px; padding: 8px 0; border-bottom: 1px solid #f5f6f7; }
.change-right { display: flex; align-items: center; gap: 8px; }
.change-left { white-space: nowrap; }
.change-left a { color: #0d6efd; margin-inline-start: 8px; }
.dot { width: 6px; height: 6px; border-radius: 50%; background: #22c55e; }
.dot.info { background: #0ea5ff; }
.dot.danger { background: #ef4444; }
.status-label { font-weight: 700; font-size: 12px; }
.status-success { color: #28a745; }
.status-info { color: #0d6efd; }
.status-danger { color: #dc3545; }
.change-text { color: #253046; }

/* Extended version sections */
.version-block { margin-top: 22px; padding-top: 14px; border-top: 2px solid #eef1f4; }
.version-header { display: flex; align-items: baseline; justify-content: space-between; margin-bottom: 6px; }
.version-title { font-weight: 700; color: #253046; }
.version-meta { color: #6c757d; font-size: 12px; }
.muted-sep { height: 1px; background: #f1f3f5; margin: 10px 0; }

@media (max-width: 992px) { .changelog-grid { grid-template-columns: 1fr; } }
</style>
@endsection

@section('Content')
    <div class="main-header">
        <div class="inner">
            <div class="title">
                <h1><i class="fi fi-rs-list"></i>لیست تغییرات و بروزرسانی‌های اعمال شده در سیستم</h1>
            </div>
        </div>
    </div>

    <div class="main-inner">
        <div class="changelog-grid">
            <div class="system-analysis">
                <div class="panel-title">آنالیز سیستمی</div>
                <table>
                    <tr>
                    <td>نسخه هسته</td>
                        <td>20250221</td>
                    </tr>
                    <tr>
                    <td>نسخه پایگاه داده</td>
                        <td>20250221</td>
                    </tr>
                    <tr>
                    <td>آخرین نسخه منتشر شده</td>
                        <td>20250221</td>
                    </tr>
                </table>
            </div>

            <div class="card changes-card">
                <div class="card-body">
                    <div class="heading">
                        <div class="title">بروزرسانی</div>
                        <div class="sub">سیستم وی</div>
                    </div>

                    <div class="version-line">
                        بروز‌رسانی سیستم 202XXXX <span class="warn">( نسخه / آپدیت غیر رسمی )</span>
                    </div>

                    <ul class="change-list">
                        <li>
                            <div class="change-right"><span class="dot"></span><span class="change-text">افزوده شدن سامانه پیامکی قاصدک</span></div>
                            <div class="change-left"><span class="status-label status-success">قابلیت جدید</span></div>
                        </li>
                        <li>
                            <div class="change-right"><span class="dot"></span><span class="change-text">افزوده شدن قابلیت اعلام نرخ ارز بصورت خودکار</span></div>
                            <div class="change-left"><span class="status-label status-success">قابلیت جدید</span></div>
                        </li>
                        <li>
                            <div class="change-right"><span class="dot"></span><span class="change-text">افزوده شدن قابلیت افزودن کارمزد به مبلغ تراکنش</span></div>
                            <div class="change-left"><a href="#">جزئیات</a><span class="status-label status-success">قابلیت جدید</span></div>
                        </li>
                        <li>
                            <div class="change-right"><span class="dot"></span><span class="change-text">افزوده شدن پشتیبانی از درگاه Bluebank</span></div>
                            <div class="change-left"><span class="status-label status-success">قابلیت جدید</span></div>
                        </li>
                        <li>
                            <div class="change-right"><span class="dot info"></span><span class="change-text">حذف کپچای ReSubmit از فرم‌های پنل مدیریت</span></div>
                            <div class="change-left"><a href="#">فیکس / رفع اشکال</a><span class="status-label status-info">بهبود</span></div>
                        </li>
                        <li>
                            <div class="change-right"><span class="dot info"></span><span class="change-text">حذف کپچای ReSubmit از فرم‌های پنل کاربری</span></div>
                            <div class="change-left"><a href="#">فیکس / رفع اشکال</a><span class="status-label status-info">بهبود</span></div>
                        </li>
                        <li>
                            <div class="change-right"><span class="dot info"></span><span class="change-text">رفع خطای PaymentVerification</span></div>
                            <div class="change-left"><a href="#">فیکس / رفع اشکال</a><span class="status-label status-info">بهبود</span></div>
                        </li>
                        <li>
                            <div class="change-right"><span class="dot info"></span><span class="change-text">رفع مشکل در تراکنش‌های تکراری</span></div>
                            <div class="change-left"><a href="#">فیکس / رفع اشکال</a><span class="status-label status-info">بهبود</span></div>
                        </li>
                        <li>
                            <div class="change-right"><span class="dot info"></span><span class="change-text">بهبود سیستم محاسبه کارمزد</span></div>
                            <div class="change-left"><a href="#">فیکس / رفع اشکال</a><span class="status-label status-info">بهبود</span></div>
                        </li>
                        <li>
                            <div class="change-right"><span class="dot info"></span><span class="change-text">اصلاح نمایش کارمزد پرداخت‌ها</span></div>
                            <div class="change-left"><a href="#">فیکس / رفع اشکال</a><span class="status-label status-info">بهبود</span></div>
                        </li>
                    </ul>

                    <!-- Subsequent version blocks to match long page -->
                    <div class="version-block">
                        <div class="version-header">
                            <div class="version-title">بروزرسانی 202XXXX</div>
                            <div class="version-meta">1404/06/20</div>
                        </div>
                        <div class="muted-sep"></div>
                        <ul class="change-list">
                            <li>
                                <div class="change-right"><span class="dot"></span><span class="change-text">افزوده شدن گزارش تجمیعی تراکنش‌ها</span></div>
                                <div class="change-left"><span class="status-label status-success">قابلیت جدید</span></div>
                            </li>
                            <li>
                                <div class="change-right"><span class="dot info"></span><span class="change-text">بهبود سرعت بارگذاری داشبورد</span></div>
                                <div class="change-left"><a href="#">فیکس / رفع اشکال</a><span class="status-label status-info">بهبود</span></div>
                            </li>
                            <li>
                                <div class="change-right"><span class="dot danger"></span><span class="change-text">رفع خطای پرداخت در برخی بانک‌ها</span></div>
                                <div class="change-left"><a href="#">فیکس / رفع اشکال</a><span class="status-label status-danger">خطا</span></div>
                            </li>
                        </ul>
                    </div>

                    <div class="version-block">
                        <div class="version-header">
                            <div class="version-title">بروزرسانی 202XXXX</div>
                            <div class="version-meta">1404/06/15</div>
                        </div>
                        <div class="muted-sep"></div>
                        <ul class="change-list">
                            <li>
                                <div class="change-right"><span class="dot"></span><span class="change-text">افزوده شدن امکان خروجی CSV برای تراکنش‌ها</span></div>
                                <div class="change-left"><span class="status-label status-success">قابلیت جدید</span></div>
                            </li>
                            <li>
                                <div class="change-right"><span class="dot info"></span><span class="change-text">بهبود صفحه ورود دو مرحله‌ای</span></div>
                                <div class="change-left"><a href="#">فیکس / رفع اشکال</a><span class="status-label status-info">بهبود</span></div>
                            </li>
                            <li>
                                <div class="change-right"><span class="dot info"></span><span class="change-text">بهبود خطاهای تایم‌اوت در ارتباط با درگاه‌ها</span></div>
                                <div class="change-left"><a href="#">فیکس / رفع اشکال</a><span class="status-label status-info">بهبود</span></div>
                            </li>
                        </ul>
                    </div>

                    <div class="version-block">
                        <div class="version-header">
                            <div class="version-title">بروزرسانی 202XXXX</div>
                            <div class="version-meta">1404/05/30</div>
                        </div>
                        <div class="muted-sep"></div>
                        <ul class="change-list">
                            <li>
                                <div class="change-right"><span class="dot"></span><span class="change-text">قابلیت تعیین کارمزد اختصاصی برای کاربران</span></div>
                                <div class="change-left"><span class="status-label status-success">قابلیت جدید</span></div>
                            </li>
                            <li>
                                <div class="change-right"><span class="dot info"></span><span class="change-text">بهبود گزارش تسویه‌ها</span></div>
                                <div class="change-left"><a href="#">فیکس / رفع اشکال</a><span class="status-label status-info">بهبود</span></div>
                            </li>
                            <li>
                                <div class="change-right"><span class="dot danger"></span><span class="change-text">رفع اختلال در تایید تراکنش‌های معوق</span></div>
                                <div class="change-left"><a href="#">فیکس / رفع اشکال</a><span class="status-label status-danger">خطا</span></div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('Page_JS')
@endsection

@extends('layout.master')

@section('Page_Title')
فینوپی - لیست تغییرات و بروزرسانی‌ها
@endsection

@section('Page_CSS')
<style>
.changelog-layout { display: grid; grid-template-columns: 220px 1fr; gap: 20px; direction: ltr; }
.changelog-sidebar, .changelog-card { direction: rtl; }

.changelog-sidebar .filter-card { background: #fff; border: 1px solid #e9ecef; border-radius: 8px; padding: 12px; }
.filter-actions { display: grid; grid-template-columns: 1fr; gap: 8px; }
.filter-actions .btn { width: 100%; }

.changelog-card .card-header { display: flex; align-items: center; justify-content: space-between; padding-bottom: .75rem; border-bottom: 1px solid #e9ecef; }
.changelog-card .search-input { width: 320px; max-width: 50%; background: #f1f3f5; border: 1px solid #e2e6ea; border-radius: 6px; padding: .5rem .75rem; }

.changelog-list { margin-top: 1rem; }
.log-date { background: #f8f9fa; border: 1px solid #edf0f2; border-radius: 6px; padding: .4rem .6rem; font-weight: 600; color: #6c757d; margin: 16px 0 8px; display: inline-block; }
.log-item { display: grid; grid-template-columns: 1fr auto auto; gap: 10px; align-items: center; padding: 10px 12px; border-bottom: 1px solid #f1f3f5; }
.log-item .message { color: #374151; }
.log-item .time { color: #6b7280; white-space: nowrap; }
.badge { padding: 2px 8px; border-radius: 999px; font-size: 12px; }
.badge-success { background: #e6f4ea; color: #1e7e34; }
.badge-info { background: #e7f0ff; color: #0d6efd; }
.badge-danger { background: #fdecea; color: #b02a37; }

@media (max-width: 992px) { .changelog-layout { grid-template-columns: 1fr; } .changelog-card .search-input { max-width: 100%; width: 100%; } .log-item { grid-template-columns: 1fr auto; grid-row-gap: 6px; } }
</style>
@endsection

@section('Content')
    <div class="main-header">
        <div class="inner">
            <div class="title">
                <h1><i class="fi fi-rs-list"></i>لیست تغییرات و بروزرسانی‌ها</h1>
                <div class="breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb-list mb-0">
                            <li class="breadcrumb-item"><a href="/dashboard">داشبورد</a></li>
                            <li class="breadcrumb-item active" aria-current="page">برنامه زمانبندی</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="main-inner">
        <div class="changelog-layout">
            <div class="changelog-sidebar">
                <div class="filter-card">
                    <div class="mb-2" style="font-weight:600; color:#495057;">فیلتر زمان</div>
                    <div class="filter-actions mb-3">
                        <button class="btn btn-primary">امروز</button>
                        <button class="btn btn-primary-outline">7 روز گذشته</button>
                        <button class="btn btn-primary-outline">30 روز گذشته</button>
                    </div>
                    <div class="mb-2" style="font-weight:600; color:#495057;">وضعیت</div>
                    <div class="filter-actions">
                        <button class="btn btn-success">موفق</button>
                        <button class="btn btn-info">اطلاعی</button>
                        <button class="btn btn-danger">خطا</button>
                    </div>
                </div>
            </div>
            <div class="card changelog-card">
                <div class="card-body">
                    <div class="card-header">
                        <h6 class="mb-0">گزارش تغییرات</h6>
                        <input type="text" class="search-input" placeholder="جستجو در تغییرات...">
                    </div>

                    <div class="changelog-list">
                        <span class="log-date">1404/06/24</span>
                        <div class="log-item">
                            <div class="message">بهبود استایل صفحه برنامه زمانبندی</div>
                            <div class="time">15:13</div>
                            <span class="badge badge-info">اطلاعی</span>
                        </div>
                        <div class="log-item">
                            <div class="message">رفع خطای عدم نمایش دکمه در موبایل</div>
                            <div class="time">14:02</div>
                            <span class="badge badge-success">موفق</span>
                        </div>
                        <div class="log-item">
                            <div class="message">خطا در بارگذاری گزارش پرداخت</div>
                            <div class="time">12:27</div>
                            <span class="badge badge-danger">خطا</span>
                        </div>

                        <span class="log-date">1404/06/23</span>
                        <div class="log-item">
                            <div class="message">افزودن صفحه لیست تغییرات</div>
                            <div class="time">19:40</div>
                            <span class="badge badge-success">موفق</span>
                        </div>
                        <div class="log-item">
                            <div class="message">بهینه‌سازی کوئری‌های داشبورد</div>
                            <div class="time">10:11</div>
                            <span class="badge badge-info">اطلاعی</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('Page_JS')
<script>
// Placeholder for future filtering / searching logic
</script>
@endsection

