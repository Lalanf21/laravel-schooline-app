<?php

namespace App\Http\Controllers;

use App\Model\GuruModel;
use App\Model\SiswaModel;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $siswa = SiswaModel::where('is_active', 1)->count();
        $guru = GuruModel::where('is_active',1)->count();
        $user = User::count();

        $data = [
            'siswa'=>$siswa,
            'guru'=>$guru,
            'user'=>$user,
        ];
        return view('admin.pages.dashboard', $data);
    }

    
}
