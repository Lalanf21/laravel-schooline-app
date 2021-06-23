<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassworkSiswaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'id_classwork' => 'required',
            'file' => 'required|mimes:pdf,docx,txt,doc,pptx,ppt',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Wajib di isi !',
            'mimes'  => 'Hanya boleh file pdf, doc, docx, txt, ppt !',
        ];
    }
}
