<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class StudentAuthenticatedSessionController extends Controller
{
    /**
     * Display the student login view.
     */
    public function create(): View
    {
        return view('auth.student-login');
    }

    /**
     * Handle an incoming student authentication request.
     */


    public function store(LoginRequest $request): RedirectResponse
    {
        // Debugging: Check the credentials being used
        $credentials = $request->only('email', 'password');
    
        if (!Auth::guard('student')->attempt($credentials, $request->filled('remember'))) {
    
            // Debugging: Check why authentication failed
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
    
        }// Debugging: Check if the session is being regenerated
        $request->session()->regenerate();

        // Debugging: Check the intended redirect URL
        $intendedUrl = redirect()->intended(route('student.profile', absolute: false))->getTargetUrl();

        return redirect()->intended(route('student.profile', absolute: false));
    }
    /**
     * Destroy an authenticated student session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Log out the student using the 'student' guard
        Auth::guard('student')->logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the CSRF token
        $request->session()->regenerateToken();

        // Redirect to the home page
        return redirect('/');
    }
}