<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class BookStoreRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>['required','max:100'],  
            'year'=>['required'], 
            'pages'=>['required'], 
            'image'=>['mimes:jpeg,jpg,png'],
            ];
    }

    #[Override]
    public function messages()
    {
        return [
            'name.required' =>'il campo :attribute è obbligatorio.',
            'year.required' =>'il campo :attribute è obbligatorio.',
            'pages.required' =>'il campo :attribute è obbligatorio.',
        ];
    }
}
