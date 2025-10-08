<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class FinoServiceStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['nullable','string','max:255'],
            'category' => ['nullable','string','max:100'],
            'description' => ['nullable','string'],
            'icon_svg' => ['nullable','string'],
            'price' => ['nullable','string','max:100'],
            'respond_min_answer_time' => ['nullable','string','max:100'],
            'api_link' => ['nullable','string'],
            'api_guide_json' => ['nullable','string'],
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'عنوان',
            'category' => 'دسته',
            'description' => 'توضیحات',
            'icon_svg' => 'آیکن',
            'price' => 'قیمت',
            'respond_min_answer_time' => 'حداقل زمان پاسخ',
            'api_link' => 'لینک API',
            'api_guide_json' => 'جیسون Swagger',
        ];
    }
}


