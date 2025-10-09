@extends('layout.master')

@section('Page_Title')
    ایجاد تیکت
@endsection

@section('Content')
    <div class="main-header"><div class="inner"><div class="title"><h1><i class="fi fi-rs-add"></i>ایجاد تیکت</h1></div></div></div>
    <div class="main-inner">
        <div class="card"><div class="card-body">
            <form method="post" action="{{ route('dashboard.tickets.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="select-group">
                            <label>کاربر</label>
                            <select class="select" name="user_id">
                                <option value="">بدون انتخاب</option>
                                @foreach($users as $u)
                                    <option value="{{ $u->id }}" @if(old('user_id')==$u->id) selected @endif>{{ $u->name }}</option>
                                @endforeach
                            </select>
                            @error('user_id')<div style="color:#d22c2c; font-size:12px; margin-top:4px;">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="select-group">
                            <label>وضعیت</label>
                            <select class="select" name="status">
                                <option value="waiting" @if(old('status')==='waiting') selected @endif>در انتظار</option>
                                <option value="answered" @if(old('status')==='answered') selected @endif>پاسخ داده شده</option>
                                <option value="close" @if(old('status')==='close') selected @endif>بسته</option>
                            </select>
                            @error('status')<div style="color:#d22c2c; font-size:12px; margin-top:4px;">{{ $message }}</div>@enderror
                        </div>
                    </div>
                </div>
                <div class="input-group no-icon">
                    <label>عنوان</label>
                    <input class="input" name="title" value="{{ old('title') }}"/>
                    @error('title')<div style="color:#d22c2c; font-size:12px; margin-top:4px;">{{ $message }}</div>@enderror
                </div>
                <div class="input-group no-icon">
                    <label>متن</label>
                    <textarea class="input" rows="5" name="text">{{ old('text') }}</textarea>
                    @error('text')<div style="color:#d22c2c; font-size:12px; margin-top:4px;">{{ $message }}</div>@enderror
                </div>

                <div class="input-group no-icon">
                    <label>فایل ضمیمه</label>
                    <input class="input" type="file" name="file"/>
                    @error('file')<div style="color:#d22c2c; font-size:12px; margin-top:4px;">{{ $message }}</div>@enderror
                </div>
                <div class="form-actions">
                    <a href="{{ route('dashboard.tickets.index') }}" class="btn btn-secondary-outline">بازگشت</a>
                    <button class="btn btn-primary">ذخیره</button>
                </div>
            </form>
        </div></div>
    </div>
@endsection


