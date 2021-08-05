<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuruRequest extends FormRequest
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
            'nip' => 'required|max:12',
            'nama' => 'required|max:100',
            'tgl_lahir' => 'required',
            'no_hp' => 'required|numeric',
            'foto' => 'required',
            'is_active' => 'required|in:0,1'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Wajib di isi !',
            'max'  => 'Maksimal 12 karakter !',
            'integer'  => 'Hanya boleh di input angka !',
            'numeric'  => 'Hanya boleh di input angka !',
            'in'  => 'Pilih Option Dahulu !',
        ];
    }
}
