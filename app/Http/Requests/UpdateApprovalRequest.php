<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateApprovalRequest extends FormRequest
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
        $userRole = auth()->user()->role;
        return [
            'request_id' => ['required', 'integer', 'exists:requests,id'],
            'jurusan_approved' => ['nullable', Rule::requiredIf(function() use ($userRole) {
                return $userRole === 'kepala_jurusan';
            })],
            'himpunan_approved' => ['nullable', Rule::requiredIf(function() use ($userRole) {
                return $userRole === 'himpunan';
            })],
            'bem_approved' => ['nullable', Rule::requiredIf(function() use ($userRole) {
                return $userRole === 'bem';
            })],
            
        ];
    }
}
