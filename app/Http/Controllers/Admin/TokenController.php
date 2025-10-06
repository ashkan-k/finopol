<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Token;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\Admin\TokenStoreRequest;
use App\Http\Requests\Admin\TokenUpdateRequest;
use Illuminate\Support\Str;

class TokenController extends Controller
{
    public function index(Request $request): View
    {
        $query = Token::query()->with('user')->latest('id');

        if ($search = $request->string('q')->toString()) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('ips', 'like', "%{$search}%")
                  ->orWhere('token', 'like', "%{$search}%");
            });
        }

        if ($userId = $request->integer('user_id')) {
            $query->where('user_id', $userId);
        }

        $active = $request->string('active')->toString();
        if ($active === 'yes') {
            $query->whereNotNull('activated_at');
        } elseif ($active === 'no') {
            $query->whereNull('activated_at');
        }

        $tokens = $query->paginate(10)->withQueryString();

        $users = \App\Models\User::query()->orderBy('name')->get(['id','name']);
        return view('admin.tokens.index', compact('tokens','users'));
    }

    public function create(): View
    {
        $users = \App\Models\User::query()->orderBy('name')->get(['id','name']);
        return view('admin.tokens.create', compact('users'));
    }

    public function store(TokenStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
        if ($request->boolean('auto_generate_token') || empty($data['token'] ?? null)) {
            $data['token'] = $this->generateUniqueToken();
        }

        Token::create($data);

        return redirect()->route('dashboard.tokens.index')->with('success', 'توکن با موفقیت ایجاد شد.');
    }

    public function edit(Token $token): View
    {
        $users = \App\Models\User::query()->orderBy('name')->get(['id','name']);
        return view('admin.tokens.edit', compact('token','users'));
    }

    public function update(TokenUpdateRequest $request, Token $token): RedirectResponse
    {
        $data = $request->validated();
        if ($request->boolean('auto_generate_token')) {
            $data['token'] = $this->generateUniqueToken();
        }

        $token->update($data);

        return redirect()->route('dashboard.tokens.index')->with('success', 'توکن با موفقیت بروزرسانی شد.');
    }

    public function destroy(Token $token): RedirectResponse
    {
        $token->delete();

        return redirect()->route('dashboard.tokens.index')->with('success', 'توکن حذف شد.');
    }

    private function generateUniqueToken(): string
    {
        do {
            $candidate = Str::random(22) . ':' . Str::random(120);
        } while (Token::where('token', $candidate)->exists());
        return $candidate;
    }
}


