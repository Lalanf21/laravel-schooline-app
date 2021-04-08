<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Traits\HasRoles;

class RegisterController extends Controller
{
    use RegistersUsers, HasRoles;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        $message = [
            'exists' => 'NISN Kamu Tidak Terdaftar',
            'confirmed' => 'NISN Kamu Tidak Terdaftar',
            'min' => 'Field :attribute minimal 5 karakter',
            'required' => 'Wajib di isi',
            'confirmed' => 'Password Tidak Sama',
        ];
        
        return Validator::make($data, 
        [
            'nisn' => ['required', 'string', 'max:10','exists:siswa,nisn'],
            'nama' => ['required', 'string'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
        ], $message);
    }

    protected function create(array $data)
    {
        
        $user = user::create([
            'nama' => $data['nisn'],
            'nisn' => $data['nisn'],
            'password' => Hash::make($data['password']),
        ]);

        $user->assignRole('siswa');
        return $user;
    }

    protected function registered()
    {
        return redirect()->route('login')->with('status','Berhasil Register, Silahkan Login !');
    }
}
