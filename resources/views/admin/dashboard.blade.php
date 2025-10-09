@extends('layout.master')


@section('Page_Title')

فینوپی - پنل مدیریت

@endsection

@section('Page_CSS')
<style>
	/* Utilities */
	.dashboard-section { margin-bottom: 24px; }
	.section-title { color:#0b1024; font-weight:700; font-size:18px; }
	.date-chip { display:inline-flex; align-items:center; gap:8px; padding:8px 12px; border:1px solid #e6e8ef; border-radius:10px; font-size:12px; color:#3a3f55; background:#fff; }
	.pill { display:inline-block; padding:8px 12px; border:1px solid #e6e8ef; border-radius:10px; font-size:12px; color:#3a3f55; background:#fff; }
	.subtle { color:#7a819a; font-size:12px; }
	.arrow-down { color:#ff3b30; }

	/* Card base */
	.card { background:#fff; border:1px solid #eceff6; border-radius:14px; padding:18px; }
	.card + .card { margin-top:16px; }
	.card-title { font-size:14px; color:#0b1024; font-weight:700; display:flex; justify-content:space-between; align-items:center; }
	.card-row { display:flex; gap:16px; }
	@media (max-width: 991px){ .card-row { flex-direction:column; } }

	/* Wallet */
	.wallet-value { display:flex; align-items:center; gap:6px; font-size:12px; color:#7a819a; }
	.btn-primary-lite { width:100%; display:inline-flex; justify-content:center; align-items:center; gap:8px; padding:10px 12px; border:1px solid #0e4fc7; color:#0e4fc7; background:#f2f6ff; border-radius:10px; font-weight:600; }

	/* Mini chart placeholder */
	.sparkline { height:40px; background:linear-gradient(180deg,#f5f7ff,transparent); border-radius:8px; position:relative; overflow:hidden; }
	.sparkline:after { content:""; position:absolute; inset:0; background:repeating-linear-gradient(90deg,transparent 0 6px, rgba(14,79,199,.08) 6px 7px); }

	/* Tabs */
    .tabs { display:flex; gap:16px; border-bottom:1px solid #eceff6; }
    .tab { padding:10px 0; font-weight:700; color:#7a819a; border-bottom:2px solid transparent; cursor:pointer; }
	.tab.active { color:#0e4fc7; border-color:#0e4fc7; }

	/* Empty state */
	.empty-state { display:flex; flex-direction:column; align-items:center; justify-content:center; text-align:center; color:#7a819a; padding:48px 16px; min-height:320px; }
	.empty-figure { width:200px; height:200px; background:#f5f7ff; border-radius:16px; margin:12px auto; background-image:url('assets/images/logo.svg'); background-position:center; background-repeat:no-repeat; background-size:120px; opacity:.75; }
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
						<li class="breadcrumb-item"><a href="#">داشبورد</a></li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</div>

<div class="main-inner">
	<!-- ردیف کارت‌های بالای صفحه -->
	<div class="dashboard-section">
		<div class="card-row">
			<div class="card" style="flex:1; min-width:280px;">
				<div class="card-title">موجودی کیف پول
					<span class="wallet-value"><span class="dot" style="width:8px;height:8px;background:#0b1024;border-radius:50%;display:inline-block"></span>ریال</span>
				</div>
				<div style="margin-top:12px;">
					<button class="btn-primary-lite">شارژ کیف پول</button>
				</div>
			</div>
			<div class="card" style="flex:1; min-width:280px;">
				<div class="card-title">پراستفاده‌ترین سرویس کاربران<span>-</span></div>
				<div class="sparkline" style="margin-top:16px;"></div>
				<div class="subtle" style="margin-top:10px; display:flex; align-items:center; gap:8px;">
					<span class="arrow-down">⬇</span>
					<span>در مقایسه ماه گذشته</span>
				</div>
			</div>
			<div class="card" style="flex:1; min-width:280px;">
				<div class="card-title">تعداد سرویس فعال کاربران<span class="subtle">سرویس</span></div>
				<div class="sparkline" style="margin-top:16px;"></div>
				<div class="subtle" style="margin-top:10px; display:flex; align-items:center; gap:8px;">
					<span class="arrow-down">⬇</span>
					<span>در مقایسه ماه گذشته</span>
					<span style="color:#ff3b30; font-weight:700;">٪۰٫۲</span>
				</div>
			</div>
		</div>
		<div style="margin-top:16px; display:flex; gap:12px; align-items:center; flex-wrap:wrap;">
			<div class="date-chip" style="gap:6px;">
				<input id="date_from" type="text" class="input" placeholder="از تاریخ" style="border:none;outline:none;width:96px;text-align:center;"/>
				<span style="opacity:.6;">-</span>
				<input id="date_to" type="text" class="input" placeholder="تا تاریخ" style="border:none;outline:none;width:96px;text-align:center;"/>
			</div>
			<div class="select-group mt-3" style="width:15%;">
				<label style="display:none;">سرویس</label>
				<select id="service_filter" class="select">
					<option value="">همه‌ی سرویس‌ها</option>
					@php($__services = \App\Models\FinoService::query()->orderBy('title')->get(['id','title']))
					@foreach($__services as $srv)
						<option value="{{ $srv->id }}">{{ $srv->title }}</option>
					@endforeach
				</select>
			</div>
		</div>
	</div>

	<!-- هزینه دوره‌ای کاربران -->
	<div class="dashboard-section">
		<div style="display:flex; justify-content:space-between; align-items:center;">
			<div class="tabs">
				<div class="tab" data-tab="usage">استفاده از سرویس‌ها</div>
				<div class="tab active" data-tab="cost">هزینه دوره‌ای کاربران</div>
			</div>
		</div>
		<div id="tab_usage" class="empty-state" style="display:none;">
			<p>مقداری برای نمایش وجود ندارد.</p>
			<div class="empty-figure"></div>
		</div>
		<div id="tab_cost" class="empty-state">
			<p>مقداری برای نمایش وجود ندارد.</p>
			<div class="empty-figure"></div>
		</div>
	</div>

	<!-- کارت‌های پایین: گزارش‌ها -->
	<div class="dashboard-section">
		<div class="card-row">
			<div class="card" style="flex:1; min-width:320px;">
				<div style="display:flex; justify-content:space-between; align-items:center;">
					<h3 class="section-title">درصد فراخوانی سرویس‌های پرمصرف کاربران</h3>
					<span class="date-chip"><input id="date_from2" type="text" class="input" placeholder="از" style="border:none;outline:none;width:70px;text-align:center;"/>-<input id="date_to2" type="text" class="input" placeholder="تا" style="border:none;outline:none;width:70px;text-align:center;"/></span>
				</div>
				<div class="empty-state">
					<p>مقداری برای نمایش وجود ندارد.</p>
					<div class="empty-figure"></div>
				</div>
			</div>
			<div class="card" style="flex:1; min-width:320px;">
				<div style="display:flex; justify-content:space-between; align-items:center;">
					<h3 class="section-title">میزان هزینه در روزهای هفته</h3>
					<span class="date-chip"><input id="date_from3" type="text" class="input" placeholder="از" style="border:none;outline:none;width:70px;text-align:center;"/>-<input id="date_to3" type="text" class="input" placeholder="تا" style="border:none;outline:none;width:70px;text-align:center;"/></span>
				</div>
				<div class="empty-state">
					<p>مقداری برای نمایش وجود ندارد.</p>
					<div class="empty-figure"></div>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection



@section('Page_JS')
<script>
    // Tabs toggle + Jalali datepickers
    document.addEventListener('DOMContentLoaded', function(){
        // tabs
        var tabs = document.querySelectorAll('.tabs .tab');
        function activate(tabKey){
            tabs.forEach(function(t){ t.classList.toggle('active', t.dataset.tab === tabKey); });
            var usage = document.getElementById('tab_usage');
            var cost = document.getElementById('tab_cost');
            if(usage && cost){
                usage.style.display = tabKey==='usage' ? '' : 'none';
                cost.style.display = tabKey==='cost' ? '' : 'none';
            }
        }
        tabs.forEach(function(tab){
            tab.addEventListener('click', function(){ activate(tab.dataset.tab); });
        });

        // datepickers using kamaDatepicker if available
        try {
            if (window.kamaDatepicker) {
                var opts = { forceFarsiDigits:true, markToday:true, gotoToday:true };
				['date_from','date_to','date_from2','date_to2','date_from3','date_to3'].forEach(function(id){
					if(document.getElementById(id)) kamaDatepicker(id, opts);
				});
            }
        } catch (e) { /* ignore */ }

        // filter change hook placeholder for charts
        var serviceFilter = document.getElementById('service_filter');
        if (serviceFilter) {
            serviceFilter.addEventListener('change', function(){
                // TODO: trigger chart reload with serviceFilter.value and selected dates
                // This is a placeholder hook; integrate with your chart logic.
            });
        }
    });
</script>
@endsection


