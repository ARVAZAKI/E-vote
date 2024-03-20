<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCandidateRequest extends FormRequest
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
            'name' => 'required',
            'npm' => 'required|unique:candidates',
            'photo' => 'required|mimes:png,jpg',
            'category' => 'required'
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Name must be filled in..',
            'npm.required' => 'Npm must be filled in..',
            'npm.unique' => 'NPM already exist..',
            'photo.required' => 'Photo must be filled in..',
            'photo.mimes' => 'Photos must have png/jpg extension..',
            'category' => 'Category must be filled in..'
        ];
    }
}
