@extends('layout.master')

@section('Page_Title')
    لیست کاربران
@endsection

@section('Content')
    <div class="main-header">
        <div class="inner">
            <div class="title">
                <h1><i class="fi fi-rs-key"></i>مدیریت کاربران</h1>
                <div class="breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb-list mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">داشبورد</a></li>
                            <li class="breadcrumb-item active" aria-current="page">کاربران</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="main-inner">
        <div class="card">
            <div class="card-body">
                <div class="search-form">
                    <form method="get">
                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="input-group no-icon">
                                    <label>جستجو</label>
                                    <input type="text" name="q" value="{{ request('q') }}" class="input" placeholder="نام، موبایل یا ایمیل">
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <a href="{{ route('dashboard.users.index') }}" class="btn btn-danger">بازنشانی</a>
                            <button class="btn btn-primary">جستجو</button>
                        </div>
                    </form>
                </div>

                <div class="actions" style="text-align:left;">
                    <a href="{{ route('dashboard.users.create') }}" class="btn btn-primary">+ کاربر جدید</a>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table-custom table-head-slim">
                        <thead>
                        <tr>
                            <th style="width:60px">#</th>
                            <th style="min-width:200px">نام</th>
                            <th style="min-width:160px">موبایل</th>
                            <th style="min-width:200px">ایمیل</th>
                            <th style="min-width:200px">نتیجه‌ی استعلام شاهکار</th>
                            <th style="min-width:200px">وضعیت تایید نهایی</th>
                            <th style="width:140px; text-align:center;">عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($users as $index => $user)
                            <tr>
                                <td>{{ $users->firstItem() + $index }}</td>
                                <td>
                                    <div style="display:flex; align-items:center; gap:8px;">
                                        <i class="fi fi-rs-user"></i>
                                        <div>
                                            <div>{{ $user->name ?: '-' }}</div>
                                            <small class="text-muted">ID: {{ $user->id }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge badge-info" style="direction:ltr">{{ $user->phone ?: '-' }}</span></td>
                                <td style="direction:ltr">{{ $user->email ?: '-' }}</td>
                                <td>
                                    <span class="status color-{{ $user->get_shahkar_inquiry_status_class() }}">{{ $user->get_shahkar_inquiry_status() }}</span>
                                </td>
                                <td>
                                    <span class="status color-{{ $user->get_status_class() }}">{{ $user->get_status() }}</span>
                                </td>
                                <td style="text-align:center;">
                                    <div style="display:inline-flex; gap:8px;">
                                        <a class="btn btn-info" title="نمایش اطلاعات" href="{{ route('dashboard.users.show', $user) }}"><i class="fi fi-rs-eye"></i></a>
                                        <a class="btn btn-primary" title="ویرایش" href="{{ route('dashboard.users.edit', $user) }}"><i class="fi fi-rs-edit"></i></a>
                                        <form action="{{ route('dashboard.users.destroy', $user) }}" method="post" onsubmit="return confirm('حذف شود؟')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" title="حذف"><i class="fi fi-rs-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">داده‌ای برای نمایش پیدا نشد</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">{{ $users->links() }}</div>
            </div>
        </div>
    </div>
@endsection


