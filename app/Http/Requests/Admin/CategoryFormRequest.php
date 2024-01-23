<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryFormRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                'max:200',
            ],
            'slug' => [
                'required',
                'string',
                'max:255',
                'unique:categories,slug',
            ],
            'description' => [
                'required',
                'string',
            ],
            'image' => [
                'required',
                'image',
                'mimes:jpeg,png,jpg,gif,svg',
                'max:2048',
            ],
            'meta_title' => [
                'required',
                'string',
                'max:255',
            ],
            'meta_description' => [
                'required',
                'string',
            ],
            'meta_keyword' => [
                'required',
                'string',
                'max:255',
            ],
            'navbar_status' => [
                'required',
                'boolean',
            ],
            'status' => [
                'required',
                'boolean',
            ],
        ];
    }
    
    public function messages(): array
    {
        return [
            'name.required' => 'The name field is required.',
            'slug.unique' => 'The slug must be unique.',
            // ... other custom messages ...
        ];
    }
}
