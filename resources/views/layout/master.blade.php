<!DOCTYPE html>
<html lang="fa" class="no-js" dir="rtl">

<head>
    <base href="{{asset('/')}}"/>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#0e4fc7" />
    <meta name="msapplication-navbutton-color" content="#0e4fc7">
    <meta name="apple-mobile-web-app-status-bar-style" content="#0e4fc7">
    <title>
        @Yield('Page_Title')
    </title>
    <link rel="stylesheet" href="assets/css/bootstrap-grid.rtl.min.css" />
    <link rel="stylesheet" href="assets/scss/dashboard/main.css" />

    <!-- Font Icons -->
    <link href="assets/css/flaticon-regular-straight.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/flaticon-solid-straight.css" rel="stylesheet" type="text/css" />

    <!-- Favicon -->
    <link rel="icon" href="assets/images/small-icon.png" />
    <link rel="apple-touch-icon" href="assets/images/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="assets/images/logo-72x72.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="assets/images/logo-114x114.png" />
    @Yield('Page_CSS')
    <!-- kamaDatepicker CSS -->
    <link rel="stylesheet" href="helpers/css/kamadatepicker.min.css" />
</head>

<body>

<!-- Wrapper -->
<div class="wrapper">
    <!--Sidebar-->
    <nav id="sidebar">
        <button class="btn-close-sidebar"><i class="fi fi-rs-cross"></i></button>
        <div class="logo">
            <img src="assets/images/logo.svg" alt="logo">
        </div>
        @include('layout.partials.sidebar')
    </nav>
    <div class="siderbar-overlay"></div>
    <!--Page Content-->
    <div id="content">
        <nav id="mynavbar">
            <div class="collapse-sidebar">
                <button type="button" id="sidebarCollapse" class="btn btn-side">
                        <span class="menu-lines">
                            <span class="line line-1"></span>
                            <span class="line line-2"></span>
                            <span class="line line-3"></span>
                        </span>
                </button>
            </div>
            <div class="admin">
                <div class="item">
                    <button class="btn-navbar btn-sideNotification" onclick="openNotificationPanel('tab-messages')">
                        <i class="fi fi-rs-comment"></i>
                        <div class="badge badge-danger badge-s">13</div>
                    </button>
                </div>
                <div class="item">
                    <button class="btn-navbar btn-sideNotification"
                            onclick="openNotificationPanel('tab-notification')">
                        <i class="fi fi-rs-bell"></i>
                        <div class="badge badge-danger dot"></div>
                    </button>
                </div>
                <div class="dropdown">
                    <button class="btn btn-primary-outline dropdown-toggle icon-right" type="button">
                        <i class="fi fi-rs-user"></i>
                        کاربر ادمین
                    </button>
                    <div class="dropdown-menu">
                        <a href="assets/index.html" class="dropdown-item"><i class="fi fi-rs-eye"></i>
                            مشاهده سایت
                        </a>
                        <a href="messages-list.html" class="dropdown-item"><i class="fi fi-rs-comment"></i>
                            پیام‌ها
                        </a>
                        <a href="notifications-list.html" class="dropdown-item"><i class="fi fi-rs-bell"></i>
                            اعلان‌ها
                        </a>
                        <a href="setting.html" class="dropdown-item"><i class="fi fi-rs-settings"></i>
                            تنظیمات
                        </a>
                        <hr class="my-2">
                        <a href="login.html" class="dropdown-item" data-modal-name="modal-exit"><i
                                class="fi fi-rs-exit"></i>خروج از پنل</a>
                    </div>
                </div>
            </div>
        </nav>
        <!--Body Content-->
        <div class="main-body-content">
            @Yield('Content')
        </div>
    </div>
    <div class="side-notification">
        <div class="side-inner">
            <div class="nav nav-tabs" role="tablist">
                <button class="nav-link active" id="tab-messages" role="tab">
                    <span class="name">پیام‌ها</span>
                </button>
                <button class="nav-link" id="tab-notification" role="tab">
                    <span class="name">اعلان‌ها</span>
                </button>
            </div>
            <div class="tab-content">
                <div class="tab-pane">
                    <div class="card-notif new">
                        <a href="#" class="card-inner">
                            <div class="icon">
                                <i class="fi fi-rs-comment"></i>
                                <div class="badge badge-danger dot"></div>
                            </div>
                            <div class="info">
                                <h6>یک پیام جدید دریافت شد</h6>
                                <div class="date">21/12/1403 - 12:30</div>
                                <div class="send">توسط : کاربر علی قمیشی</div>
                            </div>
                        </a>
                    </div>
                    <div class="card-notif new">
                        <a href="#" class="card-inner">
                            <div class="icon">
                                <i class="fi fi-rs-comment"></i>
                                <div class="badge badge-danger dot"></div>
                            </div>
                            <div class="info">
                                <h6>یک پیام جدید دریافت شد</h6>
                                <div class="date">21/12/1403 - 12:30</div>
                                <div class="send">توسط : کاربر علی قمیشی</div>
                            </div>
                        </a>
                    </div>
                    <div class="card-notif">
                        <a href="#" class="card-inner">
                            <div class="icon">
                                <i class="fi fi-rs-comment"></i>
                            </div>
                            <div class="info">
                                <h6>یک پیام جدید دریافت شد</h6>
                                <div class="date">21/12/1403 - 12:30</div>
                                <div class="send">توسط : کاربر علی قمیشی</div>
                            </div>
                        </a>
                    </div>
                    <div class="card-notif">
                        <a href="#" class="card-inner">
                            <div class="icon">
                                <i class="fi fi-rs-comment"></i>
                            </div>
                            <div class="info">
                                <h6>یک پیام جدید دریافت شد</h6>
                                <div class="date">21/12/1403 - 12:30</div>
                                <div class="send">توسط : کاربر علی قمیشی</div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="tab-pane hidden">
                    <div class="card-notif new">
                        <a href="#" class="card-inner">
                            <div class="icon">
                                <i class="fi fi-rs-bell"></i>
                                <div class="badge badge-info dot"></div>
                            </div>
                            <div class="info">
                                <h6>سفارش جدید دریافت شد</h6>
                                <div class="date">21/12/1403 - 12:30</div>
                                <div class="send">توسط : کاربر علی قمیشی</div>
                            </div>
                        </a>
                    </div>
                    <div class="card-notif">
                        <a href="#" class="card-inner">
                            <div class="icon">
                                <i class="fi fi-rs-bell"></i>
                            </div>
                            <div class="info">
                                <h6>تنظیمات تغییر کرد</h6>
                                <div class="date">21/12/1403 - 12:30</div>
                                <div class="send">توسط : کاربر علی قمیشی</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="notification-overlay"></div>
</div>

<!-- Modal Exit -->
<div class="modal" id="modal-exit" tabindex="-1">
    <div class="modal-backdrop" onclick="hideModalDialog('modal-exit')"></div>
    <div class="modal-dialog">
        <div class="modal-header">
            <h5 class="modal-title"><i class="fi fi-rs-exit"></i>خروج</h5>
            <button type="button" class="btn-close" onclick="hideModalDialog('modal-exit')"><i
                    class="fi fi-rs-cross"></i></button>
        </div>
        <div class="modal-body">
            <h6 class="mb-3 text-center text-dark">از پنل مدیریت خارج می‌شوید؟</h6>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary-outline icon-right"
                    onclick="hideModalDialog('modal-exit')"><i class="fi fi-rs-cross"></i>بستن</button>
            <button type="button" class="btn btn-primary color-danger icon-right"><i class="fi fi-rs-check"></i>
                بله، خارج می‌شوم
            </button>
        </div>
    </div>
</div>

<!-- Scripts -->
<!-- jQuery (required by many scripts) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- kamaDatepicker -->
<script src="helpers/js/kamadatepicker.min.js"></script>
<script src="assets/js/dashboard-scripts.js"></script>
<script src="assets/js/modalScript.js"></script>
<script src="helpers/js/helpers.js"></script>
@Yield('Page_JS')

<script>
    (function(){
        var msg = @json(session('success'));
        if (msg) {
            var toast = document.createElement('div');
            toast.textContent = msg;
            toast.style.position = 'fixed';
            toast.style.left = '20px';
            toast.style.bottom = '20px';
            toast.style.background = '#28a745';
            toast.style.color = 'white';
            toast.style.padding = '10px 14px';
            toast.style.borderRadius = '6px';
            toast.style.boxShadow = '0 2px 10px rgba(0,0,0,.15)';
            toast.style.zIndex = '9999';
            document.body.appendChild(toast);
            setTimeout(function(){ toast.remove(); }, 3000);
        }
    })();
    </script>

    <!-- Modal: ایجاد تیکت جدید -->
    <style>
        /* modal ticket add - sizing and inputs */
        #modal-ticket-add .modal-dialog { max-width: 980px; width: 92%; }
        #modal-ticket-add .input, #modal-ticket-add .select, #modal-ticket-add .textarea {
            width: 100%;
            font-size: 14px;
            padding: 0.85rem 0.875rem;
            border: 1px solid #d2d3d4;
            border-radius: 6px;
        }
        #modal-ticket-add .textarea { min-height: 200px; resize: vertical; line-height: 1.7; }
        #modal-ticket-add .modal-body .row { margin-bottom: 10px; }
        #modal-ticket-add .modal-footer { padding-top: 8px; }
    </style>
    <div class="modal" id="modal-ticket-add" tabindex="-1">
        <div class="modal-backdrop" onclick="hideModalDialog('modal-ticket-add')"></div>
        <div class="modal-dialog">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fi fi-rs-add"></i>ایجاد تیکت جدید ( ارسال درخواست پشتیبانی )</h5>
                <button type="button" class="btn-close" onclick="hideModalDialog('modal-ticket-add')"><i
                        class="fi fi-rs-cross"></i></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="input-group no-icon">
                            <label>عنوان</label>
                            <input type="text" name="subject" class="input" placeholder="عنوان">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="select-group no-icon">
                            <label>دسته‌بندی</label>
                            <select class="select" name="department_id">
                                <option value="support" selected>پشتیبانی</option>
                                <option value="finance">مالی</option>
                                <option value="technical">فنی</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="input-group no-icon">
                            <label>شناسه کاربر</label>
                            <input type="text" name="user_id" class="input" placeholder="شناسه کاربر">
                        </div>
                    </div>
                </div>

                <div class="input-group no-icon mt-2" style="width:100%;">
                    <label>توضیحات</label>
                    <textarea class="textarea" rows="10" name="memo" placeholder="توضیحات"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <div style="display:flex; justify-content:space-between; width:100%; align-items:center; gap:12px;">
                    <div style="order:2;">
                        <button type="button" class="btn btn-primary icon-right"><i class="fi fi-rs-send"></i>
                            ارسال
                        </button>
                    </div>
                    <div style="order:1;">
                    <button type="button" class="btn btn-primary-outline icon-right"
                    onclick="hideModalDialog('modal-ticket-add')"><i class="fi fi-rs-cross"></i>بستن</button>
                        <label class="btn btn-secondary-outline icon-right" for="ticket_file_input" style="cursor:pointer;">
                            <i class="fi fi-rs-upload"></i>انتخاب فایل
                        </label>
                        <input id="ticket_file_input" name="attachment_file" type="file" hidden>
                    </div>
                </div>
            </div>
        </div>
    </div>

@yield('Scripts')

</body>

</html>
