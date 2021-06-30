<?php

namespace App\Http\Controllers;

use App\Model\AbsensiModel;
use App\Model\ClassworkModel;
use App\Model\ClassworksiswaModel;
use App\Model\RuangBelajarModel;
use App\Model\SiswaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PDF;

class NilaiController extends Controller
{
    public function index()
    {
        session()->pull('data');
        $nisn = Auth()->user()->nisn;
        $siswa = SiswaModel::where('nisn', $nisn)->with('ruang_belajar')->first();
        return view('siswa.pages.form_nilai', compact('siswa'));
    }

    public function proses(Request $request)
    {
        $nisn = Auth()->user()->nisn;
        $id_siswa = SiswaModel::where('nisn', $nisn)->first()->id_siswa;
        $jPertemuan = RuangBelajarModel::where('id_ruang_belajar', $request->id_ruang_belajar)->first()->jumlah_pertemuan;
        
        // get absen
        $total_absen = AbsensiModel::where([
            ['id_ruang_belajar','=', $request->id_ruang_belajar],
            ['id_siswa','=', $id_siswa],
            ['keterangan','=','hadir'],
        ])->count();
        
        // get nilai tugas
        $tugas = ClassworksiswaModel::whereHas('classwork', function ($query) {
            $query->where([
                ['jenis','=', 'tugas'],
                ['id_ruang_belajar','=', 1],
            ]);
        })->where('id_siswa',1)->get();

        // get nilai uts
        $uts = ClassworksiswaModel::whereHas('classwork', function ($query) {
            $query->where([
                ['jenis','=', 'uts'],
                ['id_ruang_belajar','=', 1],
            ]);
        })->where('id_siswa',1)->first()->nilai;

        // get nilai uas
        $uas = ClassworksiswaModel::whereHas('classwork', function ($query) {
            $query->where([
                ['jenis','=', 'uas'],
                ['id_ruang_belajar','=', 1],
            ]);
        })->where('id_siswa',1)->first()->nilai;

        // hitung total nilai absensi
        $nilaiAbsen = ($total_absen / $jPertemuan * 10 / 100) * 100;
        $nilaiUts = $uts * 30 / 100;
        $nilaiUas = $uas * 40 / 100;

        // hitung total nilai tugas
        $Ttugas = 0;
        $i = 0;
        foreach ($tugas as $item) {
            $Ttugas += $item->nilai;
            $i++;
        }
        $nilaiTugas = ($Ttugas / $i) * 20 / 100;

        $jumlah = round($nilaiAbsen + $nilaiTugas + $nilaiUts + $nilaiUas);
        $siswa = SiswaModel::where('id_siswa', $id_siswa)->first();
        $components = [
            'siswa' => $siswa,
            'total_absen' => $total_absen,
            'jPertemuan' => $jPertemuan,
            'nilaiAbsen' => $nilaiAbsen,
            'nilaiUts' => $nilaiUts,
            'nilaiUas' => $nilaiUas,
            'nilaiTugas' => $nilaiTugas,
            'jumlah' => $jumlah,
        ];
        Session::put('data', $components);
        return redirect()->route('siswa-panel.lihat-nilai');
        
    }
    
    public function tampil_nilai()
    {
        $components = Session::get('data');
        return view('siswa.pages.lihat_nilai', $components);
    }

    public function download()
    {
        $components = Session::get('data');
        $pdf = PDF::loadView('siswa.pages.download_nilai', $components);
        return $pdf->download('nilai-siswa.pdf');
    }
    
}
