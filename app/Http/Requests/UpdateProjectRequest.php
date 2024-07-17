<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
            'title' => 'required|string|min:5',
            'type' => 'required|string',
            'programming_language' => 'required|string|max:255',
            'status' => 'required|string',
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'The title is required.',
            'title.min' => 'The title must be at least 5 characters.',
            'type.required' => 'The type is required.',
            'programming_language.required' => 'The programming language is required.',
            'status.required' => 'The status is required.',
        ];
    }
}
