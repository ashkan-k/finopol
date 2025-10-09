@extends('layout.master')

@section('Page_Title')
    مدیریت تیکت‌ها
@endsection

@section('Content')
    <div class="main-header">
        <div class="inner">
            <div class="title">
                <h1><i class="fi fi-rs-ticket"></i>مدیریت تیکت‌ها</h1>
                <div class="breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb-list mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">داشبورد</a></li>
                            <li class="breadcrumb-item active" aria-current="page">تیکت‌ها</li>
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
                    <h4 class="form-title mb-4"><i class="fi fi-rs-search"></i>جستجو</h4>
                    <form method="get">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="input-group no-icon">
                                    <label>عبارت</label>
                                    <input type="text" class="input" name="q" value="{{ request('q') }}" placeholder="عنوان یا متن تیکت">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="select-group">
                                    <label>وضعیت</label>
                                    <select class="select" name="status">
                                        <option value="">همه</option>
                                        <option value="waiting" @if(request('status')==='waiting') selected @endif>در انتظار</option>
                                        <option value="answered" @if(request('status')==='answered') selected @endif>پاسخ داده شده</option>
                                        <option value="closed" @if(request('status')==='closed') selected @endif>بسته</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <a href="{{ route('dashboard.tickets.index') }}" class="btn btn-danger"><i class="fi fi-rs-refresh"></i>بازنشانی</a>
                            <button class="btn btn-primary"><i class="fi fi-rs-search"></i>جستجو</button>
                        </div>
                    </form>
                </div>

                <div class="actions" style="text-align:left;">
                    <a href="{{ route('dashboard.tickets.create') }}" class="btn btn-primary">+ تیکت جدید</a>
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
                            <th>عنوان</th>
                            <th>کاربر</th>
                            <th>وضعیت</th>
                            <th>تاریخ</th>
                            <th style="width:200px; text-align:center;">عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($tickets as $i => $ticket)
                            <tr>
                                <td>{{ $tickets->firstItem() + $i }}</td>
                                <td>{{ $ticket->title }}</td>
                                <td>{{ optional($ticket->user)->name ?: '-' }}</td>
                                <td>
                                    <span class="status color-{{ $ticket->get_status_class() }}">{{ $ticket->get_status() }}</span>
                                </td>
                                <td dir="ltr">{{ optional($ticket->created_at)->format('Y-m-d H:i') }}</td>
                                <td style="text-align:center;">
                                    <div style="display:inline-flex; gap:8px;">
                                        <a class="btn btn-secondary" href="{{ route('dashboard.tickets.show', $ticket) }}">نمایش</a>
                                        <a class="btn btn-primary" href="{{ route('dashboard.tickets.edit', $ticket) }}"><i class="fi fi-rs-edit"></i></a>
                                        <form action="{{ route('dashboard.tickets.destroy', $ticket) }}" method="post" onsubmit="return confirm('حذف شود؟')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger"><i class="fi fi-rs-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="6" class="text-center text-muted">موردی یافت نشد</td></tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">{{ $tickets->links() }}</div>
            </div>
        </div>
    </div>
@endsection


