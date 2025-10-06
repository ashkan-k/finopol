@extends('layout.master')

@section('Page_Title')
ویرایش توکن
@endsection

@section('Content')
<div class="main-header">
    <div class="inner">
        <div class="title"><h1>ویرایش توکن</h1></div>
    </div>
</div>

<div class="main-inner">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('dashboard.tokens.update', $token) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="input-group no-icon">
                            <label>عنوان</label>
                            <input name="title" value="{{ old('title', $token->title) }}" class="input" required>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="input-group no-icon">
                            <label>کاربر</label>
                            <div class="select-group">
                                <select name="user_id" class="select" required>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" @selected(old('user_id', $token->user_id)==$user->id)>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="input-group no-icon">
                            <label>آی‌پی‌ها (با ، از یکدیگر جدا کنید)</label>
                            <input name="ips" value="{{ old('ips', $token->ips) }}" class="input">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="input-group no-icon">
                            <label>توکن</label>
                            <input name="token" id="token_input" value="{{ old('token', $token->token) }}" class="input">
                            <div class="mt-1">
                                <label style="display:inline-flex; align-items:center; gap:6px;">
                                    <input type="checkbox" name="auto_generate_token" id="auto_generate_token" value="1" {{ old('auto_generate_token') ? 'checked' : '' }}>
                                    ساخت خودکار توکن
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="input-group no-icon">
                            <label>تاریخ فعال‌سازی</label>
                            <input type="text" id="activated_at_display" class="input" placeholder="انتخاب تاریخ و زمان">
                            <input type="hidden" name="activated_at" id="activated_at" value="{{ old('activated_at', optional($token->activated_at)->format('Y-m-d H:i:s')) }}">
                        </div>
                    </div>
                </div>

                <div class="form-actions" style="justify-content:flex-end;">
                    <a href="{{ route('dashboard.tokens.index') }}" class="btn btn-danger">انصراف</a>
                    <button class="btn btn-primary">ذخیره</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('Page_CSS')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/persian-datepicker@1.2.0/dist/css/persian-datepicker.css">
@endsection

@section('Page_JS')
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/persian-date@1.1.0/dist/persian-date.js"></script>
<script src="https://cdn.jsdelivr.net/npm/persian-datepicker@1.2.0/dist/js/persian-datepicker.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var $display = $('#activated_at_display');
        var $hidden = $('#activated_at');
        var $auto = $('#auto_generate_token');
        var $token = $('#token_input');

        var initial = $hidden.val();
        if (initial) {
            try {
                var pd = new persianDate(new Date(initial)).toCalendar('persian');
                $display.val(pd.format('YYYY/MM/DD HH:mm'));
            } catch (e) {}
        }

        $display.persianDatepicker({
            format: 'YYYY/MM/DD HH:mm',
            timePicker: { enabled: true, second: { enabled: false } },
            autoClose: true,
            initialValue: false,
            onSelect: function (unix) {
                var g = new persianDate(unix).toCalendar('gregorian').format('YYYY-MM-DD HH:mm:ss');
                $hidden.val(g);
                $hidden.val(toEnglishDigits(g.replace('/', '-')));
            }
        });

        function toggleTokenInput(){
            if ($auto.is(':checked')) {
                $token.prop('disabled', true).attr('placeholder','توکن به صورت خودکار تولید می‌شود');
            } else {
                $token.prop('disabled', false).attr('placeholder','');
            }
        }
        $auto.on('change', toggleTokenInput);
        toggleTokenInput();
    });
</script>
@endsection


