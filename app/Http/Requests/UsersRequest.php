<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            'nama' => 'required',
            'nisn' => 'required',
            'role' => 'required|in:admin,guru,siswa',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Wajib di isi !',
            'in' => 'Pilih Dahulu !',
            
        ];
    }
}
