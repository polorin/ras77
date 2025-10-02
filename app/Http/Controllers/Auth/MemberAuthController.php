<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class MemberAuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'username' => ['required', 'string', 'min:4', 'max:50', 'regex:/^[A-Za-z0-9_]+$/', Rule::unique('users', 'username')],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'whatsapp' => ['required', 'string', 'max:20', 'regex:/^[0-9+\-]{9,20}$/'],
            'payment_method' => ['required', Rule::in(['bank', 'ewallet'])],
            'provider' => ['required', 'string', 'max:100'],
            'account_number' => ['required', 'string', 'max:50'],
            'full_name' => ['required', 'string', 'max:120'],
            'captcha' => ['required', 'digits:4'],
            'captcha_expected' => ['required', 'digits:4'],
        ], [
            'username.regex' => 'Nama pengguna hanya boleh berisi huruf, angka, dan garis bawah.',
            'captcha.digits' => 'Kode captcha harus 4 digit angka.',
        ]);

        if ($data['captcha'] !== $data['captcha_expected']) {
            return back()->withInput()->withErrors([
                'captcha' => 'Kode captcha tidak sesuai.',
            ]);
        }

        $username = trim($data['username']);
        $accountNumber = preg_replace('/\s+/', '', $data['account_number']);

        $fullName = trim($data['full_name']);

        $user = User::create([
            'username' => $username,
            'name' => $fullName,
            'email' => Str::lower($username) . '+' . Str::random(6) . '@members.ras77',
            'password' => $data['password'],
            'whatsapp' => trim($data['whatsapp']),
            'payment_method' => $data['payment_method'],
            'payment_provider' => trim($data['provider']),
            'account_number' => $accountNumber,
            'account_holder_name' => $fullName,
        ]);

        Auth::login($user);
        $request->session()->regenerate();
        $user->updateLastLogin($request->ip());

        return redirect()->route('member.home')->with('status', 'Pendaftaran berhasil. Selamat datang, ' . $user->username . '!');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $remember = $request->boolean('remember');

        $username = trim($credentials['username']);

        if (! Auth::attempt(['username' => $username, 'password' => $credentials['password']], $remember)) {
            return back()->withInput($request->only('username'))
                ->withErrors([
                    'username' => 'Nama pengguna atau kata sandi salah.',
                ], 'login');
        }

        $request->session()->regenerate();
        Auth::user()->updateLastLogin($request->ip());

        return redirect()->intended(route('member.home'))->with('status', 'Selamat datang kembali, ' . Auth::user()->username . '!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
