<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class lessonRequest extends FormRequest
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
            'title' => 'required|min:3|max:50',
            'description' => 'min:15|max:255',
            'video' => 'mimes:mp4,mov,ogg,qt|max:100000',
        ];
    }
}
