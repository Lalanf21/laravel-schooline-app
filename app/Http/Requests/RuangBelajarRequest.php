<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RuangBelajarRequest extends FormRequest
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

    
    public function rules()
    {
        return [
            'id_mapel' => 'required',
            'nama' => 'required',
            'kode' => 'required|max:6|unique:ruang_belajar,kode',
        ];
    }

    public function messages()
    {
        return [
            'required'=>'Wajib di isi !',
            'max'=>'Maksimal 6 karakter !',
            'unique'=>'Kode sudah ada, silahkan generate ulang!',
        ];
    }
}
