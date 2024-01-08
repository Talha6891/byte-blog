<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
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
            'title' => ['required','max:255', Rule::unique('posts','title')->ignore($this->post->id)],
            'content' => ['required', 'max:5000'],
            'category_id' => ['required', 'exists:categories,id'],
            'tags' => ['required', 'array'],
            'tags.*' => ['required', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:10240'],
            'status' => ['required', 'in:published,draft'],
            'comments_enabled' => ['required','in:enabled,disabled'],
            'published_at' => ['nullable', 'date'],
        ];
    }
}
