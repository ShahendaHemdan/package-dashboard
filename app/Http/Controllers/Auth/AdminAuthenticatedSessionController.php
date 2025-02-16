<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AdminAuthenticatedSessionController extends Controller
{
    public function create(): View
    {
        return view('auth.admin-login');
    }

    public function store(LoginRequest $request): RedirectResponse
{
    // Debugging: Check the credentials being used
    $credentials = $request->only('email', 'password');

    if (!Auth::guard('admin')->attempt($credentials, $request->filled('remember'))) {

        // Debugging: Check why authentication failed
        throw ValidationException::withMessages([
            'email' => __('auth.failed'),
        ]);

    }

    // Debugging: Check if the session is being regenerated
    $request->session()->regenerate();

    // Debugging: Check the intended redirect URL
    $intendedUrl = redirect()->intended(route('dashboard', absolute: false))->getTargetUrl();

    return redirect()->intended(route('dashboard', absolute: false));
}

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
}
