@extends('layout.master')

@section('Page_Title')
    لیست فراخوانی‌ها
@endsection

@section('Content')
    <div class="main-header">
        <div class="inner">
            <div class="title">
                <h1><i class="fi fi-rs-database"></i>لیست فراخوانی‌ها</h1>
                <div class="breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb-list mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">داشبورد</a></li>
                            <li class="breadcrumb-item active" aria-current="page">فراخوانی‌ها</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="main-inner">
        <div class="card">
            <div class="card-body">
                <form method="get">
                    <div class="row" style="gap:10px 0; align-items:center;">
                        <div class="col-lg-3 col-md-6">
                            <div class="select-group">
                                <label style="display:none;">وضعیت</label>
                                <select class="select" name="status">
                                    <option value="">وضعیت</option>
                                    @foreach($statuses as $key => $label)
                                        <option value="{{ $key }}" @if(request('status')===$key) selected @endif>{{ $label }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="input-group no-icon">
                                <label style="display:none;">بازه زمانی</label>
                                <div class="date-chip" style="width:100%; display:flex; align-items:center; gap:8px;">
                                    <input id="api_from" type="text" class="input" placeholder="۱۴۰۴/۰۶/۱۷" style="flex:1; text-align:center;" name="range_from" value="{{ request('range_from') }}" />
                                    <span style="opacity:.6;">-</span>
                                    <input id="api_to" type="text" class="input" placeholder="۱۴۰۴/۰۷/۱۷" style="flex:1; text-align:center;" name="range_to" value="{{ request('range_to') }}" />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="select-group">
                                <label style="display:none;">سرویس</label>
                                <select class="select" name="fino_service_id">
                                    <option value="">همه‌ی سرویس‌ها</option>
                                    @foreach($services as $srv)
                                        <option value="{{ $srv->id }}" @if(request('fino_service_id')==$srv->id) selected @endif>{{ $srv->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions" style="margin-top:10px;">
                        <a href="{{ route('dashboard.api-calls.index') }}" class="btn btn-danger"><i class="fi fi-rs-refresh"></i>بازنشانی</a>
                        <button class="btn btn-primary"><i class="fi fi-rs-search"></i>جستجو</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table-custom table-head-slim">
                        <thead>
                        <tr>
                            <th style="width:60px">ردیف</th>
                            <th>نوع سرویس</th>
                            <th>توکن</th>
                            <th>زمان</th>
                            <th>کد درخواست ارسال شده</th>
                            <th>کد پاسخ دریافت شده</th>
                            <th>هزینه</th>
                            <th>وضعیت</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($calls as $i => $call)
                            <tr>
                                <td>{{ $calls->firstItem() + $i }}</td>
                                <td>{{ optional($call->finoService)->title ?: '-' }}</td>
                                <td dir="ltr"><code>{{ $call->token }}</code></td>
                                <td dir="ltr">{{ $call->duration ?: '-' }}</td>
                                <td dir="ltr">{{ $call->request_code_sent ?: '-' }}</td>
                                <td dir="ltr">{{ $call->response_code_received ?: '-' }}</td>
                                <td>{{ number_format($call->amount) ?: '-' }} تومان</td>
                                <td>
                                    <span class="status color-{{ $call->get_status_class() }}">{{ $call->get_status() }}</span>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="8" class="text-center text-muted">داده‌ای برای نمایش پیدا نشد</td></tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">{{ $calls->links() }}</div>
            </div>
        </div>
    </div>
@endsection

@section('Page_JS')
<script>
    document.addEventListener('DOMContentLoaded', function(){
        try{
            if(window.kamaDatepicker){
                var opts = { forceFarsiDigits:true, markToday:true, gotoToday:true };
                kamaDatepicker('#api_from', opts);
                kamaDatepicker('#api_to', opts);
            }
        }catch(e){}
    });
</script>
@endsection


