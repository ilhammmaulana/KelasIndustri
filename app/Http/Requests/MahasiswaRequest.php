<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MahasiswaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min: 8', 
            'alamat' => 'required', 
            'nim' => 'required', 
            'program_studi' => 'required', 
            'semester' => 'required', 
            'img' => 'image|file|max:1024' 
        ];
    }
}
