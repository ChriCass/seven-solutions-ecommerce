<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Asegúrate de que solo usuarios autorizados puedan hacer esta solicitud.
        // Por defecto es true, pero puedes añadir tu lógica de autorización aquí.
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $this->user->id,
            'role' => 'required|string|in:user,admin',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    
        if ($this->isMethod('post') || ($this->isMethod('put') && $this->filled('password'))) {
            $rules['password'] = ['required', 'confirmed', Password::defaults()];
        }
    
        return $rules;
    }
    
    
}
