<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class guruRequest extends FormRequest
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
            'no_hp' => 'required|numeric',
            'nama_mapel' => 'required',
            'password' => 'required',
            'is_active' => 'required|in:0,1'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Wajib di isi !',
            'max'  => 'Sudah Mencapai Maksimal Karakter !',
            'integer'  => 'Hanya boleh di input angka !',
            'numeric'  => 'Hanya boleh di input angka !',
        ];
    }
}
