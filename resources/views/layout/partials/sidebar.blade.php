<ul class="list-nav">
    <!-- داشبورد -->
    <li class="nav-item active">
        <a class="sub-item" href="{{ route('dashboard.index') }}">
            <i class="fi fi-rs-apps"></i><span class="title">پیشخوان</span>
        </a>
    </li>

    <!-- مدیریت کاربران -->
    <li class="nav-item">
        <a class="sub-item btn-collapse" data-collapse-target="#collapse-users">
            <i class="fi fi-rs-user"></i><span class="title">مدیریت کاربران</span>
            <div class="icon icon-angel"></div>
        </a>
        <div class="card-collapse" id="collapse-users">
            <ul>
                <li><a href="{{ route('dashboard.users.index') }}">لیست کاربران</a></li>
                <li><a href="{{ route('dashboard.users.create') }}">افزودن کاربر</a></li>
            </ul>
        </div>
    </li>

    <!-- مدیریت توکن ها -->
    <li class="nav-item">
        <a class="sub-item btn-collapse" data-collapse-target="#collapse-tokens">
            <i class="fi fi-rs-user"></i><span class="title">مدیریت توکن ها</span>
            <div class="icon icon-angel"></div>
        </a>
        <div class="card-collapse" id="collapse-tokens">
            <ul>
                <li><a href="{{ route('dashboard.tokens.index') }}">لیست توکن‌ها</a></li>
                <li><a href="{{ route('dashboard.tokens.index') }}s">افزودن توکن</a></li>
            </ul>
        </div>
    </li>

    <!-- خروج از سیستم -->
    <li class="nav-item">
        <a class="sub-item" href="{{ route('logout') }}">
            <i class="fi fi-rs-exit"></i><span class="title">خروج از سیستم</span>
        </a>
    </li>
</ul>
