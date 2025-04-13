<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmailTemplateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'content' => 'required|string',
            'variables' => 'nullable|array',
            'variables.*' => 'nullable|string|max:255'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The template name is required.',
            'name.max' => 'The template name cannot exceed 255 characters.',
            'subject.required' => 'The email subject is required.',
            'subject.max' => 'The email subject cannot exceed 255 characters.',
            'content.required' => 'The email content is required.',
            'variables.*.max' => 'Each variable name cannot exceed 255 characters.'
        ];
    }
}