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
        $id_siswa = SiswaModel::where('nisn', $nisn)->first()->id_siswa;
        return view('siswa.pages.form_nilai', compact('siswa'));
    }

    public function proses(Request $request)
    {
        $nisn = Auth()->user()->nisn;
        $id_siswa = SiswaModel::where('nisn', $nisn)->first()->id_siswa;
        $jPertemuan = RuangBelajarModel::where('id_ruang_belajar', $request->id_ruang_belajar)->first()->jumlah_pertemuan;
        $id_rb = $request->id_ruang_belajar;
        ;
        // get absen
        $total_absen = AbsensiModel::where([
            ['id_ruang_belajar', '=', $request->id_ruang_belajar],
            ['id_siswa', '=', $id_siswa],
            ['keterangan', '=', 'hadir'],
        ])->count();
        // hitung total nilai absensi
        $nilaiAbsen = ($total_absen / $jPertemuan * 10 / 100) * 100;

        // get nilai tugas
        $tugas = ClassworksiswaModel::whereHas('classwork', function ($query)  use($id_rb){
            $query->where([
                ['jenis', '=', 'tugas'],
                ['id_ruang_belajar', '=', $id_rb],
            ]);
        })->where('id_siswa', $id_siswa)->get();
        
        // hitung total nilai tugas
        if ($tugas->isEmpty()) {
            $nilaiTugas = 0;
        }else{
            $Ttugas = 0;
            $i = 0;
            foreach ($tugas as $item) {
                $Ttugas += $item->nilai;
                $i++;
            }
            $nilaiTugas = ($Ttugas / $i) * 20 / 100;
        }
        
        // get nilai uts dan hitung total nilainya
        $uts = ClassworksiswaModel::whereHas('classwork', function ($query)  use($id_rb) {
            $query->where([
                ['jenis', '=', 'uts'],
                ['id_ruang_belajar', '=', $id_rb],
            ]);
        })->where('id_siswa', $id_siswa)->first();
        if ($uts === null) {
            $nilaiUts = 0;
        }else{
            $nilaiUts = $uts->nilai * 30 / 100;
        }
        
        // get nilai uas dan hitung total nilainya
        $uas = ClassworksiswaModel::whereHas('classwork', function ($query) use($id_rb){
            $query->where([
                ['jenis', '=', 'uas'],
                ['id_ruang_belajar', '=', $id_rb],
            ]);
        })->where('id_siswa', $id_siswa)->first();
        if ($uts === null) {
            $nilaiUas = 0;
        } else {
            $nilaiUas = $uas->nilai * 40 / 100;
        }

        // jumlahkan semua nilai
        $jumlah = round($nilaiAbsen + $nilaiTugas + $nilaiUts + $nilaiUas);
        $siswa = SiswaModel::where('id_siswa', $id_siswa)->first();

        // kirim data dan masukkan kedalam session
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
