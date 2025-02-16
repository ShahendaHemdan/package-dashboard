<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreStudentsRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.student-register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(StoreStudentsRequest $request)
    {

        // Validate incoming request
        $validatedData = $request->validated();
    
        // Hash the password
        $validatedData['password'] = Hash::make($validatedData['password']);
    
        // Handle file uploads
        if ($request->hasFile('profile_image_url')) {
            $validatedData['profile_image_url'] = $request->file('profile_image_url')->store('images', 'public');
        }

        if ($request->hasFile('exam_confirmation_email')) {
            $validatedData['exam_confirmation_email'] = $request->file('exam_confirmation_email')->store('images', 'public');
        }

        if ($request->hasFile('first_image_exam_confirmation')) {
            $validatedData['first_image_exam_confirmation'] = $request->file('first_image_exam_confirmation')->store('images', 'public');
        }

        if ($request->hasFile('second_image_exam_confirmation')) {
            $validatedData['second_image_exam_confirmation'] = $request->file('second_image_exam_confirmation')->store('images', 'public');
        }
    
        $student = User::create($validatedData);
    
        return redirect()->route('student.profile');
    }
}
