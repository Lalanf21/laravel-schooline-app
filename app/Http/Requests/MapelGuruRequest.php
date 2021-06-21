<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MapelGuruRequest extends FormRequest
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
            'id_mapel' => 'required|numeric',
            'id_guru' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Wajib di isi !',
            'numeric' => 'Pilih Option Dahulu',
        ];
    }
}
