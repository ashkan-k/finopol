@extends('layout.master')

@section('Page_Title')
    کیف پول
@endsection

@section('Content')
    <style>
        /* Scoped styles for wallets page to match design */
        .wallets-top { gap:20px; align-items:stretch; }
        /* ensure bootstrap cols stretch uniformly so cards sit in one row */
    .wallets-top { display:flex; flex-wrap:wrap; }
    .wallets-top .col-md-4 { display:flex; }
    /* force children cards to equal height so they sit in one row */
    .wallets-top .col-md-4 > * { flex:1; height:160px; box-sizing:border-box; }
        .card-top-gradient { border-radius:12px; color:#fff; min-height:160px; display:flex; align-items:center; justify-content:center; box-shadow: 0 8px 22px rgba(41,43,65,0.06); }
        .gradient-purple { background: linear-gradient(180deg,#4b4f7a,#2b2740); }
    .charge-panel { background:#f6f9fc; border-radius:12px; padding:18px; display:flex; flex-direction:column; justify-content:center; }
    .preset { background:#eef3f8; border:1px solid #d9e2ef; border-radius:10px; padding:8px 14px; color:#2b2e48; cursor:pointer; }
    .preset.active, .preset:active { background:#2b2740; color:#fff; border-color:transparent; }
        .btn-export { border:1px solid #eaedf1; border-radius:10px; padding:10px 16px; background:#fff; }
        .filters-row .select { min-width:160px; }
        .wallets-table-card { border-radius:12px; overflow:hidden; }
        .table-head-slim thead th { background:#f3f6f9; border-bottom:0; }
        .table-custom tbody tr td { vertical-align:middle; }
    </style>

    <div class="main-header">
        <div class="inner">
            <div class="title">
                <h1><i class="fi fi-rs-wallet"></i>کیف پول شما</h1>
                <div class="breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb-list mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">داشبورد</a></li>
                            <li class="breadcrumb-item active" aria-current="page">کیف پول</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="main-inner">
        <div class="row wallets-top">
            <div class="col-md-4">
                <div class="card-top-gradient gradient-purple" style="flex-direction:column;">
                    <div style="text-align:center;">
                        <div class="small text-muted" style="opacity:0.9">مجموع اعتبار شما</div>
                        <div style="font-size:22px; font-weight:700; margin-top:6px;">0 ریال</div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="charge-panel">
                    <div style="display:flex; justify-content:space-between; align-items:center;">
                        <div>
                            <h4 class="form-title mb-1" style="font-weight:700;">شارژ کیف پول</h4>
                            <p class="text-muted small" style="margin:0">کیف پول خود را از این بخش شارژ کنید</p>
                        </div>
                        <div style="text-align:center;">
                            <small class="text-muted">100,000,000</small>
                        </div>
                    </div>

                    <div style="display:flex; gap:12px; align-items:center; margin-top:12px;">
                        <button id="payBtn" class="btn btn-primary" style="padding:10px 22px;">پرداخت</button>
                        <div style="flex:1;">
                            <div class="input-group no-icon">
                                <input id="amountInput" type="text" class="input" value="100,000,000" style="text-align:left;" />
                            </div>
                        </div>
                    </div>

                    <div style="display:flex; gap:10px; margin-top:16px; flex-wrap:wrap;">
                        <button type="button" class="preset" data-amount="100000">100 هزار تومان</button>
                        <button type="button" class="preset" data-amount="2000000">2 میلیون تومان</button>
                        <button type="button" class="preset" data-amount="10000000">10 میلیون تومان</button>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-top-gradient gradient-purple">
                    <h3 style="font-weight:700;">به زودی</h3>
                </div>
            </div>
        </div>

        <div class="row" style="margin:28px 0 12px 0; align-items:center;">
            <div class="col-md-6">
                <a href="{{ request()->fullUrlWithQuery(['export' => 'excel']) }}" class="btn-export"> <i class="fi fi-rs-download"></i> دانلود اکسل</a>
            </div>
            <div class="col-md-6" style="display:flex; gap:12px; align-items:center; justify-content:flex-end;">
                <div class="select-group">
                    <label style="display:none;">وضعیت</label>
                    <select class="select" name="status">
                        <option value="">وضعیت</option>
                        <option value="success">موفق</option>
                        <option value="failed">ناموفق</option>
                        <option value="pending">در انتظار</option>
                    </select>
                </div>
                <div class="select-group">
                    <label style="display:none;">ترتیب</label>
                    <select class="select" name="order">
                        <option value="desc">نزولی (جدیدترین)</option>
                        <option value="asc">صعودی (قدیمی‌ترین)</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="card wallets-table-card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table-custom table-head-slim">
                        <thead>
                            <tr>
                                <th style="width:60px">ردیف</th>
                                <th style="min-width:120px">روز</th>
                                <th style="min-width:140px">زمان</th>
                                <th style="min-width:160px">مبلغ</th>
                                <th style="min-width:180px">کد پیگیری</th>
                                <th style="min-width:160px">وضعیت</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="6" class="text-center text-muted">داده‌ای برای نمایش پیدا نشد</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mt-3" style="display:flex; justify-content:center;">
                    <div>{{-- reuse pagination when data available --}}</div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('Scripts')
<script>
    // preset amount buttons: write raw numeric value into input (no localized commas)
    document.addEventListener('DOMContentLoaded', function(){
        var presets = document.querySelectorAll('.preset');
        var input = document.getElementById('amountInput');
        presets.forEach(function(btn){
            btn.addEventListener('click', function(){
                var v = btn.getAttribute('data-amount');
                // write formatted numeric value with Persian commas and focus input
                input.value = parseInt(v).toLocaleString('fa-IR');
                input.focus();
                presets.forEach(function(b){ b.classList.remove('active'); });
                btn.classList.add('active');
            });
        });

    });
</script>
@endsection


