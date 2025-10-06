@extends('layout.master')

@section('Page_Title')
فینوپی - تیکت‌ها
@endsection

@section('Page_CSS')
<style>
.ticket-tabs { display:flex; gap:12px; margin-bottom:16px; }
.ticket-tab { background:#e9ecef; color:#253046; border-radius:6px; padding:10px 16px; font-weight:600; cursor:pointer; }
.ticket-tab.active { background:#0e4fc7; color:#fff; }
.ticket-tab.warn { background:#f0ad4e; color:#fff; }
.ticket-tab.danger { background:#dc3545; color:#fff; }
.ticket-tab.success { background:#28a745; color:#fff; }

.form-actions { display:flex; gap:10px; margin-top:16px; }
.form-actions .btn { min-width:90px; }

.table-head-slim th { text-align:right; }
</style>

<style>
.form-actions {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
    margin-top: 0.5rem;
    padding-top: 0.5rem;
    direction: rtl;
}

.form-actions .btn {
    padding: 0.75rem 1.5rem;
    border-radius: 6px;
    font-weight: 500;
    font-size: 14px;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
}

.form-actions .btn-primary {
    background-color: #0e4fc7;
    color: white;
}

.form-actions .btn-primary:hover {
    background-color: #0b40a1;
    transform: translateY(-1px);
}

.form-actions .btn-danger {
    background-color: #dc3545;
    color: white;
}

.form-actions .btn-danger:hover {
    background-color: #c82333;
    transform: translateY(-1px);
}

.form-actions .btn i {
    font-size: 16px;
}
</style>
@endsection

@section('Content')
    <div class="main-header">
        <div class="inner">
            <div class="title">
                <h1><i class="fi fi-rs-search"></i>جستجوی تیکت</h1>
                <div class="breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb-list mb-0">
                            <li class="breadcrumb-item"><a href="/dashboard">داشبورد</a></li>
                            <li class="breadcrumb-item active" aria-current="page">تیکت ها</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="main-inner">
        <!-- Tabs -->
        <div class="ticket-tabs">
            <div class="ticket-tab danger">در انتظار</div>
            <div class="ticket-tab">اکانت‌ها</div>
            <div class="ticket-tab warn active">در دست بررسی 1</div>
            <div class="ticket-tab success">در انتظار پاسخ مشتری</div>
            <div class="ticket-tab">پاسخ پشتیبان</div>
            <div class="ticket-tab">بسته شده 1</div>
            <div class="ticket-tab">همه تیکت‌ها 2</div>
        </div>

        <!-- Search Form Card -->
        <div class="card">
            <div class="card-body">
                <div class="search-form">
                    <h4 class="form-title mb-4">
                        <i class="fi fi-rs-search"></i>
                        جستجوی تیکت
                    </h4>
                    
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="input-group no-icon">
                                <label>جستجو میان</label>
                                <div class="select-group">
                                    <select class="select">
                                        <option value="all" selected>پاسخ مشتری</option>
                                        <option value="support">پاسخ پشتیبان</option>
                                        <option value="all_tickets">همه تیکت‌ها</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-3 col-md-6">
                            <div class="input-group no-icon">
                                <label>جستجو بر اساس</label>
                                <div class="select-group">
                                    <select class="select">
                                        <option value="ticket_id" selected>شناسه تیکت</option>
                                        <option value="subject">موضوع</option>
                                        <option value="user">کاربر</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-3 col-md-6">
                            <div class="input-group no-icon">
                                <label>نوع جستجو</label>
                                <div class="select-group">
                                    <select class="select">
                                        <option value="contains" selected>شامل عبارت</option>
                                        <option value="exact">دقیق</option>
                                        <option value="starts_with">شروع با</option>
                                        <option value="ends_with">پایان با</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-3 col-md-6">
                            <div class="input-group no-icon">
                                <label>عبارت مورد جستجو</label>
                                <input type="text" class="input" placeholder="عبارت مورد نظر را وارد کنید">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-danger">
                            <i class="fi fi-rs-refresh"></i>
                            بازنشانی
                        </button>
                        <button type="button" class="btn btn-primary">
                            <i class="fi fi-rs-search"></i>
                            جستجو
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Results Table Card -->
        <div class="card mt-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table-custom table-head-slim">
                        <thead>
                            <tr>
                                <th scope="col">موضوع</th>
                                <th scope="col">کاربر</th>
                                <th scope="col">آخرین پاسخ</th>
                                <th scope="col">وضعیت</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>مشکل در ورود</td>
                                <td>مدیر ارشد</td>
                                <td>پاسخ پشتیبان - 1404/06/24</td>
                                <td><span class="status color-warning">در دست بررسی</span></td>
                                <td>
                                    <button onclick="window.location.href='/tickets/id'" type="button" class="btn btn-primary">
                                        نمایش
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>عدم دریافت ایمیل</td>
                                <td>کاربر نمونه</td>
                                <td>پاسخ مشتری - 1404/06/20</td>
                                <td><span class="status color-success">بسته شده</span></td>
                                <td>
                                    <button onclick="window.location.href='/tickets/id'" type="button" class="btn btn-primary">
                                        نمایش
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>مشکل پرداخت</td>
                                <td>کاربر تست</td>
                                <td>پاسخ پشتیبان - 1404/06/18</td>
                                <td><span class="status color-danger">در انتظار</span></td>
                                <td>
                                    <button onclick="window.location.href='/tickets/id'" type="button" class="btn btn-primary">
                                        نمایش
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('Page_JS')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Search button functionality
    const searchButton = document.querySelector('.btn-primary');
    const resetButton = document.querySelector('.btn-danger');
    
    searchButton.addEventListener('click', function() {
        const searchIn = document.querySelector('select[value="all"]').value;
        const searchBy = document.querySelector('select[value="national_id"]').value;
        const searchType = document.querySelector('select[value="contains"]').value;
        const searchTerm = document.querySelector('input[placeholder="عبارت مورد نظر را وارد کنید"]').value;
        
        // Here you would typically make an AJAX request to search for users
        console.log('Searching for:', {
            searchIn: searchIn,
            searchBy: searchBy,
            searchType: searchType,
            searchTerm: searchTerm
        });
        
        // For demo purposes, show an alert
        alert('جستجو انجام شد!');
    });
    
    resetButton.addEventListener('click', function() {
        // Reset all form fields
        document.querySelectorAll('select').forEach(select => {
            select.selectedIndex = 0;
        });
        document.querySelector('input[placeholder="عبارت مورد نظر را وارد کنید"]').value = '';
        
        // Clear table results (optional)
        const tbody = document.querySelector('tbody');
        tbody.innerHTML = `
            <tr>
                <td colspan="7" class="text-center text-muted">هیچ نتیجه‌ای یافت نشد</td>
            </tr>
        `;
    });
});
</script>
@endsection

