<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'title' => ['required', 'string', 'min:5', 'max:255', Rule::unique('projects')->ignore($this->route('project'))],
            'description' => 'nullable|string',
            'type_id' => 'nullable|exists:types,id',
            'key_features' => 'nullable|string',
            'link_to_website' => 'nullable|url',
            'technologies' => 'nullable|exists:technologies,id',
            'status' => 'required|string|max:20',
            'preview' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:3000',
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'The title is required.',
            'title.min' => 'The title must be at least 5 characters.',
            'title.max' => 'The title may not be greater than 255 characters.',
            'title.unique' => 'The title has already been taken.',
            'status.required' => 'The status is required.',
            'status.max' => 'The status may not be greater than 20 characters.',
            'preview.image' => 'The preview must be an image.',
            'preview.mimes' => 'The preview must be a file of type: jpeg, png, jpg, gif, svg, webp.',
            'preview.max' => 'The preview must not be greater than 3 MB.',
            'link_to_website.url' => 'The link to the website must be a valid URL.',
        ];
    }
}
