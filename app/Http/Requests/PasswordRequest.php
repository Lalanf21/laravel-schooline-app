<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'password' => 'required|min:5|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Wajib di isi !',
            'min' => 'Password minimal 5 karakter',
            'confirmed' => 'Password tidak sama',
        ];
    }
}
