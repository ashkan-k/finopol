<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TicketUpdateRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'user_id' => ['nullable','integer','exists:users,id'],
            'title' => ['required','string','max:255'],
            'text' => ['required','string'],
            'status' => ['nullable','in:waiting,answered,close'],
            'file' => ['nullable','file','max:5120'],
        ];
    }

    public function attributes(): array
    {
        return [
            'user_id' => 'کاربر',
            'title' => 'عنوان',
            'text' => 'متن',
            'status' => 'وضعیت',
            'file' => 'فایل ضمیمه',
        ];
    }
}


