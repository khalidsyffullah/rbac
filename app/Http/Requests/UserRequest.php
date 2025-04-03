<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        // Get the current route name to determine if it's store or update
        $routeName = $this->route()->getName();

        // Base rules that apply to both creation and updates
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
        ];

        // For update operations, make the user email unique except for the current user
        if (str_contains($routeName, 'update')) {
            $userId = $this->route('user'); // Get the user ID from the route parameter
            $rules['email'][] = Rule::unique('users')->ignore($userId);
            $rules['password'] = ['nullable', 'string', 'min:8']; // Password is optional for updates
        } else {
            // For store operations, email must be unique and password is required
            $rules['email'][] = 'unique:users,email';
            $rules['password'] = ['required', 'string', 'min:8'];
        }

        return $rules;
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'email.unique' => 'This email is already taken.',
            'password.required' => 'Password is required when creating a new user.',
            'password.min' => 'Password must be at least 8 characters.',
        ];
    }
}