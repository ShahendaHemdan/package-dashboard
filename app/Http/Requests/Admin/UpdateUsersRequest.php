<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateUsersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'name' => 'required|string|max:255',
        'email' => [
            'required',
            Rule::unique('users', 'email')->ignore($this->user->id),
        ],


        'password' => 'nullable|string|min:8',
        'mobile' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ];
    }
}
