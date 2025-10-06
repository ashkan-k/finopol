<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Support\Facades\Cache;

class AuthController extends Controller
{
    public function showLogin(): View { return view('auth.login'); }
    public function showRegister(): View { return view('auth.register'); }
    public function showReset(): View { return view('auth.reset-password'); }

    public function login(LoginRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $user = User::where('phone', $data['phone'])->first();
        if ($user && Hash::check($data['password'], $user->password)) {
            Auth::login($user, true);
            $request->session()->regenerate();
            return redirect('/');
        }
        return back()->withErrors(['phone' => 'شماره موبایل یا رمز عبور نادرست است.']);
    }

    public function register(RegisterRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $user = User::create([
            'name' => $data['name'] ?? null,
            'phone' => $data['phone'],
            'email' => $data['email'] ?? null,
            'password' => Hash::make($data['password']),
        ]);

//        Auth::login($user);
        return redirect(route('login'));
    }

    public function requestReset(Request $request): RedirectResponse
    {
        $data = $request->validate(['phone' => ['required', 'string']]);
        $user = User::where('phone', $data['phone'])->first();
        if (!$user) {
            return back()->withErrors(['phone' => 'شماره موبایل یافت نشد.']);
        }
        $code = (string)random_int(100000, 999999);
        Cache::put('reset_code_'.$user->phone, $code, now()->addMinutes(5));
        // TODO: send SMS here
        return back()->with('success', 'کد بازیابی ارسال شد.')->with('step', 'verify')->with('phone', $user->phone);
    }

    public function verifyResetCode(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'phone' => ['required', 'string'],
            'code' => ['required', 'digits:6'],
        ]);
        $cached = Cache::get('reset_code_'.$data['phone']);
        if (!$cached || $cached !== $data['code']) {
            return back()->withErrors(['code' => 'کد تایید نامعتبر است.'])->with('step', 'verify')->with('phone', $data['phone']);
        }
        return back()->with('step', 'set_password')->with('phone', $data['phone']);
    }

    public function completeReset(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'phone' => ['required', 'string'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
        $user = User::where('phone', $data['phone'])->first();
        if (!$user) {
            return back()->withErrors(['phone' => 'کاربر یافت نشد.']);
        }
        $user->update(['password' => Hash::make($data['password'])]);
        Cache::forget('reset_code_'.$data['phone']);
        return redirect('/login')->with('success', 'رمز عبور با موفقیت تغییر کرد.');
    }
}


