<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateFilm extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $uuid = $this->film;

        return [
            'title' => "required|string|min:2|max:100|unique:films,title,{$uuid},uuid",
            'synopsis' => 'required|min:2|max:200',
            'image' => 'nullable|image|max:1024',
        ];
    }
}

