@extends('layout.master')

@section('Page_Title')
    پاسخ تیکت
@endsection

@section('Page_CSS')
<style>
    .ticket-card { background:#fff; border:1px solid #eceff6; border-radius:14px; padding:18px; }
    .reply-box { background:#f8f9fb; border:1px solid #e6e8ef; border-radius:12px; padding:14px; margin-top:12px; }
    .reply-meta { display:flex; align-items:center; gap:8px; color:#7a819a; font-size:12px; }
    .msg-bubble { background:#ffffff; border:1px solid #e6e8ef; border-radius:12px; padding:12px 14px; }
    .msg-bubble.me { background:#f0f4ff; border-color:#dce6ff; }
    .reply-actions { display:flex; justify-content:flex-end; gap:8px; margin-top:10px; }
    .avatar { width:28px; height:28px; border-radius:50%; background:#e6e8ef; display:inline-block; }
    .divider { height:1px; background:#f0f2f7; margin:14px 0; }
</style>
@endsection

@section('Content')
    <div class="main-header"><div class="inner"><div class="title"><h1><i class="fi fi-rs-ticket"></i>پاسخ تیکت</h1></div></div></div>
    <div class="main-inner">
        <div class="ticket-card">
            <div style="display:flex; justify-content:space-between; align-items:flex-start; gap:12px;">
                <div class="reply-meta">
                    <span>{{ optional($ticket->created_at)->format('Y/m/d') }}</span>
                </div>
                <div style="display:flex; align-items:center; gap:8px;">
                    <span class="avatar"></span>
                    <div>
                        <div style="font-weight:700;">{{ optional($ticket->user)->name ?: 'کاربر' }}</div>
                        <div class="subtle">{{ $ticket->created_at_from_now ?? '' }}</div>
                    </div>
                </div>
            </div>
            <div style="text-align:center; margin-top:12px; color:#444;">{{ $ticket->title }}</div>

            @if($ticket->file)
                <a class="btn btn-secondary mt-5" href="{{ $ticket->file ?: '---' }}" target="_blank">فایل ضمیمه</a>
            @endif

            <div class="divider"></div>

{{--            <div class="msg-bubble" style="background:#b0545b33; border-color:#b0545b; color:#2d2d2d;">--}}
{{--                <div style="display:flex; justify-content:space-between; align-items:center;">--}}
{{--                    <div style="font-weight:700;">{{ $ticket->title }}</div>--}}
{{--                    <div class="reply-meta">{{ $ticket->status_display ?? '' }}</div>--}}
{{--                </div>--}}
{{--            </div>--}}

            <div class="card mt-5" style="border:1px solid #d1d5db;">
                <div style="background:#7a8573; color:#fff; padding:8px 12px; display:flex; justify-content:space-between;">
                    <span>{{ $ticket->created_at_from_now ?? '' }}</span>
                    <span>{{ $ticket->user?->name }}</span>
                </div>
                <div style="background:#e6ffd6; padding:16px; min-height:140px;">
                    <p style="margin:0; color:#253046;">{{ $ticket->text_row }}</p>
                </div>
            </div>

            @foreach($answers as $answer)
                <div class="card mt-5" style="border:1px solid #d1d5db;">
                    <div style="background:#7a8573; color:#fff; padding:8px 12px; display:flex; justify-content:space-between;">
                        <span>{{ $answer->created_at_from_now ?? '' }}</span>
                        <span>{{ $answer->user?->name }}</span>
                    </div>
                    <div style="background:#e6ffd6; padding:16px; min-height:140px;">
                        <p style="margin:0; color:#253046;">{{ $answer->text }}</p>

                        @if($answer->file)
                            <a class="btn btn-secondary mt-5" href="{{ $answer->file ?: '---' }}" target="_blank">فایل ضمیمه</a>
                        @endif
                    </div>
                </div>
            @endforeach

            <div class="divider"></div>


            <form action="{{ route('dashboard.tickets-answer-store', $ticket->id ?: '---') }}" enctype="multipart/form-data" method="post">
                @csrf

                <div>
                    <label style="font-weight:700;">متن پاسخ <span style="color:#d22c2c">*</span></label>
                    <div class="reply-box input-group no-icon">
                        <textarea class="input" name="text" required rows="10" placeholder="متن پاسخ را وارد کنید"></textarea>
                    </div>
                    <div class="reply-actions">
                        <label class="btn btn-secondary-outline icon-right" for="id_file"><i class="fi fi-rs-paperclip"></i>پیوست</label>
                        <input type="file" id="id_file" style="display: none" name="file">
                        <button class="btn btn-primary">ارسال</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


