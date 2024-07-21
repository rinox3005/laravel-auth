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
            'preview' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'The title is required.',
            'title.min' => 'The title must be at least 5 characters.',
            'title.unique' => 'The title has already been taken.',
            'type.required' => 'The type is required.',
            'programming_language.required' => 'The programming language is required.',
            'status.required' => 'The status is required.',
            'preview.image' => 'The preview must be an image.',
            'preview.mimes' => 'The preview must be a file of type: jpeg, png, jpg, gif, svg.',
            'preview.max' => 'The preview must not be greater than 2048 kilobytes.',
        ];
    }
}
