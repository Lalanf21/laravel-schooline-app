<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AbsensiRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_ruang_belajar' => 'required',
            'tanggal_absen' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Wajib di isi !',
            'integer' => 'Wajib di isi !',
            'date'  => 'Masukkan tanggal yang valid !',
        ];
    }
}
