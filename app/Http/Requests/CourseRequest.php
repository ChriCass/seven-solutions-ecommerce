<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:1000',
            'description' => 'required|string',
            'outcomes' => 'required|string',
            'section' => 'required|string',
            'requirements' => 'required|string',
            'language' => 'required|string|max:255',
            'price' => 'required|numeric',
            'level' => 'required|string|max:50',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'video_url' => 'file|mimes:mp4,avi,mov|max:102400', // 100 MB
            'visibility' => 'required|boolean',
            'category_id' => 'required|integer|exists:categories,id'
        ];
    }
}
