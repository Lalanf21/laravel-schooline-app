<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiswaRequest extends FormRequest
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
            'nisn' => 'required|max:12',
            'nama' => 'required|max:100',
            'tgl_lahir' => 'required',
            'id_kelas' => 'required|integer',
            'id_jurusan' => 'required|integer',
            'tahun_ajaran' => 'required|max:10',
            'foto' => 'required|mimes:jpg,bmp,png',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Wajib di isi !',
            'max'  => 'Sudah Mencapai Maksimal Karakter !',
            'integer'  => 'Hanya boleh di input angka !',
            'mimes'  => 'Hanya boleh file gambar !',
        ];
    }
}
