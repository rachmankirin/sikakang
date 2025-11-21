<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $remember = $request->boolean('remember');
        $rateKey = $this->throttleKey($request);

        if (RateLimiter::tooManyAttempts($rateKey, 5)) {
            $seconds = RateLimiter::availableIn($rateKey);
            return back()
                ->withErrors(['email' => 'Terlalu banyak percobaan. Silakan coba lagi dalam ' . $seconds . ' detik.'])
                ->withInput($request->only('email'));
        }

        $user = User::where('email', $credentials['email'])->first();

        if (! $user || ! $this->passwordMatches($user, $credentials['password'])) {
            RateLimiter::hit($rateKey, 60);
            return back()
                ->withErrors(['email' => 'Email atau password tidak sesuai.'])
                ->withInput($request->only('email'));
        }

        RateLimiter::clear($rateKey);
        Auth::login($user, $remember);
        $request->session()->regenerate();

        $redirectPath = $this->redirectPathByRole($user->role);

        if (!$redirectPath) {
            Auth::logout();

            return back()
                ->withErrors(['email' => 'Role pengguna tidak dikenali.'])
                ->withInput($request->only('email'));
        }

        return redirect()->intended($redirectPath);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    private function redirectPathByRole(?string $role): ?string
    {
        return match ($role) {
            'admin' => '/dashboard-admin',
            'dosen' => '/dosen/dashboard',
            'mahasiswa' => '/dashboard',
            default => null,
        };
    }

    private function passwordMatches(User $user, string $plainPassword): bool
    {
        try {
            if (Hash::check($plainPassword, (string) $user->password)) {
                $this->rehashIfNeeded($user, $plainPassword);
                return true;
            }
        } catch (\RuntimeException $e) {
            // Fallback handled below for non-bcrypt/legacy values.
        }

        if (password_verify($plainPassword, (string) $user->password)) {
            $this->rehashIfNeeded($user, $plainPassword);
            return true;
        }

        if (hash_equals((string) $user->password, $plainPassword)) {
            $this->rehashPassword($user, $plainPassword);
            return true;
        }

        return false;
    }

    private function rehashIfNeeded(User $user, string $plainPassword): void
    {
        try {
            if (! Hash::needsRehash((string) $user->password)) {
                return;
            }
        } catch (\Throwable $e) {
            // If the stored value is not a valid hash, force rehash.
        }

        $this->rehashPassword($user, $plainPassword);
    }

    private function rehashPassword(User $user, string $plainPassword): void
    {
        $user->forceFill([
            'password' => Hash::make($plainPassword),
        ])->save();
    }

    private function throttleKey(Request $request): string
    {
        $email = Str::lower($request->input('email', ''));
        $ip = (string) $request->ip();
        return $email . '|' . $ip;
    }
}
