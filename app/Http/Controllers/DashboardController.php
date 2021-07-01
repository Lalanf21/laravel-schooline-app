<?php

namespace App\Http\Controllers;

use App\Model\GuruModel;
use App\Model\MapelGuruModel;
use App\Model\RuangBelajarModel;
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
        $count_gutu = GuruModel::where('is_active',1)->count();
        $user = User::count();
        $nip = Auth()->user()->nisn;
        $guru = GuruModel::where('nip',$nip)->first()->foto;
        session()->put('foto', $guru);

        $components = [
            'siswa'=>$siswa,
            'count_guru'=>$count_gutu,
            'user'=>$user,
        ];
        return view('admin.pages.dashboard', $components);
    }

    public function siswaDashboard()
    {
        $nisn = Auth()->user()->nisn;
        $siswa = SiswaModel::where('nisn', $nisn)->with('ruang_belajar')->first()->foto;
        // dd($siswa);
        session()->put('foto', $siswa);
        return view('siswa.pages.dashboard', compact('siswa'));
    }

    public function guruDashboard()
    {
        $nip = Auth()->user()->nisn;
        $guru = GuruModel::where('nip',$nip)->first();
        $id_guru = GuruModel::where('nip',$nip)->first()->id_guru;
        $mapel = MapelGuruModel::where('id_guru',$id_guru)->with('mapel')->get();
        
        $count_rb = RuangBelajarModel::where('id_guru',$id_guru)->count();
        $ruang_belajar = RuangBelajarModel::where('id_guru', $id_guru)->with('mapel')->get();
        
        // session
        session()->put('foto', $guru->foto);
        session()->put('ruang_belajar', $ruang_belajar);
        session()->put('mapel', $mapel);
        // dd($ruang_belajar);
        return view('guru.pages.dashboard',compact('count_rb'));
    }

    
}
