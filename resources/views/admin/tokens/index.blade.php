@extends('layout.master')

@section('Page_Title')
    لیست توکن‌ها
@endsection

@section('Content')
    <div class="main-header">
        <div class="inner">
            <div class="title">
                <h1><i class="fi fi-rs-key"></i>مدیریت توکن‌ها</h1>
                <div class="breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb-list mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">داشبورد</a></li>
                            <li class="breadcrumb-item active" aria-current="page">توکن ها</li>
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
                    <h4 class="form-title mb-4">
                        <i class="fi fi-rs-search"></i>
                        جستجوی توکن
                    </h4>
                    <form method="get">
                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="input-group no-icon">
                                    <label>عبارت مورد جستجو</label>
                                    <input type="text" name="q" value="{{ request('q') }}" class="input" placeholder="عنوان، توکن یا آی‌پی">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="select-group">
                                    <label>کاربر</label>
                                    <select class="select" name="user_id">
                                        <option value="">همه</option>
                                        @isset($users)
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}" @if(request('user_id')==$user->id) selected @endif>{{ $user->name }}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="select-group">
                                    <label>وضعیت فعال‌سازی</label>
                                    <select class="select" name="active">
                                        <option value="">همه</option>
                                        <option value="yes" @if(request('active')==='yes') selected @endif>دارای تاریخ فعال‌سازی</option>
                                        <option value="no" @if(request('active')==='no') selected @endif>بدون تاریخ فعال‌سازی</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <a href="{{ route('dashboard.tokens.index') }}" class="btn btn-danger">
                                <i class="fi fi-rs-refresh"></i>
                                بازنشانی
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fi fi-rs-search"></i>
                                جستجو
                            </button>
                        </div>
                    </form>
                </div>

                <div class="actions" style="text-align:left;">
                    <a href="{{ route('dashboard.tokens.create') }}" class="btn btn-primary">+ توکن جدید</a>
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
                            <th style="min-width:180px">عنوان</th>
                            <th style="min-width:160px">کاربر</th>
                            <th style="min-width:160px">آی‌پی‌ها</th>
                            <th style="min-width:140px">وضعیت/تاریخ</th>
                            <th style="min-width:220px">توکن</th>
                            <th style="width:140px; text-align:center;">عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($tokens as $index => $token)
                            <tr>
                                <td>{{ $tokens->firstItem() + $index }}</td>
                                <td>
                                    <div style="display:flex; align-items:center; gap:8px;">
                                        <i class="fi fi-rs-key" style="font-size:18px;"></i>
                                        <span>{{ $token->title }}</span>
                                    </div>
                                </td>
                                <td>{{ optional($token->user)->name ?: '-' }}</td>
                                <td><span class="badge badge-info" style="direction:ltr">{{ $token->ips ?: '-' }}</span></td>
                                <td>
                                    @if($token->activated_at)
                                        <span class="badge badge-success">فعال</span>
                                        <small class="text-muted d-block" style="direction:ltr">{{ $token->activated_at->format('Y-m-d H:i') }}</small>
                                    @else
                                        <span class="badge badge-danger">غیرفعال</span>
                                    @endif
                                </td>
                                <td><code style="direction:ltr">{{ \Illuminate\Support\Str::limit($token->token, 38) }}</code></td>
                                <td style="text-align:center;">
                                    <div style="display:inline-flex; gap:8px;">
                                        <a class="btn btn-primary" title="ویرایش" href="{{ route('dashboard.tokens.edit', $token) }}"><i class="fi fi-rs-edit"></i></a>
                                        <form action="{{ route('dashboard.tokens.destroy', $token) }}" method="post" onsubmit="return confirm('حذف شود؟')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" title="حذف"><i class="fi fi-rs-trash"></i></button>
                                        </form>
                                    </div>
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
                <div class="mt-3">
                    {{ $tokens->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection


