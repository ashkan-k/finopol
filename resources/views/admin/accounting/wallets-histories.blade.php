@extends('layout.master')

@section('Page_Title')
    گزارش کیف پول
@endsection

@section('Content')
    <style>
        /* Scoped styles for wallets page to match design */
        .wallets-top { gap:20px; align-items:stretch; display:flex; flex-wrap:wrap; }
        .wallets-top .col-md-4 { display:flex; }
        .wallets-top .col-md-4 > * { flex:1; height:160px; box-sizing:border-box; }
        .card-top-gradient { border-radius:12px; color:#fff; min-height:160px; display:flex; align-items:center; justify-content:center; box-shadow: 0 8px 22px rgba(41,43,65,0.06); }
        .gradient-purple { background: linear-gradient(180deg,#4b4f7a,#2b2740); }
        .charge-panel { background:#f6f9fc; border-radius:12px; padding:18px; display:flex; flex-direction:column; justify-content:center; }
        .preset { background:#eef3f8; border:1px solid #d9e2ef; border-radius:10px; padding:8px 14px; color:#2b2e48; cursor:pointer; transition:all 0.2s ease; }
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
                <h1><i class="fi fi-rs-wallet"></i>گزارش کیف پول کاربران</h1>
                <div class="breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb-list mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">داشبورد</a></li>
                            <li class="breadcrumb-item active" aria-current="page">گزارش کیف پول</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="main-inner">
{{--        <div class="row wallets-top mt-3">--}}
{{--            <div class="col-md-4">--}}
{{--                <div class="card-top-gradient gradient-purple" style="flex-direction:column;">--}}
{{--                    <div style="text-align:center;">--}}
{{--                        <div class="small text-muted" style="opacity:0.9">مجموع اعتبار شما</div>--}}
{{--                        <div style="font-size:22px; font-weight:700; margin-top:6px;">{{ number_format(intval(auth()->user()->wallet?->balance) * 10) }} ریال</div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-md-4">--}}
{{--                <div class="charge-panel">--}}
{{--                    <div style="display:flex; justify-content:space-between; align-items:center;">--}}
{{--                        <div>--}}
{{--                            <h4 class="form-title mb-1" style="font-weight:700;">شارژ کیف پول</h4>--}}
{{--                            <p class="text-muted small" style="margin:0">کیف پول خود را از این بخش شارژ کنید</p>--}}
{{--                        </div>--}}
{{--                        <div style="text-align:center;">--}}
{{--                            <small class="text-muted">100,000,000</small>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div style="display:flex; gap:12px; align-items:center; margin-top:12px;">--}}
{{--                        <button id="payBtn" class="btn btn-primary" style="padding:10px 22px;">پرداخت</button>--}}
{{--                        <div style="flex:1;">--}}
{{--                            <div class="input-group no-icon">--}}
{{--                                <input id="amountInput" type="text" class="input" value="100,000,000" style="text-align:left;" />--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div style="display:flex; gap:10px; margin-top:16px; flex-wrap:wrap;">--}}
{{--                        <button type="button" class="preset" data-amount="100000">۱۰۰,۰۰۰ تومان</button>--}}
{{--                        <button type="button" class="preset" data-amount="2000000">۲,۰۰۰,۰۰۰ تومان</button>--}}
{{--                        <button type="button" class="preset" data-amount="10000000">۱۰,۰۰۰,۰۰۰ تومان</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-md-4">--}}
{{--                <div class="card-top-gradient gradient-purple">--}}
{{--                    <h3 style="font-weight:700;">به زودی</h3>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

        <div class="row" style="margin:28px 0 12px 0; align-items:center;">
            <div class="col-md-6">
                <a href="{{ route('dashboard.wallets-histories.export') }}" target="_blank" class="btn-export">
                    <i class="fi fi-rs-download"></i> دانلود اکسل
                </a>
            </div>
            <div class="col-md-6" style="display:flex; gap:12px; align-items:center; justify-content:flex-end;">
                <form method="get" style="display:flex; gap:12px; align-items:center;">
                    <div class="select-group">
                        <label style="display:none;">وضعیت</label>
                        <select class="select" name="status" onchange="this.form.submit()">
                            <option value="">وضعیت</option>
                            <option value="deposit" @if(request('status')=='deposit') selected @endif>واریز</option>
                            <option value="withdraw" @if(request('status')=='withdraw') selected @endif>برداشت</option>
                        </select>
                    </div>
                    <div class="select-group">
                        <label style="display:none;">ترتیب</label>
                        <select class="select" name="order" onchange="this.form.submit()">
                            <option value="desc" @if(request('order')!='asc') selected @endif>نزولی</option>
                            <option value="asc" @if(request('order')=='asc') selected @endif>صعودی</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>

        <div class="card wallets-table-card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table-custom table-head-slim">
                        <thead>
                        <tr>
                            <th style="width:60px">ردیف</th>
                            <th style="min-width:120px">کاربر</th>
                            <th style="min-width:120px">روز</th>
                            <th style="min-width:140px">زمان</th>
                            <th style="min-width:160px">مبلغ</th>
                            <th style="min-width:180px">کد پیگیری</th>
                            <th style="min-width:180px">نوع عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($histories as $i => $history)
                            <tr>
                                <td>{{ $histories->firstItem() + $i }}</td>
                                <td>{{ optional($history->wallet?->user)->name ?: '-' }}</td>
                                <td>{{ Verta::instance($history->created_at)->format('Y/m/d') }}</td>
                                <td>{{ Verta::instance($history->created_at)->format('H:i') }}</td>
                                <td>{{ number_format($history->amount) }} تومان</td>
                                <td>{{ $history->tracking_id ?? '-' }}</td>
                                <td>
                                    <span class="status color-{{ $history->get_type_class() }}">{{ $history->get_type() }}</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted">داده‌ای برای نمایش پیدا نشد</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-3" style="display:flex; justify-content:center;">
                    {{ $histories->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('Scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const presets = document.querySelectorAll('.preset');
            const input = document.getElementById('amountInput');

            presets.forEach(btn => {
                btn.addEventListener('click', function() {
                    const value = this.getAttribute('data-amount');
                    input.value = Number(value).toLocaleString('fa-IR');

                    presets.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                });
            });
        });
    </script>
@endsection
