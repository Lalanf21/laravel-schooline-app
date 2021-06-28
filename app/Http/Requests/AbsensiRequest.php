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
            'keterangan' => 'required',
            'file' => 'mimes:pdf,docx,doc',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Wajib di isi !',
            'mimes' => 'Hanya boleh file pdf, doc, docx !',
        ];
    }
}
