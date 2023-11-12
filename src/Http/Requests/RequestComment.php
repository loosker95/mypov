<?php

namespace fabienlk\mypov\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestComment extends FormRequest
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
            'body' => 'required|max:500',
        ];
    }

    public function messages(): array
    {
        return [
            'body.required' => 'The comment field is required.',
            'body.max' => 'The comment field must not be greater than 255 characters.'
        ];
    }
}
