@extends('layout.master')

@section('Page_Title')
فینوپی - تیکت‌ها
@endsection

@section('Page_CSS')
@endsection

@section('Content')
    <div class="main-header" style="margin-bottom:10px;">
        <div class="inner">
            <div class="title" style="display:flex; align-items:center; gap:8px; flex-wrap:wrap;">
                <h1 style="margin:0; font-size:18px;">Ticket ID <span style="direction:ltr; display:inline-block;">#68C52F3B296C0</span></h1>
                <span>|</span>
                <span>User ID <a href="#">#1</a></span>
                <span>|</span>
                <a href="#" style="color:#0e4fc7;">درحال بررسی</a>
                <span>|</span>
                <span>تست</span>
            </div>
        </div>
    </div>

    <div class="main-inner">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:10px;">
        <div style="display:flex; gap:8px;">
                <button id="btn-toggle-text-reply" class="btn btn-success"><i class="fi fi-rs-plus"></i> افزودن پاسخ متنی</button>
                <button id="btn-open-voice" class="btn btn-success"><i class="fi fi-rs-microphone"></i> افزودن پاسخ صوتی ( Voice Message )</button>
                <button id="btn-toggle-quick-info" class="btn btn-info"><i class="fi fi-rs-question"></i> اطلاعات بیشتر و دسترسی سریع</button>
            </div>    
        <div class="dropdown" style="position:relative;">
                <button class="btn btn-secondary dropdown-toggle" type="button" onclick="document.getElementById('ticket-status-menu').classList.toggle('show')">
                    <i class="fi fi-rs-caret-down"></i> تغییر وضعیت تیکت
                </button>
                <div id="ticket-status-menu" class="dropdown-menu" style="min-width:220px; top:42px; right:0;">
                    <a class="dropdown-item" href="#" data-status="Closed">بسته شده</a>
                    <a class="dropdown-item" href="#" data-status="Review">در دست بررسی</a>
                    <a class="dropdown-item" href="#" data-status="CustomerReply">پاسخ مشتری</a>
                    <a class="dropdown-item" href="#" data-status="SupportReply">پاسخ پشتیبان</a>
                    <a class="dropdown-item" href="#" data-status="WaitingCustomer">در انتظار پاسخ مشتری</a>
                </div>
            </div>
        </div>

        <!-- باکس اطلاعات بیشتر و دسترسی سریع -->
        <div id="quick-info-box" style="display:none;">
            <div class="card">
                <div class="card-header">اطلاعات بیشتر و دسترسی سریع</div>
                <div class="card-body">
                    <div style="background:#ffffff; border:1px solid #e5e7eb; border-radius:6px; padding:12px; line-height:2; font-weight:700;">
                        <span>وضعیت اکانت: <span style=\"font-weight:700;\">درحال بررسی</span></span>
                        <span style="padding:0 8px;">|</span>
                        <span>نوع حساب: <a href="#" style="color:#16a34a; font-weight:700;">حقیقی</a>
                            <span style="color:#9ca3af; margin:0 4px;">(تجاری)</span>
                        </span>
                        <span style="padding:0 8px;">|</span>
                        <span>سطح: <span style=\"font-weight:700;\">1</span></span>

                        <div style="margin-top:8px;"></div>

                        <span>کاربر: مدیر ارشد</span>
                        <span style="padding:0 8px;">|</span>
                        <span>کد ملی: —</span>
                        <span style="padding:0 8px;">|</span>
                        <span>شماره موبایل: <a href="tel:09123456789" style="color:#16a34a;">09123456789</a></span>
                        <span style="padding:0 8px;">|</span>
                        <span>آدرس ایمیل: <a href="mailto:info@example.com" style="color:#16a34a;">info@example.com</a></span>
                        <span style="padding:0 8px;">|</span>
                        <span>تلفن ثابت: —</span>
                        <span style="padding:0 8px;">|</span>
                        <span>تیکت: افزایش سطح</span>
                        <div class="btns-action" style="justify-content:flex-end; gap:10px; margin-top:10px; font-weight:normal;">
                            <button class="btn btn-warning">ویرایش اطلاعات</button>
                            <button class="btn btn-primary">پروفایل کاربر</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- افزون پاسخ (باز/بسته شونده) -->
        <div id="text-reply-box" style="display:none;">
            <div class="card">
                <div class="card-header">افزودن پاسخ</div>
                <div class="card-body">
                    <div class="input-group no-icon" style="margin-bottom:0;">
                        <textarea class="textarea" rows="10" style="width:100%; resize:vertical;" placeholder="متن پاسخ را وارد کنید..."></textarea>
                    </div>
                    <!-- نوار سفید پایین -->
                    <div style="background:#fff; border-top:1px solid #e5e7eb; padding:10px; margin-top:10px; border-radius:0 0 6px 6px;">
                        <div class="btns-action" style="justify-content:space-between; align-items:center;">
                            <!-- راست: انتخاب فایل + پیش‌نمایش خالی خاکستری -->
                            <div class="upload-bar" style="display:flex; align-items:center; gap:10px;">
                                <label class="btn btn-secondary-outline icon-right" for="ticket_text_file" style="cursor:pointer;">
                                    <i class="fi fi-rs-upload"></i>انتخاب فایل
                                </label>
                                <input id="ticket_text_file" type="file" hidden>
                                <!-- <div class="upload-preview" style="background:#e6e6e6; border-radius:6px; height:48px; width:420px;"></div> -->
                            </div>
                            <!-- چپ: نوع پاسخ + ارسال -->
                            <div class="btns-action" style="gap:10px; margin-right:auto;">
                                <div class="select-group no-icon">
                                    <select class="select" style="min-width:180px; width:auto;">
                                        <option value="support">پاسخ پشتیبان</option>
                                        <option value="note">یادداشت داخلی</option>
                                    </select>
                                </div>
                                <button class="btn btn-primary mt-2"><i class="fi fi-rs-send"></i> ارسال</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-5" style="border:1px solid #d1d5db;">
            <div style="background:#7a8573; color:#fff; padding:8px 12px; display:flex; justify-content:space-between;">
                <span>12:15 ساعت 1404/06/22</span>
                <span>مدیر ارشد</span>
            </div>
            <div style="background:#e6ffd6; padding:16px; min-height:140px;">
                <p style="margin:0; color:#253046;">تست</p>
            </div>
        </div>

        <div style="margin-top:10px;">
            <button class="btn btn-secondary">1 پست</button>
        </div>
    </div>

    <div class="modal" id="modal-ticket-voice-record" tabindex="-1">
        <div class="modal-backdrop" onclick="hideModalDialog('modal-ticket-voice-record')"></div>
        <div class="modal-dialog" style="max-width:1280px;">
            <div class="modal-header">
                <h5 class="modal-title">ارسال پیام صوتی ( Voice Message )</h5>
                <button type="button" class="btn-close" onclick="hideModalDialog('modal-ticket-voice-record')"><i class="fi fi-rs-cross"></i></button>
            </div>
            <div class="modal-body">
                <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:12px;">
                    <div style="font-weight:700;">00:00:00</div>
                    <div style="display:flex; gap:8px;">
                        <button class="btn btn-info" title="پخش"><i class="fi fi-rs-play"></i></button>
                        <button class="btn btn-danger" title="ضبط"><i class="fi fi-rs-microphone"></i></button>
                    </div>
                </div>
                <div style="background:#2f2f2f; height:180px; border-radius:6px; margin-bottom:12px;"></div>
                <div class="input-group no-icon" style="margin-bottom:0;">
                    <textarea class="textarea" rows="6" style="width:100%; resize:vertical; background:#fff; border:1px solid #e5e7eb; border-radius:6px;" placeholder="در صورتی که تمایل به ارسال توضیحات متنی در کنار پیام صوتی دارید، در این بخش آن را وارد کنید ..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <div style="display:flex; justify-content:space-between; width:100%; align-items:center; gap:12px;">
                    <div style="order:2;">
                        <label class="btn btn-primary-outline icon-right" for="voice_file_input" style="cursor:pointer;">
                            انتخاب فایل
                        </label>
                        <input id="voice_file_input" name="attachment_file" type="file" hidden>
                    </div>
                    <div style="order:1;">
                        <div class="select-group no-icon" style="display:inline-block;">
                            <select class="select">
                                <option value="support">پاسخ پشتیبان</option>
                                <option value="note">یادداشت داخلی</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('Page_JS')
<script>
document.addEventListener('DOMContentLoaded', function () {
    var btn = document.getElementById('btn-toggle-text-reply');
    var box = document.getElementById('text-reply-box');
    if (btn && box) {
        btn.addEventListener('click', function () {
            if (box.style.display === 'none' || box.style.display === '') {
                box.style.display = 'block';
                window.scrollTo({ top: box.offsetTop - 80, behavior: 'smooth' });
            } else {
                box.style.display = 'none';
            }
        });
    }

    var infoBtn = document.getElementById('btn-toggle-quick-info');
    var infoBox = document.getElementById('quick-info-box');
    if (infoBtn && infoBox) {
        infoBtn.addEventListener('click', function () {
            if (infoBox.style.display === 'none' || infoBox.style.display === '') {
                infoBox.style.display = 'block';
                window.scrollTo({ top: infoBox.offsetTop - 80, behavior: 'smooth' });
            } else {
                infoBox.style.display = 'none';
            }
        });
    }

    var voiceBtn = document.getElementById('btn-open-voice');
    if (voiceBtn) {
        voiceBtn.addEventListener('click', function () {
            showModalDialog('modal-ticket-voice-record');
        });
    }
});
</script>
@endsection

