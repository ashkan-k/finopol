<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TokenUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $tokenId = $this->route('token')?->id ?? null;

        return [
            'title' => ['required', 'string', 'max:255'],
            'ips' => ['nullable', 'string', 'max:1000'],
            'token' => ['nullable', 'string', 'max:255', 'unique:tokens,token,' . $tokenId],
            'activated_at' => ['nullable', 'date'],
            'user_id' => ['required', 'exists:users,id'],
            'auto_generate_token' => ['nullable', 'boolean'],
        ];
    }
}


