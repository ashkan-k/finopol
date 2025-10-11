@extends('layout.master')

@section('Page_Title')
    کیف پول
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
                <h1><i class="fi fi-rs-wallet"></i>کیف پول کاربران</h1>
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
        <div class="row" style="margin:28px 0 12px 0; align-items:center;">
            <div class="col-md-6">
            </div>
            <div class="col-md-6" style="display:flex; gap:12px; align-items:center; justify-content:flex-end;">
                <form method="get" style="display:flex; gap:12px; align-items:center;">
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
                            <th style="min-width:120px">شماره تلفن</th>
                            <th style="min-width:160px">موجودی</th>
                            <th style="min-width:120px">وضعیت</th>
                            <th style="min-width:180px">آخرین عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($wallets as $i => $wallet)
                            <tr>
                                <td>{{ $wallets->firstItem() + $i }}</td>
                                <td>{{ optional($wallet->user)->name ?: '-' }}</td>
                                <td>{{ optional($wallet->user)->phone ?: '-' }}</td>
                                <td>{{ number_format($wallet->balance) }} تومان</td>
                                <td>
                                    <span class="status color-{{ $wallet->status ? 'success' : 'danger' }}">{{ $wallet->status ? 'فعال' : 'غیرفعال' }}</span>
                                </td>
                                <td>
                                    @if($last_history = $wallet->histories()->latest()->first())
                                        {{ $last_history->get_type() }} - {{ number_format($last_history->amount) }} تومان
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">داده‌ای برای نمایش پیدا نشد</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-3" style="display:flex; justify-content:center;">
                    {{ $wallets->links() }}
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
