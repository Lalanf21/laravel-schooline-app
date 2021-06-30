<?php

namespace App\Http\Controllers;

use App\Model\GuruModel;
use App\Model\MapelGuruModel;
use App\Model\MapelModel;
use App\Model\RuangBelajarModel;
use App\Model\RuangBelajarSiswaModel;
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

        $components = [
            'siswa'=>$siswa,
            'guru'=>$guru,
            'user'=>$user,
        ];
        return view('admin.pages.dashboard', $components);
    }

    public function siswaDashboard()
    {
        $nisn = Auth()->user()->nisn;
        $siswa = SiswaModel::where('nisn', $nisn)->with('ruang_belajar')->first();
        // dd($siswa);
        session()->put('foto', $siswa->foto);
        return view('siswa.pages.dashboard', compact('siswa'));
    }

    public function guruDashboard()
    {
        $nip = Auth()->user()->nisn;
        $guru = GuruModel::where('nip',$nip)->first();
        session()->put('foto', $guru->foto);
        $id_guru = GuruModel::where('nip',$nip)->first()->id_guru;
        $mapel = MapelGuruModel::where('id_guru',$id_guru)->with('mapel')->get();
        
        $ruang_belajar = RuangBelajarModel::where('id_guru',$id_guru)->count();
        // dd($ruang_belajar);
        return view('guru.pages.dashboard',compact('mapel','ruang_belajar'));
    }

    
}
