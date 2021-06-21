<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassworkRequest extends FormRequest
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
            'id_ruang_belajar' => 'required|integer',
            'jenis' => 'required|in:tugas,materi',
            'judul' => 'required',
            'deskripsi' => 'required',
            'deadline' => 'required|date',
            'file' => 'mimes:pdf,docx,txt,doc,pptx,ppt',
            'is_publish' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Wajib di isi !',
            'date'  => 'Masukkan tanggal yang valid !',
            'in'  => 'Pilih dahulu !',
            'mimes'  => 'Hanya boleh file pdf, doc, docx, txt, ppt !',
        ];
    }
}
