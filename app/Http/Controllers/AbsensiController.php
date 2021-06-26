<?php

namespace App\Http\Controllers;

use App\Http\Requests\AbsensiRequest;
use App\Model\AbsensiModel;
use App\Model\AbsensiSiswaModel;
use App\Model\GuruModel;
use App\Model\RuangBelajarModel;
use Illuminate\Http\Request;
use DataTables;

class AbsensiController extends Controller
{
    public function index()
    {
        session()->pull('id_ruang_belajar');
        $nip = Auth()->user()->nisn;
        $id = GuruModel::where('nip', $nip)->first()->id_guru;
        $ruang_belajar = RuangBelajarModel::where('id_guru', $id)->get();
        return view('guru.pages.absensi.form', compact('ruang_belajar'));
    }

    public function create()
    {
        session()->pull('id_ruang_belajar');
        $nip = Auth()->user()->nisn;
        $id = GuruModel::where('nip', $nip)->first()->id_guru;
        $ruang_belajar = RuangBelajarModel::where('id_guru', $id)->get();
        return view('guru.pages.absensi.form_add', compact('ruang_belajar'));
    }

    public function store(AbsensiRequest $request)
    {
        AbsensiModel::create($request->all());
        return redirect()->back()->with('status', 'Absen berhasil di buat !');
    }

    public function open($id)
    {
        $absens = AbsensiSiswaModel::where('id_absensi', $id)->with('absensi','siswa')->get();
        // dd($absens);
        return view('guru.pages.absensi.listAbsensi', compact('absens'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function tampil_absen(Request $request)
    {
        $id = $request->id_ruang_belajar;
        session()->put('id_ruang_belajar', $id);
        return view('guru.pages.absensi.tampil_absensi');
    }

    public function list()
    {
        $id = session()->get('id_ruang_belajar');
        $item = AbsensiModel::where('id_ruang_belajar', $id)->with('ruang_belajar.mapel.kelas')->get();
        // $item = AbsensiModel::with('ruang_belajar.mapel.kelas')->get();
        // dd($item);
        return DataTables::of($item)
        ->rawColumns(['open'])
        ->addIndexColumn()
        ->addColumn('open', function($item){
            $open = '<a href="/guru-panel/absensi/open/' . $item->id_absensi . '" class="btn btn-light"><i class="fas fa-external-link-alt"></i></a>';
            return $open;
        })->make(true);
    }

    public function absenSiswa()
    {
        $id = session()->get('id_ruang_belajar');
        $item = AbsensiModel::where('id_ruang_belajar', $id)->with('ruang_belajar.mapel.kelas')->get();
        // $item = AbsensiModel::with('ruang_belajar.mapel.kelas')->get();
        // dd($item);
        return DataTables::of($item)
        ->rawColumns(['open'])
        ->addIndexColumn()
        ->addColumn('open', function($item){
            $open = '<a href="/guru-panel/absensi/open/' . $item->id_absensi . '" class="btn btn-light"><i class="fas fa-external-link-alt"></i></a>';
            return $open;
        })->make(true);
    }
}
