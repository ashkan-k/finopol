<ul class="list-nav">
    <!-- داشبورد -->
    <li class="nav-item active">
        <a class="sub-item" href="dashboard">
            <i class="fi fi-rs-apps"></i><span class="title">پیشخوان</span>
        </a>
    </li>

    <!-- پشتیبانی -->
    <li class="nav-item">
        <a class="sub-item btn-collapse" data-collapse-target="#collapse-support">
            <i class="fi fi-rs-headphones"></i><span class="title">پشتیبانی</span>
            <div class="icon icon-angel"></div>
        </a>
        <div class="card-collapse" id="collapse-support">
            <ul>
                <li><a href="#" type="button" data-modal-name="modal-ticket-add">ایجاد تیکت</a></li>
                <li><a href="/tickets">تیکت های پشتیبانی</a></li>
                <li><a href="/tickets?status=pending">در انتظار <span class="badge badge-danger badge-s">1</span></a></li>
                <li><a href="/tickets?status=accounting">اکانتینگ <span class="badge badge-info badge-s">0</span></a></li>
                <li><a href="/tickets?status=review">در دست بررسی <span class="badge badge-warning badge-s">0</span></a></li>
            </ul>
        </div>
    </li>

    <!-- سیستم مالی -->
    <li class="nav-item">
        <a class="sub-item btn-collapse" data-collapse-target="#collapse-financial">
            <i class="fi fi-rs-credit-card"></i><span class="title">سیستم مالی</span>
            <div class="icon icon-angel"></div>
        </a>
        <div class="card-collapse" id="collapse-financial">
            <ul>
                <li><a href="/finance/invoice">فاكتورها</a></li>
                <li><a href="/finance/transactions">لیست تراکنشهای مالی</a></li>
                <li><a href="/finance/cash">درخواست تسویه کاربران</a></li>
                <li><a href="/finance/deposit">لیست درخواستهای تسویه</a></li>
                <li><a href="/finance/withdrawal">لیست ریز درخواستهای تسویه</a></li>
            </ul>
        </div>
    </li>

    <!-- امور نمایندگان -->
    <li class="nav-item">
        <a class="sub-item btn-collapse" data-collapse-target="#collapse-representatives" href="#">
            <i class="fi fi-rs-users"></i><span class="title">امور نمایندگان</span>
            <div class="icon icon-angel"></div>
        </a>
        <div class="card-collapse" id="collapse-representatives">
            <ul>
                <li><a href="representatives/list">لیست نمایندگان</a></li>
            </ul>
        </div>
    </li>

    <!-- مدیریت کاربران -->
    <li class="nav-item">
        <a class="sub-item btn-collapse" data-collapse-target="#collapse-users" href="#">
            <i class="fi fi-rs-user"></i><span class="title">مدیریت کاربران</span>
            <div class="icon icon-angel"></div>
        </a>
        <div class="card-collapse" id="collapse-users">
            <ul>
                <li><a href="users/list">لیست کاربران</a></li>
            </ul>
        </div>
    </li>

    <!-- درگاهای پرداخت کاربران -->
    <li class="nav-item">
        <a class="sub-item btn-collapse" data-collapse-target="#collapse-payment-gateways" href="#">
            <i class="fi fi-rs-shopping-bag"></i><span class="title">درگاهای پرداخت کاربران</span>
            <div class="icon icon-angel"></div>
        </a>
        <div class="card-collapse" id="collapse-payment-gateways">
            <ul>
                <li><a href="payment-gateways/list">لیست درگاهای پرداخت</a></li>
                <li><a href="payment-gateways/pending">در انتظار <span class="badge badge-danger badge-s">1</span></a></li>
            </ul>
        </div>
    </li>

    <!-- حساب های بانکی کاربران -->
    <li class="nav-item">
        <a class="sub-item btn-collapse" data-collapse-target="#collapse-bank-accounts" href="#">
            <i class="fi fi-rs-building"></i><span class="title">حساب های بانکی کاربران</span>
            <div class="icon icon-angel"></div>
        </a>
        <div class="card-collapse" id="collapse-bank-accounts">
            <ul>
                <li><a href="bank-accounts/list">لیست حساب های بانکی</a></li>
                <li><a href="bank-accounts/pending">در انتظار <span class="badge badge-danger badge-s">1</span></a></li>
            </ul>
        </div>
    </li>

    <!-- گارد امنیتی -->
    <li class="nav-item">
        <a class="sub-item btn-collapse" data-collapse-target="#collapse-security">
            <i class="fi fi-rs-shield"></i><span class="title">گارد امنیتی</span>
            <div class="icon icon-angel"></div>
        </a>
        <div class="card-collapse" id="collapse-security">
            <ul>
                <li><a href="/security/guard">تنظيمات</a></li>
                <li><a href="/security/suspicious">تراکنشهای مشکوک</a></li>
                <li><a href="security/blacklist">لیست سیاه و انسداد آی پی</a></li>
            </ul>
        </div>
    </li>

    <!-- ابزار و تنظیمات -->
    <li class="nav-item">
        <a class="sub-item btn-collapse" data-collapse-target="#collapse-tools">
            <i class="fi fi-rs-settings"></i><span class="title">ابزار و تنظیمات</span>
            <div class="icon icon-angel"></div>
        </a>
        <div class="card-collapse" id="collapse-tools">
            <ul>
                <li><a href="/setting">تنظيمات</a></li>
                <li><a href="/gateway-settings">تنظیمات درگاه‌های پرداخت</a></li>
                <li><a href="/time-maagement-setting">برنامه زمانبندی</a></li>
                <!-- <li><a href="/">تنظیمات پرداخت یاری</a></li> -->
                <li><a href="/changelog-setting">لیست تغییرات و بروزرسانی ها</a></li>
                <li><a href="/cryptocurrency-setting">تنظیمات پرداخت رمز ارز دیجیتال</a></li>
            </ul>
        </div>
    </li>

    <!-- ماژول و امکانات جانبی -->
    <li class="nav-item">
        <a class="sub-item btn-collapse" data-collapse-target="#collapse-modules" href="#">
            <i class="fi fi-rs-puzzle"></i><span class="title">ماژول و امکانات جانبی</span>
            <div class="icon icon-angel"></div>
        </a>
        <div class="card-collapse" id="collapse-modules">
            <ul>
                <li><a href="modules/tourism-bank">بانک گردشگری</a></li>
                <li><a href="modules/finotech">فینوتک</a></li>
                <li><a href="modules/rest-api">REST API وب سرویس</a></li>
            </ul>
        </div>
    </li>

    <!-- خروج از سیستم -->
    <li class="nav-item">
        <a class="sub-item" href="logout">
            <i class="fi fi-rs-exit"></i><span class="title">خروج از سیستم</span>
        </a>
    </li>
</ul>
