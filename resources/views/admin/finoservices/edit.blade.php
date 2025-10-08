@extends('layout.master')

@section('Page_Title')
    ویرایش سرویس
@endsection

@section('Content')
    <div class="main-header">
        <div class="inner">
            <div class="title"><h1><i class="fi fi-rs-edit"></i>ویرایش سرویس</h1></div>
        </div>
    </div>
    <div class="main-inner">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('dashboard.finoservices.update', $finoservice) }}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-group no-icon">
                                <label>عنوان</label>
                                <input class="input" name="title" value="{{ old('title', $finoservice->title) }}"/>
                                @error('title')<div style="color:#d22c2c; font-size:12px; margin-top:4px;">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-group no-icon">
                                <label>دسته</label>
                                <select class="input" name="category">
                                    @foreach(\App\Enums\EnumHelpers::$FinoServicesCategoryItemsEnum as $key => $value)
                                        <option value="{{ $key }}" @if(old('category', $finoservice->category) == $key) selected @endif>{{ $value }}</option>
                                    @endforeach
                                </select>
                                @error('category')<div style="color:#d22c2c; font-size:12px; margin-top:4px;">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-group no-icon">
                                <label>قیمت</label>
                                <input class="input" name="price" value="{{ old('price', $finoservice->price) }}"/>
                                @error('price')<div style="color:#d22c2c; font-size:12px; margin-top:4px;">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-group no-icon">
                                <label>حداقل زمان پاسخ</label>
                                <input class="input" name="respond_min_answer_time"
                                       value="{{ old('respond_min_answer_time', $finoservice->respond_min_answer_time) }}"/>
                                @error('respond_min_answer_time')<div style="color:#d22c2c; font-size:12px; margin-top:4px;">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-group no-icon">
                                <label>آیکن svg</label>
                                <input class="input" name="icon_svg" value="{{ old('icon_svg', $finoservice->icon_svg) }}"/>
                                @error('icon_svg')<div style="color:#d22c2c; font-size:12px; margin-top:4px;">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-group no-icon">
                                <label>لینک API</label>
                                <input class="input" name="api_link" value="{{ old('api_link', $finoservice->api_link) }}"/>
                                @error('api_link')<div style="color:#d22c2c; font-size:12px; margin-top:4px;">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="input-group no-icon">
                        <label>توضیحات</label>
                        <textarea class="input" rows="5" name="description">{{ old('description', $finoservice->description) }}</textarea>
                        @error('description')<div style="color:#d22c2c; font-size:12px; margin-top:4px;">{{ $message }}</div>@enderror
                    </div>
                    <div class="input-group no-icon">
                        <label>جیسون swagger api</label>
                        <textarea class="input" rows="8" name="api_guide_json">{{ old('api_guide_json', $finoservice->api_guide_json) }}</textarea>
                        @error('api_guide_json')<div style="color:#d22c2c; font-size:12px; margin-top:4px;">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-actions">
                        <a href="{{ route('dashboard.finoservices.index') }}" class="btn btn-primary-outline icon-right"><i class="fi fi-rs-cross"></i>انصراف</a>
                        <button class="btn btn-primary">ذخیره</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


