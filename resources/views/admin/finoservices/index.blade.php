@extends('layout.master')

@section('Page_Title')
    مدیریت سرویس‌ها
@endsection

@section('Content')
    <div class="main-header">
        <div class="inner">
            <div class="title">
                <h1><i class="fi fi-rs-database"></i>مدیریت سرویس‌ها</h1>
                <div class="breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb-list mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">داشبورد</a></li>
                            <li class="breadcrumb-item active" aria-current="page">سرویس‌ها</li>
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
                                    <input type="text" class="input" name="q" value="{{ request('q') }}" placeholder="عنوان، توضیحات یا لینک API">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="select-group">
                                    <label>دسته‌بندی</label>
                                    <select class="select" name="category">
                                        <option value="">همه</option>
                                        @foreach($categories as $key => $cat)
                                            <option value="{{ $key }}" @if(request('category')==$key) selected @endif>{{ $cat }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <a href="{{ route('dashboard.finoservices.index') }}" class="btn btn-danger"><i class="fi fi-rs-refresh"></i>بازنشانی</a>
                            <button class="btn btn-primary"><i class="fi fi-rs-search"></i>جستجو</button>
                        </div>
                    </form>
                </div>

                <div class="actions" style="text-align:left;">
                    <a href="{{ route('dashboard.finoservices.create') }}" class="btn btn-primary">+ سرویس جدید</a>
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
                            <th>دسته</th>
                            <th>قیمت</th>
                            <th>زمان پاسخ (حداقل)</th>
                            <th style="width:140px; text-align:center;">عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($services as $i => $item)
                            <tr>
                                <td>{{ $services->firstItem() + $i }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->get_category() }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->respond_min_answer_time }}</td>
                                <td style="text-align:center;">
                                    <div style="display:inline-flex; gap:8px;">
                                        <a class="btn btn-primary" href="{{ route('dashboard.finoservices.edit', $item) }}"><i class="fi fi-rs-edit"></i></a>
                                        <form action="{{ route('dashboard.finoservices.destroy', $item) }}" method="post" onsubmit="return confirm('حذف شود؟')">
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
                <div class="mt-3">{{ $services->links() }}</div>
            </div>
        </div>
    </div>
@endsection


