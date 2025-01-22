<?php

namespace App\Http\Requests;

use App\Rules\Uppercase;
use Illuminate\Foundation\Http\FormRequest;

class GuardarCategoryRequest extends FormRequest
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
            'title' => ['required','unique:categories','min:5','max:255', new Uppercase],
            'url_clean' => 'required|unique:categories|min:5|max:255',
        ];
    }

    public function messages() {
        return [
            'title.required' => 'El título debe estar informado',
            'title.unique' => 'El título ya existe, no se puede duplicar',
            'title.min' => 'Título mínimo son 5 carateres',
            'title.max' => 'Título máximo son 255 caracters',
            'url_clean.required' => 'La url debe estar informada',
            'url_clean.unique' => 'La url ya existe, no se puede duplicar',
            'url_clean.min' => 'La url mínimo son 5 carateres',
            'url_clean.max' => 'La url máximo son 255 caracters',
        ]; 
    }
}
