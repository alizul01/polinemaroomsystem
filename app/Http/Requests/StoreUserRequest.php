<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|unique:users|string|email|max:255',
            'password' => 'required|string|min:8',
            'role' => 'required|string|in:user,superadmin,bem,kajur,hmti',
            'organization_id' => 'exists:organizations,id',
            'nomor_telepon' => 'required|string|max:255',
            'nomor_induk' => 'required|string|max:255',
        ];
    }
}
